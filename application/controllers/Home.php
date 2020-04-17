<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
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

        $data['judul'] = 'Beranda';
        $data['minuman'] = $this->user->getFoto('app_menu', 'jenis', 'minuman');
        $data['sarapan'] = $this->user->getFoto('app_menu', 'jenis', 'sarapan');
        $data['makan_siang'] = $this->user->getFoto('app_menu', 'jenis', 'makan siang');
        $data['makan_malam'] = $this->user->getFoto('app_menu', 'jenis', 'makan malam');
        $data['galeri'] = $this->user->getFoto('app_galeri');
        $data['wmeja'] = $this->user->getWaktu('0');
        $this->load->view('templates/home_header', $data);
        $this->load->view('menu/home', $data);
        $this->load->view('templates/home_footer', $data);
    }
}
