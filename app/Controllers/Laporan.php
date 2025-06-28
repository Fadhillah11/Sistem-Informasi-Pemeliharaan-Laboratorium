<?php

namespace App\Controllers;


use CodeIgniter\Controller;
use App\Models\Pemeliharaan_model;
use App\Models\Perbaikan_model;
use App\Models\Lab_model;

class Laporan extends BaseController
{
    protected $helpers = [];
    public function __construct()
    {
        helper('form');
        $this->Pemeliharaan_model = new Pemeliharaan_model();
        $this->Perbaikan_model = new Perbaikan_model();
        $this->Lab_model = new Lab_model();
    }
    public function index()
    {
        $data['lab'] = $this->request->getGet('lab');
        $data['pc'] = $this->request->getGet('pc');
        $data['hasil'] = $this->request->getGet('hasil');
        $data['tanggal_awal'] = $this->request->getGet('tanggal_awal');
        $data['tanggal_akhir'] = $this->request->getGet('tanggal_akhir');

        // Filter data pemeliharaan dan perbaikan
        $data['pemeliharaan'] = $this->Pemeliharaan_model->filterPemeliharaan(
            $data['lab'],
            $data['pc'],
            $data['hasil'],
            $data['tanggal_awal'],
            $data['tanggal_akhir']
        );
        $data['perbaikan'] = $this->Perbaikan_model->filterPerbaikan(
            $data['lab'],
            $data['pc'],
            $data['tanggal_awal'],
            $data['tanggal_akhir']
        );
            $model = new Lab_model();
            $data['lab'] = $model->getLab();
            return view('ka_lab/laporan/lap', $data);
    }

    public function index_kapro()
    {
        $data['lab'] = $this->request->getGet('lab');
        $data['pc'] = $this->request->getGet('pc');
        $data['tanggal_awal'] = $this->request->getGet('tanggal_awal');
        $data['tanggal_akhir'] = $this->request->getGet('tanggal_akhir');

        // Filter data pemeliharaan dan perbaikan
        $data['pemeliharaan'] = $this->Pemeliharaan_model->filterPemeliharaan(
            $data['lab'],
            $data['pc'],
            $data['tanggal_awal'],
            $data['tanggal_akhir']
        );
        $data['perbaikan'] = $this->Perbaikan_model->filterPerbaikan(
            $data['lab'],
            $data['pc'],
            $data['tanggal_awal'],
            $data['tanggal_akhir']
        );
            $model = new Lab_model();
            $data['lab'] = $model->getLab();
            return view('ka_pro/laporan/lap', $data);
    }

}