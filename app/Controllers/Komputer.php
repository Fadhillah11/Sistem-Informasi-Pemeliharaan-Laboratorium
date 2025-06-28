<?php

namespace App\Controllers;


use CodeIgniter\Controller;
use App\Models\Komputer_model;
use App\Models\Lab_model;
use App\Models\Komponen_model;

class Komputer extends BaseController
{
    protected $helpers = [];
    protected $Komputer_model;
    protected $Lab_model;
    protected $Komponen_model;
    public function __construct()
    {
        helper('form');
        $this->Komputer_model = new Komputer_model();
        $this->Lab_model = new Lab_model();
        $this->Lab_model = new Komponen_model();
    }
    public function index()
    {
        # code...
        $model = new Komputer_model();
        $data['komputer'] = $model->getKomputer();
        $model2 = new Lab_model();
        $data['lab'] = $model2->getLab();
        echo view('ka_lab/komputer/index', $data);
    }
    public function index2($id)
    {
        # code...
        $model = new Komputer_model();
        $data3['komputer'] = $model->getNamaLab($id);
        $data3['idlab'] = $id;
        echo view('ka_lab/komputer/list_komputer', $data3);
    }
    public function index3()
    {
         # code...
         $model = new Komputer_model();
         $data3['komputer'] = $model->getNamaLab2();
        echo view('ka_lab/komputer/gudang', $data3);
    }
    public function index_petugas()
    {
        # code...
        $model = new Komputer_model();
        $data['komputer'] = $model->getKomputer();
        $model2 = new Lab_model();
        $data['lab'] = $model2->getLab();
        echo view('petugas/komputer/index', $data);
    }
    public function index2_petugas($id)
    {
        # code...
        $model = new Komputer_model();
        $data3['komputer'] = $model->getNamaLab($id);
        $data3['idlab'] = $id;
        echo view('petugas/komputer/list_komputer', $data3);
    }
    public function index_kapro()
    {
        # code...
        $model = new Komputer_model();
        $data['komputer'] = $model->getKomputer();
        $model2 = new Lab_model();
        $data['lab'] = $model2->getLab();
        echo view('ka_pro/komputer/index', $data);
    }
    public function index2_kapro($id)
    {
        # code...
        $model = new Komputer_model();
        $data3['komputer'] = $model->getNamaLab($id);
        $data3['idlab'] = $id;
        echo view('ka_pro/komputer/list_komputer', $data3);
    }
    public function create($id)
    {
        # code...
        $model = new Lab_model();
        $data['lab'] = $model->getLab(); 
        $data['idlab'] = $id;
        return view('ka_lab/komputer/create',$data);
    }
    public function store()
{
    $validation = \Config\Services::validation();
    $lab = $this->request->getPost('lab');
    $db = \Config\Database::connect(); // Koneksi database
    $db->transStart(); // Mulai transaksi

    $data = [
        'label'     => $this->request->getPost('label'),
        'lab'       => $lab,
        'tahun'     => $this->request->getPost('tahun'),
        'kondisi'   => "NORMAL",
    ];
    
    $data2 = [
        'monitor'   => $this->request->getPost('monitor'),
        'prosesor'  => $this->request->getPost('prosesor'),
        'ram'       => $this->request->getPost('ram'),
        'os'        => $this->request->getPost('os'),
        'mouse'     => $this->request->getPost('mouse'),
        'keyboard'  => $this->request->getPost('keyboard'),
    ];

    $model = new Komputer_model();
    $model2 = new Komponen_model();
    
    // Insert komputer menggunakan Query Builder agar getInsertID() berfungsi
    $simpan = $model->insert($data);
    $id_pc = $db->insertID(); // Ambil last inserted ID dari database

    if ($id_pc > 0) {
        $data2['id_pc'] = $id_pc; // Set id_pc untuk komponen
        $simpan2 = $model2->insert($data2); // Insert komponen

        if ($simpan2) {
            $db->transComplete(); // Selesaikan transaksi
            session()->setFlashdata('success', 'Created data komputer successfully');
            return redirect()->to(base_url('komputer/index2/' . $lab));
        }
    }

    $db->transRollback(); // Batalkan transaksi jika gagal
    echo 'Insert komputer atau komponen gagal!';
}
    public function edit($id)
    {
        $model = new Komputer_model();
        $data['komputer'] = $model->getKomputer($id); 
        $data['idlab'] = $id;
        return view('ka_lab/komputer/edit',$data);
    }
    public function update()
    {
        $id=$this->request->getPost('id');
        $lab=$this->request->getPost('lab');
        $validation = \Config\Services::validation();

        $data = array(
            'label'     => $this->request->getPost('label'),
            'tahun' => $this->request->getPost('tahun'),
        );
        if ($validation->run($data, 'komputer') == FALSE) {
            session()->setFlashdata('inputs', $this->request->getPost());
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to(base_url('komputer/edit/' . $id));
        } else {
            $model = new Komputer_model();
            $ubah = $model->updateKomputer($data, $id);
            if ($ubah) {
                session()->setFlashdata('info', 'Updated data Successfully');
                return redirect()->to(base_url('komputer/index2/' .$lab));
            }
        }
    }
       public function delete($id, $idlab)
    {
        $model = new Komputer_model();
        
        try {
            // Proses penghapusan
            $hapus = $model->deleteKomputer($id); // Pastikan fungsi deleteKomputer berfungsi
            if ($hapus) {
                session()->setFlashdata('success', 'Data komputer berhasil dihapus.');
                return redirect()->to(base_url('komputer/index2/'.$idlab)); 
            } else {
                // Jika penghapusan gagal tetapi tanpa exception
                session()->setFlashdata('error', 'Data komputer gagal dihapus.');
                return redirect()->to(base_url('komputer/index2/'.$idlab)); 
            }
        } catch (\CodeIgniter\Database\Exceptions\DatabaseException $e) {
            // Jika terjadi error karena foreign key constraint
            session()->setFlashdata('error', 'Data komputer tidak bisa dihapus karena masih digunakan.');
            return redirect()->to(base_url('komputer/index2/'.$idlab)); 
        }
    }
    // public function show($id)
    // {
    //     $model = new Komponen_model();
    //     $data['komponen'] = $this->Komponen_model->getKomponen($id);
    //     $data2['komputer'] = $this->Komputer_model->getKomputer($id);
    //     echo view('ka_lab/komputer/show', $data,$data2);
    // }

    
    public function show_komputer($id_lab,$id_pc)
    {
        $data['komponen'] = $this->Komputer_model->show_komponen($id_lab,$id_pc);
        echo view('ka_lab/komputer/show', $data);
    }
    public function show_komputer_petugas($id_lab,$id_pc)
    {
        $data['komponen'] = $this->Komputer_model->show_komponen($id_lab,$id_pc);
        echo view('petugas/komputer/show', $data);
    }
    public function show_komputer_kapro($id_lab,$id_pc)
    {
        $data['komponen'] = $this->Komputer_model->show_komponen($id_lab,$id_pc);
        echo view('ka_pro/komputer/show', $data);
    }
}