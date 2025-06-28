<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Lab_model;
use App\Models\User_model; //untuk manggil data yg ada di tabel user

class Lab extends BaseController
{
    protected $helpers = [];
    protected $Lab_model;
    protected $User_model; //untuk manggil data yg ada di tabel user
    public function __construct()
    {
        helper('form');
        $this->Lab_model = new Lab_model();
        $this->User_model = new User_model(); //untuk manggil data yg ada di tabel user
    }
    public function index()
    {
        # code...
        $model = new Lab_model();
        $data['lab'] = $model->getNama();
        echo view('ka_lab/lab/index', $data);
       
    }
    public function create()
    {
        # code...
        $model = new User_model();
        $data['user'] = $model->getUserKapro(); // USER YG KELUAR HANYA KAPRO
        return view('ka_lab/lab/create', $data);
    }
    public function store()
    {
        $validation =  \Config\Services::validation();
        $data = array(
            'nama_lab'     => $this->request->getPost('nama_lab'),
            'kapro'   => $this->request->getPost('kapro'),
        );

        if ($validation->run($data, 'lab') == FALSE) {
            session()->setFlashdata('inputs', $this->request->getPost());
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to(base_url('lab/create'));
        } else {
            $model = new Lab_model();
            $simpan = $model->insertLab($data);
            if ($simpan) {
                session()->setFlashdata('success', 'Created data user successfully');
                return redirect()->to(base_url('lab'));
            }
        }
    }
    public function edit($id)
    {
        $model2 = new User_model();
        $data['nama'] = $model2->getUserKapro(); // USER YG KELUAR HANYA KAPRO
        $model = new Lab_model();
        $data['user'] = $model->getLab($id); 
        return view('ka_lab/lab/edit', $data);
    }
    public function update()
    {
        $id = $this->request->getVar('id_lab');
        $validation = \Config\Services::validation();

        $data = array(
            'nama_lab'     => $this->request->getPost('nama_lab'),
            'kapro'   => $this->request->getPost('kapro')
        );
        if ($validation->run($data, 'lab') == FALSE) {
            session()->setFlashdata('inputs', $this->request->getPost());
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to(base_url('lab/edit/' . $id));
        } else {
            $model = new Lab_model();
            $ubah = $model->updateLab($data, $id);
            if ($ubah) {
                session()->setFlashdata('info', 'Updated data Successfully');
                return redirect()->to(base_url('lab'));
            }
        }
    }
    public function delete($id)
    {
        $model = new Lab_model();
        
        try {
            // Proses penghapusan
            $hapus = $this->Lab_model->deleteLab($id);
                    if($hapus)
                    {
                        session()->setFlashdata('success', 'Delete data successfully');
                        return redirect()->to(base_url('lab')); 
                    }
        } catch (\CodeIgniter\Database\Exceptions\DatabaseException $e) {
            // Jika terjadi error karena foreign key constraint, tampilkan pesan
            session()->setFlashdata('error', 'Laboratorium tidak bisa dihapus karena masih digunakan dalam data komputer.');
        }

        // Redirect atau tampilkan view setelah delete
        return redirect()->to(base_url('lab/index'));
    }

}