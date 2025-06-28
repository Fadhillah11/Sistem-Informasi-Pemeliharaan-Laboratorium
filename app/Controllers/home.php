<?php 
namespace App\Controllers;
use App\Models\User_model;
use App\Models\Lab_model;
use App\Models\Komputer_model;

class Home extends BaseController
{
    protected $User_model;
    protected $Lab_model;
    protected $Komputer_model;

    public function index_kalab()
    {
        $userModel = new User_model();
        $labModel = new Lab_model();
        $KomputerModel = new Komputer_model();
        
        $jumlahUser = $userModel->getUserCount();
        $jumlahLab = $labModel->getLabCount();
        $jumlahKomputer = $KomputerModel->getKomputerCount();
        
        return view('ka_lab/dashboard', 
        [
            'jumlahUser' => $jumlahUser,
            'jumlahLab' => $jumlahLab,
            'jumlahKomputer' => $jumlahKomputer
        ]);
    }
    public function index_kapro()
    {
        $userModel = new User_model();
        $labModel = new Lab_model();
        $KomputerModel = new Komputer_model();
        
        $jumlahUser = $userModel->getUserCount();
        $jumlahLab = $labModel->getLabCount();
        $jumlahKomputer = $KomputerModel->getKomputerCount();
        
        return view('ka_pro/dashboard',
        [
            'jumlahUser' => $jumlahUser,
            'jumlahLab' => $jumlahLab,
            'jumlahKomputer' => $jumlahKomputer
        ]);
        
    }
    public function index_petugas()
    {
        $userModel = new User_model();
        $labModel = new Lab_model();
        $KomputerModel = new Komputer_model();
        
        $jumlahUser = $userModel->getUserCount();
        $jumlahLab = $labModel->getLabCount();
        $jumlahKomputer = $KomputerModel->getKomputerCount();
        
        return view('petugas/dashboard',
        [
            'jumlahUser' => $jumlahUser,
            'jumlahLab' => $jumlahLab,
            'jumlahKomputer' => $jumlahKomputer
        ]);
        
    }
}