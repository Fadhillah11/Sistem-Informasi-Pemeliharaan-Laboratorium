<?php namespace App\Controllers;

class Dashboard extends BaseController
{
    public function index()
    {
        return view('login');
        $data['total_lab'] = $this->LaboratoriumModel->get_total_laboratorium();

    }
}