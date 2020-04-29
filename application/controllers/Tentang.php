<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tentang extends CI_Controller
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

        $data['judul'] = 'Tentang';
        $data['minuman'] = $this->user->getFoto('app_menu', 'jenis', 'minuman');
        $data['sarapan'] = $this->user->getFoto('app_menu', 'jenis', 'sarapan');
        $data['makan_siang'] = $this->user->getFoto('app_menu', 'jenis', 'makan siang');
        $data['makan_malam'] = $this->user->getFoto('app_menu', 'jenis', 'makan malam');
        $data['wmeja'] = $this->user->getWaktu('0');
        $this->load->view('templates/home_header', $data);
        $this->load->view('templates/header', $data);
        $this->load->view('menu/tentang', $data);
        $this->load->view('templates/home_footer');
    }
}
