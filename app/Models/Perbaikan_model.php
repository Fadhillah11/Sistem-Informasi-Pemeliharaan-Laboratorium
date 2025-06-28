<?php

namespace App\Models;

use CodeIgniter\Model;

class Perbaikan_model extends Model
{
    protected $table = 'perbaikan';  // Nama tabel di database

    // Metode untuk mendapatkan data user
    public function getPerbaikan($id = false)
    {
        if ($id === false) {
            // Mengambil semua data user
            return $this->findAll();
        } else {
            // Mengambil user berdasarkan id 
            return $this->where('id_Perbaikan', $id)->first();
        }
    }
  
    public function getNama()
    {
        return $this->db->table('lab')
            ->join('user', 'user.id_user = lab.kapro') // agar bisa menampilkan nama di data 
            ->get()->getResultArray();
    }
    
    public function insertPerbaikan($data)
    {
        return $this->db->table($this->table)->insert($data);
    }
    
    public function filterPerbaikan($lab = null, $pc = null, $tanggal_awal = null, $tanggal_akhir = null)
    {
        $query = $this->db->table('perbaikan')
        ->join('pemeliharaan', 'pemeliharaan.id_pemeliharaan = perbaikan.id_pemeliharaan')
        ->join('komputer', 'komputer.id_pc = pemeliharaan.pc')
        ->join('lab', 'lab.id_lab = komputer.lab')
        ->join('user', 'user.id_user = perbaikan.petugas') 
        ->select('perbaikan.tgl_perbaikan, pemeliharaan.kerusakan, komputer.label, lab.nama_lab, user.nama AS petugas, perbaikan.daftar_perbaikan');
    

        if ($lab) {
            $query->where('komputer.lab', $lab);
        }

        if ($pc) {
            $query->where('komputer.id_pc', $pc);
        }

        if ($tanggal_awal && $tanggal_akhir) {
            $query->where('perbaikan.tgl_perbaikan >=', $tanggal_awal);
            $query->where('perbaikan.tgl_perbaikan <=', $tanggal_akhir);
        }

        return $query->get()->getResultArray();
    }

    
    
}