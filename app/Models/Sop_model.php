<?php

namespace App\Models;

use CodeIgniter\Model;

class Sop_model extends Model
{
    protected $table = 'sop';  // Nama tabel di database

    // Metode untuk mendapatkan data user
    public function getSop($id = false)
    {
        if ($id === false) {
            // Mengambil semua data user
            return $this->findAll();
        } else {
            // Mengambil user berdasarkan id atau id_lab
            return $this->where('id_sop', $id)->first();
        }
    }
    public function getDetail($id_sop) 
    {
        // Mengambil data SOP berdasarkan array id_sop
        return $this->whereIn('id_sop', explode(',', $id_sop))->findAll();
        //explode untuk memisahkan string
    }
    
    public function insertSop($data)
    {
        return $this->db->table($this->table)->insert($data);
    }
    public function updateSop($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['id_sop' => $id]);
    }
    public function deleteSop($id)
    {
        return $this->db->table($this->table)->delete(['id_sop' => $id]);
    }
    
}