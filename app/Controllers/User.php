<?php

namespace App\Controllers;


use CodeIgniter\Controller;
use App\Models\User_model;

class User extends BaseController
{
    protected $helpers = [];
    protected $User_model;
    public function __construct()
    {
        helper('form');
        $this->User_model = new User_model();
    }
    public function index()
    {
        # code...
        $model = new User_model();
        $data['user'] = $model->getUser();
        echo view('ka_lab/user/index', $data);
    }
    public function create()
    {
        # code...
        return view('ka_lab/user/create');
    }
    public function store()
    {
        $validation =  \Config\Services::validation();
        $data = array(
            'username'     => $this->request->getPost('username'),
            'password'   => md5($this->request->getPost('password')),
            'nama'   => $this->request->getPost('nama'),
            'jabatan'   => $this->request->getPost('jabatan'),
            'no_tlp'   => $this->request->getPost('no_tlp'),
            'alamat'   => $this->request->getPost('alamat'),
            'jenis_kelamin'   => $this->request->getPost('jenis_kelamin'),
            'status'   => $this->request->getPost('status')
        );

        if ($validation->run($data, 'user') == FALSE) {
            session()->setFlashdata('inputs', $this->request->getPost());
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to(base_url('user/create'));
        } else {
            $model = new User_model();
            $simpan = $model->insertUsers($data);
            if ($simpan) {
                session()->setFlashdata('success', 'Created data user successfully');
                return redirect()->to(base_url('user'));
            }
        }
    }
    public function edit($id)
    {
        $model = new User_model();
        $data['user'] = $model->getUser($id);
        echo view('ka_lab/user/edit', $data);
    }
  
    public function edit_profil()
    {
        // Ambil id_user dari sesi
        $id_user = session()->get('id_user');
        // Jika id_user tidak ada di sesi, redirect ke halaman login
        if (!$id_user) {
            return redirect()->to('/login');
        }
        // Inisialisasi model
        $model = new User_model();
        // Ambil data user berdasarkan id_user dari sesi
        $data['user'] = $this->User_model->getUser($id_user)->getRowArray();

        // Jika user tidak ditemukan, redirect ke halaman error
        if (!$data['user']) {
            return redirect()->to('/error-page');
        }

        // Tampilkan view dengan data user
        return view('profil/edit_profil', $data);
    }

    public function showModalData()
    {
        // Ambil id_user dari sesi
        $id_user = session()->get('id_user');
        $model = new User_model();
        // Ambil data user dari database berdasarkan id_user
        $data['user'] = $model->getUser($id_user);
        // Return data user sebagai JSON untuk modal
        return $this->response->setJSON($data);
    }
    
    public function update()
    {
        $id = $this->request->getVar('id_user');
        $jabatan = $this->request->getPost('jabatan');
        $validation = \Config\Services::validation();

        $data = array(
            'username'     => $this->request->getPost('username'),
            // 'password'   => md5($this->request->getPost('password')),
            'nama'   => $this->request->getPost('nama'),
            'jabatan'   => $this->request->getPost('jabatan'),
            'no_tlp'   => $this->request->getPost('no_tlp'),
            'alamat'   => $this->request->getPost('alamat'),
            'jenis_kelamin'   => $this->request->getPost('jenis_kelamin'),
            'status'   => $this->request->getPost('status')
        );
            $model = new User_model();
            $ubah = $model->updateUsers($data, $id);
            if ($ubah) {
                if($jabatan=="KALAB"){
                    session()->setFlashdata('info', 'Updated data Successfully');
                    return redirect()->to(base_url('home/index_kalab'));
                }elseif($jabatan=="KAPRO"){
                    session()->setFlashdata('info', 'Updated data Successfully');
                return redirect()->to(base_url('home/index_kapro'));
                }else{
                    session()->setFlashdata('info', 'Updated data Successfully');
                return redirect()->to(base_url('home/index_petugas'));
                }
            }
    }

    public function update_kalab()
    {
        $id = $this->request->getVar('id_user'); // Ambil ID dari form
        $model = new User_model();

        // Ambil data user yang akan diperbarui
        $userData = $model->getUser($id);

        if (!$userData) {
            // Jika user tidak ditemukan, tampilkan pesan error
            session()->setFlashdata('error', 'Data user tidak ditemukan.');
            return redirect()->to(base_url('user'));
        }

        // Siapkan data untuk diupdate
        $data = [
            'username'      => $this->request->getPost('username'),
            'nama'          => $this->request->getPost('nama'),
            'jabatan'       => $this->request->getPost('jabatan'),
            'no_tlp'        => $this->request->getPost('no_tlp'),
            'alamat'        => $this->request->getPost('alamat'),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'status'        => $this->request->getPost('status'),
        ];

        // Periksa apakah ada input baru untuk password
        $password = $this->request->getPost('password');
        if (!empty($password)) {
            $data['password'] = md5($password); // Update password jika ada input baru
        }

        // Update data user
        $update = $model->updateUsers($data, $id);

        if ($update) {
            session()->setFlashdata('success', 'Data berhasil diperbarui.');
        } else {
            session()->setFlashdata('error', 'Gagal memperbarui data.');
        }

        return redirect()->to(base_url('user'));
    }

}