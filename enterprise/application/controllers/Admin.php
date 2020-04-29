<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();

        $this->load->model('Admin_model', 'admin');
        $this->session->unset_userdata('keyword');
        // otomatis
        $this->admin->defaultMeja();
        $this->admin->hapusReservasi();
    }


    public function index()
    {
        // $pembilang = $this->admin->reservasi();

        // $hariIni = time() - ((time() % 86400) + 25200);
        // $hariBesok = (time() - ((time() % 86400) + 25200)) + 86400;

        $dapat = $this->admin->pendapatan();
        $meja = $this->admin->sisaMeja();
        $ket_meja = $this->admin->ketMeja();

        $data['ketmeja'] = $this->admin->ketMeja();
        $data['sisaMeja'] = $this->admin->konvertSatuan($meja);
        $data['harian'] = $this->admin->konvertSatuan($dapat);
        $data['reservasi'] = $this->admin->reservasi('status', 1);
        $data['reservasiTunda'] = $this->admin->reservasi('status', 0);
        $data['totalReservasi'] = $this->admin->reservasi();
        $data['title'] = 'Dashboard';
        $data['admin'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
        // ngambil data dari user berdasarkan email yang ada disession, lalu ambil satu baris (row_array)

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }
}
