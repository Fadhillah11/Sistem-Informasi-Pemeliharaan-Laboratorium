<?php

namespace App\Controllers;


use CodeIgniter\Controller;
use App\Models\Pemeliharaan_model;
use App\Models\Komputer_model;
use App\Models\Lab_model;
use App\Models\Sop_model;

class Pemeliharaan extends BaseController
{
    protected $helpers = [];
    protected $Pemeliharaan_model;
    protected $Komputer_model;
    protected $Lab_model;
    protected $Sop_model;
    public function __construct()
    {
        helper('form');
        $this->Pemeliharaan_model = new Pemeliharaan_model();
        $this->Sop_model = new Sop_model();
    }
    public function index()
    {
        # code...
        $model = new Komputer_model();
        $data['komputer'] = $model->getKomputer();
        $model2 = new Lab_model();
        $data['lab'] = $model2->getLab();
        echo view('petugas/pemeliharaan/index', $data);
    }
    public function index2($id)
    {
        # code...
        $model = new Komputer_model();
        $data3['komputer'] = $model->getNamaLab($id);
        $data3['idlab'] = $id;
        echo view('petugas/pemeliharaan/list_komputer', $data3);
    }
    public function tampil($id,$idlab)
    {
        # code...
        $model = new Sop_model();
        $data['sop'] = $model->getSop(); // mengambil semua SOP
        $data['idpc'] = $id;
        $data['idlab'] = $idlab;
        return view('petugas/pemeliharaan/create',$data);
    }  
    public function detail($id)
    {
        $pemeliharaanModel = new pemeliharaan_model();
        $sopModel = new sop_model();
    
        try {
            $data['pemeliharaan'] = $pemeliharaanModel->getDetail($id);
            // Cek apakah data pemeliharaan ada
            if (empty($data['pemeliharaan'])) {
                throw new \Exception('Data pemeliharaan tidak ditemukan');
            }
            // Ambil id_sop dari index terakhir di kolom keterangan
            $id_sop = $data['pemeliharaan'][count($data['pemeliharaan']) - 1]['keterangan'];
            // Cek apakah id_sop valid
            if (empty($id_sop)) {
                throw new \Exception('id_sop tidak ditemukan dalam keterangan');
            }
            $data['sop'] = $sopModel->getDetail($id_sop);
            // Cek apakah data SOP ditemukan
            if (empty($data['sop'])) {
                throw new \Exception('Data SOP tidak ditemukan');
            }
            echo view('petugas/pemeliharaan/detail', $data);
        } catch (\Exception $e) {
            // Tangani kesalahan dan tampilkan pesan
            session()->setFlashdata('error_message', $e->getMessage());
        }
    }
    
    public function store()
    {
        $lab = $this->request->getPost('lab');
        $pc = $this->request->getPost('pc');
        $hasil = $this->request->getPost('hasil');
        
        // Ambil data SOP yang dicentang
        $selected_sops = $this->request->getPost('sop');
        if ($selected_sops) {
            $keterangan = implode(',', $selected_sops);
        } else {
            $keterangan = "Tidak ada SOP yang dipilih.";
        }

        $data = array(
            'pc'        => $pc,
            'id_user'   => session()->get('id_user'), // id_user diambil dari session login
            'keterangan'=> $keterangan,
            'hasil'     => $hasil,
            'kerusakan' => $this->request->getPost('kerusakan'),
            'tgl'       => date('Y-m-d H:i:s')
        );

        $model = new pemeliharaan_model();
        $simpan = $model->insertPemeliharaan($data);
        if ($simpan) {
            session()->setFlashdata('selected_sops', $keterangan);
            session()->setFlashdata('success', 'Created data successfully');
            return redirect()->to(base_url('pemeliharaan/index2/' . $lab));
        }
    }

    public function update()
    {
        $id = $this->request->getVar('id_pemeliharaan');
        $data = array(
            'hasil'     => $this->request->getPost('hasil'),
            'kerusakan'     => $this->request->getPost('kerusakan')
        );
            $model = new Pemeliharaan_model();
            $ubah = $model->updatePemeliharaan($data, $id);
            if ($ubah) {
                session()->setFlashdata('info', 'Updated data Successfully');
                return redirect()->to(base_url('pemeliharaan'));
            }
    }
}