<?php

namespace App\Controllers;


use CodeIgniter\Controller;
use App\Models\Komponen_model;
use App\Models\Lab_model;
class Komponen extends BaseController
{
    protected $helpers = [];
    protected $Komponen_model;
    protected $Lab_model;
    public function __construct()
    {
        helper('form');
        $this->Komponen_model = new Komponen_model();
    }
    public function index()
{
    $model = new Komponen_model();
    $labModel = new Lab_model();

    // Ambil nilai filter dari request
    $labId = $this->request->getVar('filter_lab');

    // Filter data berdasarkan lab, jika ada
    if ($labId) {
        $data['komponen'] = $model->filter($labId);
    } else {
        $data['komponen'] = $model->getKomponen();
    }

    // Kirimkan data labs untuk dropdown dan filter_lab ke view
    $data['labs'] = $labModel->findAll();
    $data['filter_lab'] = $labId ?? ''; // Pastikan $filter_lab tidak undefined

    echo view('ka_lab/komponen/index', $data);
}

    
    public function create()
    {
        # code...
        $model = new Lab_model();
        $data['komponen'] = $model->getLab(); 
        return view('ka_lab/komponen/create', $data);
    }
    public function store()
    {
         // Ambil data input
        $id_lab = $this->request->getPost('id_lab');

        // Cek apakah id_lab sudah ada
        $existingLab = $this->Komponen_model->where('id_lab', $id_lab)->first();
        if ($existingLab) {
        // Jika ada, berikan pesan error dan kembalikan ke form
        session()->setFlashdata('error', 'Lab ini sudah memiliki data komponen.');
        return redirect()->back()->withInput();
        }

        $data = array(
            'monitor'     => $this->request->getPost('monitor'),
            'prosesor'     => $this->request->getPost('prosesor'),
            'ram'     => $this->request->getPost('ram'),
            'os'     => $this->request->getPost('os'),
            'mouse'     => $this->request->getPost('mouse'),
            'keyboard'     => $this->request->getPost('keyboard'),
            'id_pc'     => $this->request->getPost('id_pc'),
        );
            $model = new Komponen_model();
            $simpan = $model->insertKomponen($data);
            if ($simpan) {
                session()->setFlashdata('success', 'Created data komponen komputer successfully');
                return redirect()->to(base_url('komponen'));
            }
    }
    public function edit($id)
    {
        $model = new Komponen_model();
        $data['komponen'] = $model->getKomponen($id);
        echo view('ka_lab/komponen/edit', $data);
    }
    public function update()
    {
        $id = $this->request->getVar('id_komponen');
        $data = array(
            'monitor'     => $this->request->getPost('monitor'),
            'prosesor'     => $this->request->getPost('prosesor'),
            'ram'     => $this->request->getPost('ram'),
            'os'     => $this->request->getPost('os'),
            'mouse'     => $this->request->getPost('mouse'),
            'keyboard'     => $this->request->getPost('keyboard'),
            'id_pc'     => $this->request->getPost('id_pc'),
            );
            $model = new Komponen_model();
            $ubah = $model->updateKomponen($data, $id);
            if ($ubah) {
                session()->setFlashdata('info', 'Updated data Successfully');
                return redirect()->to(base_url('komponen'));
            }
    }
    public function delete($id){
        $hapus = $this->Komponen_model->deleteKomponen($id);
            if($hapus)
            {
                session()->setFlashdata('warning', 'Delete data successfully');
                return redirect()->to(base_url('komponen')); 
            }
    }
    public function show($id)
    {
        $data['komponen'] = $this->Komponen_model->getKomponen($id);
        echo view('ka_lab/komponen/show', $data);
    }
}