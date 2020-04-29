<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Staf extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model', 'user');
        $this->load->library('form_validation');

        // otomatis
        $this->user->defaultMeja();
        $this->user->hapusReservasi();
    }

    // Home
    public function index()
    {

        $data['judul'] = 'Staf';
        $data['staf'] = $this->user->getFoto('app_staf');
        $data['wmeja'] = $this->user->getWaktu('0');
        $this->load->view('templates/home_header', $data);
        $this->load->view('templates/header', $data);
        $this->load->view('menu/staf', $data);
        $this->load->view('templates/home_footer');
    }
}
