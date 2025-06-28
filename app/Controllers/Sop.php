<?php

namespace App\Controllers;


use CodeIgniter\Controller;
use App\Models\Sop_model;

class Sop extends BaseController
{
    protected $helpers = [];
    protected $Sop_model;
    public function __construct()
    {
        helper('form');
        $this->Sop_model = new Sop_model();
    }
    public function index()
    {
        # code...
        $model = new Sop_model();
        $data['sop'] = $model->getSop();
        echo view('ka_lab/sop/index', $data);
    }
    public function store()
    {
        $data = array(
            'nama_sop'     => $this->request->getPost('nama_sop')
        );
            $model = new Sop_model();
            $simpan = $model->insertSop($data);
            if ($simpan) {
                session()->setFlashdata('success', 'Created data SOP successfully');
                return redirect()->to(base_url('sop'));
            }
    }
    public function edit($id)
    {
        $model = new Sop_model();
        $data['sop'] = $model->getSop($id);
        echo view('ka_lab/sop/edit', $data);
    }
    public function update()
    {
        $id = $this->request->getVar('id_sop');
        $data = array(
            'nama_sop'     => $this->request->getPost('nama_sop')
        );
            $model = new Sop_model();
            $ubah = $model->updateSop($data, $id);
            if ($ubah) {
                session()->setFlashdata('info', 'Updated data Successfully');
                return redirect()->to(base_url('sop'));
            }
    }
    public function delete($id){
        $hapus = $this->Sop_model->deleteSop($id);
            if($hapus)
            {
                session()->setFlashdata('warning', 'Delete data successfully');
                return redirect()->to(base_url('sop')); 
            }
    }
}