<?php

namespace App\Models;

use CodeIgniter\Model;

class Komputer_model extends Model
{
    protected $table = 'komputer'; // Nama tabel di database
    protected $primaryKey = 'id_pc'; // Primary key tabel

    protected $allowedFields = [
        'label', 'lab', 'tahun', 'kondisi'
    ]; // Tambahkan semua kolom yang boleh diisi

    // Metode untuk mendapatkan data Komputer
    public function getKomputer($id = false)
    {
        if ($id === false) {
            // Mengambil semua data Komputer
            return $this->findAll();
        } else {
            // Mengambil user berdasarkan id 
            return $this->where('id_pc', $id)->first();
        }
    }
    public function getNamaLab($id){
        return $this->db->table('komputer')
        ->join('lab', 'lab.id_lab = komputer.lab') // agar bisa menampilkan nama di data lab
            ->where('lab',$id)  // untuk mengambil inputan komputer berdasarkan id lab 
            ->get()->getResultArray(); //untuk mengambil inputan komputer berdasarkan id lab 
    }
    public function getNamaLab2(){
        return $this->db->table('komputer')
        ->join('lab', 'lab.id_lab = komputer.lab') // agar bisa menampilkan nama di data lab
            ->where('komputer.kondisi','RUSAK')  // untuk mengambil inputan komputer berdasarkan id lab 
            ->get()->getResultArray(); //untuk mengambil inputan komputer berdasarkan id lab 
    }
        public function show_komponen($id_lab, $id_pc)
    {
        return $this->db->table('komputer')
            ->join('komponen', 'komputer.id_pc = komponen.id_pc')
            ->where('komputer.id_pc', $id_pc) // Syarat komputer.id_pc = 11
            ->get()->getResultArray();
    }

    public function insertKomputer($data)
    {
        return $this->db->table($this->table)->insert($data);
    }
    public function updateKomputer($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['id_pc' => $id]);
    }
    public function deleteKomputer($id)
    {
        return $this->db->table($this->table)->delete(['id_pc' => $id]);
    }
    public function getKomputerCount()
    {
        return $this->where('kondisi', 'NORMAL')->countAllResults();
    }
    

}