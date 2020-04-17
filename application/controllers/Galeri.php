<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Galeri extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model', 'user');
        $this->load->library('form_validation');

        // otomatis
        $this->user->defaultMeja();
        $this->user->hapusReservasi(time());
    }

    // Home
    public function index()
    {

        $data['judul'] = 'Galeri';
        $data['galeri'] = $this->user->getFoto('app_galeri');
        $data['wmeja'] = $this->user->getWaktu('0');
        $this->load->view('templates/home_header', $data);
        $this->load->view('templates/header', $data);
        $this->load->view('menu/galeri', $data);
        $this->load->view('templates/home_footer');
    }
}
