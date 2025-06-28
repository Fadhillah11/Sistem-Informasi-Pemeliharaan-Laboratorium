<?php

namespace App\Models;

use CodeIgniter\Model;

class User_model extends Model
{
    protected $table = 'user';  // Nama tabel di database

    // Metode untuk mendapatkan data user
    public function getUser($id = false)
    {
        if ($id === false) {
            // Mengambil semua data user
            return $this->findAll();
        } else {
            // Mengambil user berdasarkan id atau id_user
            return $this->where('id_user', $id)->first();
            
        }
    }
    public function getUserKapro()
    {
            // Mengambil user berdasarkan Jabatan KAPRO ( INI UNTUK INPUT DATA LAB )
            return $this->where('jabatan', "KAPRO")->findAll();
    }
    public function insertUsers($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function updateUsers($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['id_user' => $id]);
    }

    public function getUserCount()
    {
        return $this->countAllResults();
    }
}