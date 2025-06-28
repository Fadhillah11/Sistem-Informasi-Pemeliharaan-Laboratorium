<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\Perbaikan_model;
use App\Models\pemeliharaan_model;
use App\Models\komputer_model;


class Perbaikan extends BaseController
{
    protected $helpers = [];
    protected $Perbaikan_model;
    protected $pemeliharaan_model;
    public function __construct()
    {
        helper('form');
        $this->Perbaikan_model = new Perbaikan_model();
        $this->pemeliharaan_model = new pemeliharaan_model();
    }
    public function index()
    {
        # code...
        $model = new Pemeliharaan_model();
        $data['pemeliharaan'] =   $this->pemeliharaan_model->getKerusakan();

        echo view('petugas/perbaikan/index_perbaikan', $data);
    }
    public function create($id)
    {
        # code...
        $pemeliharaanModel = new pemeliharaan_model();
        $data['pemeliharaan'] = $pemeliharaanModel->getPemeliharaan($id);
        return view('petugas/perbaikan/create',$data);
    }
    public function store()
    {
        $kondisi  = $this->request->getPost('kondisi');
        $idPemeliharaan = $this->request->getPost('id_pemeliharaan');
        $idPC =  $this->request->getPost('id_pc');
        $data = array(
            'id_pemeliharaan'     => $idPemeliharaan,
            'petugas'   => session()->get('id_user'),
            'daftar_perbaikan'     => $this->request->getPost('daftar_perbaikan'),
            'tgl_perbaikan' => date('Y-m-d H:i:s')
        );
            $model = new Perbaikan_model();
            $simpan = $model->insertPerbaikan($data);
            if ($simpan) {
               if($kondisi== "RUSAK"){
                $model2 = new pemeliharaan_model();
                $model3 = new komputer_model();
                $data2 = array(
                    'hasil'     => "TIDAK DAPAT DIPERBAIKI",
                );
                $data3 = array(
                    'kondisi'     => "RUSAK",
                );
                $model2->updatePemeliharaan($data2, $idPemeliharaan);
                $model3->updateKomputer($data3, $idPC);
                session()->setFlashdata('success', 'Created data Perbaikan successfully');
                return redirect()->to(base_url('perbaikan'));
               }else {
                $model2 = new pemeliharaan_model();
                $model3 = new komputer_model();
                $data2 = array(
                    'hasil'     => "NORMAL",
                );
                $data3 = array(
                    'kondisi'     => "NORMAL",
                );
                $model2->updatePemeliharaan($data2, $idPemeliharaan);
                $model3->updateKomputer($data3, $idPC);
                session()->setFlashdata('success', 'Created data Perbaikan successfully');
                return redirect()->to(base_url('perbaikan'));
               }
               
            }
    }
    
}