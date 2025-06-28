<?php

namespace App\Controllers;

use Dompdf\Dompdf;
use Dompdf\Options;
use App\Models\Perbaikan_model;
use App\Models\Pemeliharaan_model;

class PdfController extends BaseController
{
    protected $helpers = [];
    public function __construct()
    {
        helper('form');
        $this->Pemeliharaan_model = new Pemeliharaan_model();
        $this->Perbaikan_model = new Perbaikan_model();
    }
    public function cetakPdf()
    {
        // Ambil filter dari request
        $lab = $this->request->getVar('lab');
        $pc = $this->request->getVar('pc');
        $tanggal_awal = $this->request->getVar('tanggal_awal');
        $tanggal_akhir = $this->request->getVar('tanggal_akhir');
        
        // Ambil data dari model sesuai filter
        $data['pemeliharaan'] = $this->Pemeliharaan_model->filterPemeliharaan($lab, $pc, $tanggal_awal, $tanggal_akhir);
        $data['perbaikan'] = $this->Perbaikan_model->filterPerbaikan($lab, $pc, $tanggal_awal, $tanggal_akhir);
        
        // Tambahkan variabel tanggal ke $data
        $data['tanggal_awal'] = $tanggal_awal;
        $data['tanggal_akhir'] = $tanggal_akhir;
        
        // Kirim data ke view untuk HTML
        return view('ka_lab/laporan/pdf_template', $data);
    }
    
    public function cetakPdf2()
    {
        // Ambil filter dari request
        $lab = $this->request->getVar('lab');
        $pc = $this->request->getVar('pc');
        $tanggal_awal = $this->request->getVar('tanggal_awal');
        $tanggal_akhir = $this->request->getVar('tanggal_akhir');
    
    
        // Ambil data dari model sesuai filter
        $data['pemeliharaan'] = $this->Pemeliharaan_model->filterPemeliharaan($lab, $pc, $tanggal_awal, $tanggal_akhir);
        $data['perbaikan'] = $this->Perbaikan_model->filterPerbaikan($lab, $pc, $tanggal_awal, $tanggal_akhir);
    
        // Tambahkan variabel tanggal ke $data
        $data['tanggal_awal'] = $tanggal_awal;
        $data['tanggal_akhir'] = $tanggal_akhir;
    
    
        // Kirim data ke view PDF
        $html = view('ka_pro/laporan/pdf_template', $data);
        // echo $html;
        // die();
    
        // Buat PDF menggunakan Dompdf
        $options = new Options();
        $options->set('defaultFont', 'Arial');
        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        ob_clean();
        $dompdf->render();
    
        // Unduh atau tampilkan PDF
        $dompdf->stream("laporan_pemeliharaan.pdf", ["Attachment" => false]);
    }

}