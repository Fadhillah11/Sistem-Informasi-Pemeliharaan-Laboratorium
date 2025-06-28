<?php

namespace App\Models;

use CodeIgniter\Model;

class Komponen_model extends Model
{
    protected $table = 'komponen'; // Nama tabel di database
    protected $primaryKey = 'id_komponen'; // Primary key tabel

    protected $allowedFields = [
        'monitor', 'prosesor', 'ram', 'os', 'mouse', 'keyboard', 'id_pc'
    ]; // Tambahkan semua kolom yang boleh diisi

    //  untuk mendapatkan data 
    public function getKomponen($id = false)
    {
        if ($id === false) {
            return $this->db->table('komponen')
            ->join('komputer', 'komputer.id_pc = komponen.id_pc')
            ->join('lab', 'lab.id_lab = komputer.lab') // Menghubungkan komponen dengan lab melalui komputer
            ->get()->getResultArray();
        } else {
            // njupok data berdasarkan id atau 
            return $this->where('id_komponen', $id)->first();
        }
    }
    public function getKomponenWithLab($id_komponen = false)
    {
        $builder = $this->db->table('komponen')
            ->select('komponen.*, komputer.lab, lab.nama_lab') // Mengambil data komponen + lab
            ->join('komputer', 'komponen.id_pc = komputer.id_pc') // Join dengan komputer
            ->join('lab', 'komputer.lab = lab.id_lab'); // Join dengan lab

        if ($id_komponen === false) {
            return $builder->get()->getResultArray(); // Ambil semua data komponen dengan lab
        } else {
            return $builder->where('komponen.id_komponen', $id_komponen)->get()->getRowArray(); // Ambil berdasarkan id_komponen
        }
    }

    public function getNamaPc(){
        return $this->db->table('komponen')
        ->join('komputer', 'komputer.id_pc = komponen.id_pc') // agar bisa menampilkan nama di data lab
            ->get()->getResultArray();
    }
    public function filter($id)
    {
        return $this->db->table($this->table)
            ->join('komputer', 'komputer.id_pc = komponen.id_pc')
            ->join('lab', 'lab.id_lab = komputer.lab')
            ->where('komputer.lab', $id)
            ->get()->getResultArray();
    }

    public function insertKomponen($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function updateKomponen($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['id_komponen' => $id]);
    }
    public function deleteKomponen($id)
    {
        return $this->db->table($this->table)->delete(['id_komponen' => $id]);
    }
}