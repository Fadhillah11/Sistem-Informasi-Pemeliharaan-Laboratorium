<?php

namespace App\Models;

use CodeIgniter\Model;

class   Lab_model extends Model
{
    protected $table = 'lab';  // Nama tabel di database

    // Metode untuk mendapatkan data user
    public function getLab($id = false)
    {
        if ($id === false) {
            // Mengambil semua data user
            return $this->findAll();
        } else {
            // Mengambil user berdasarkan id atau id_lab
            return $this->where('id_lab', $id)->first();
        }
    }
    public function getNama()
    {
        return $this->db->table('lab')
            ->join('user', 'user.id_user = lab.kapro') // agar bisa menampilkan nama di data lab
            ->get()->getResultArray();
    }
    
    public function insertLab($data)
    {
        return $this->db->table($this->table)->insert($data);
    }
    public function updateLab($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['id_lab' => $id]);
    }
    public function deleteLab($id)
    {
        return $this->db->table($this->table)->delete(['id_lab' => $id]);
    }
    public function getLabCount()
    {
        return $this->countAllResults();
    }
}