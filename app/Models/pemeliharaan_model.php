<?php

namespace App\Models;

use CodeIgniter\Model;

class pemeliharaan_model extends Model
{
    protected $table = 'pemeliharaan';  // Nama tabel di database

    // Metode untuk mendapatkan data Komputer
    public function getPemeliharaan($id = false)
    {
        if ($id === false) {
            // Mengambil semua data Komputer
            return $this->findAll();
        } else {
            // Mengambil user berdasarkan id 
            return $this
            ->join('komputer', 'komputer.id_pc = pemeliharaan.pc')
            ->where('id_pemeliharaan', $id) ->get()
            ->getResultArray();;
        }
    }
    // public function getDetail($id)
    // {
    //     return $this->db->table('pemeliharaan')
    //         ->join('komputer', 'komputer.id_pc = pemeliharaan.pc') 
    //         ->where('pemeliharaan.pc', $id)
    //         ->orderBy('pemeliharaan.id_pemeliharaan', 'DESC') // Mengurutkan berdasarkan kolom id atau tanggal secara menurun
    //         ->limit(1) // Mengambil hanya satu data terbaru
    //         ->get()->getResultArray();
    // }
    public function getDetail($id)
    {
        return $this->db->table($this->table)
            ->join('komputer', 'komputer.id_pc = pemeliharaan.pc')
            ->join('user', 'user.id_user = pemeliharaan.id_user') // Join ke tabel user
            ->join('lab', 'lab.id_lab = komputer.lab') // Join ke tabel lab
            ->select('pemeliharaan.*, komputer.label, user.nama AS nama_petugas, lab.nama_lab AS nama_lab') // Alias nama petugas & lab
            ->where('pemeliharaan.pc', $id)
            ->orderBy('pemeliharaan.id_pemeliharaan', 'DESC') // Urutkan dari yang terbaru
            ->limit(1) // Hanya ambil satu data terbaru
            ->get()
            ->getResultArray(); // Mengembalikan array
    }
    
    public function getKerusakan() // untuk tampilan index di menu perbaikan
    {
        return $this->db->table('pemeliharaan')
        ->join('komputer', 'komputer.id_pc = pemeliharaan.pc')
        ->join('user', 'user.id_user = pemeliharaan.id_user')
        ->where('pemeliharaan.hasil', "PERBAIKAN")
        ->get()
        ->getResultArray();
        
    }
    public function getNamaLab($id){
        return $this->db->table('komputer') // mengambil data dari tabel komputer
        ->join('lab', 'lab.id_lab = komputer.lab') // agar bisa menampilkan nama di data lab
            ->where('lab',$id)  // untuk mengambil inputan komputer berdasarkan id lab 
            ->get()->getResultArray();
    }

    public function insertPemeliharaan($data)
    {
        return $this->db->table($this->table)->insert($data);
    }
    public function deleteKomputer($id)
    {
        return $this->db->table($this->table)->delete(['id_pc' => $id]);
    }
    public function updatePemeliharaan($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['id_pemeliharaan' => $id]);
    }
   
    public function filterPemeliharaan($lab = null, $pc = null, $hasil = null, $tanggal_awal = null, $tanggal_akhir = null)
    {
        $query = $this->db->table($this->table)
            ->join('komputer', 'komputer.id_pc = pemeliharaan.pc')
            ->join('lab', 'lab.id_lab = komputer.lab')
            ->select('pemeliharaan.*, komputer.label, user.nama ,lab.nama_lab')
            ->join('user', 'user.id_user = pemeliharaan.id_user');

        if ($lab) {
            $query->where('komputer.lab', $lab);
        }

        if ($pc) {
            $query->where('komputer.id_pc', $pc);
        }
        if ($pc) {
            $query->where('pemeliharaan', $hasil);
        }
        if ($hasil) { // Tambahkan filter hasil
            $query->where('pemeliharaan.hasil', $hasil);
        }

        if ($tanggal_awal && $tanggal_akhir) {
            $query->where('pemeliharaan.tgl >=', $tanggal_awal);
            $query->where('pemeliharaan.tgl <=', $tanggal_akhir);
        }

        return $query->get()->getResultArray();
    }
    // public function checkExistingData($pc, $month, $year)
    // {
    //     return $this->db->table($this->table)
    //         ->where('pc', $pc)
    //         ->where('MONTH(tgl)', $month)
    //         ->where('YEAR(tgl)', $year)
    //         ->countAllResults();
    // }
}