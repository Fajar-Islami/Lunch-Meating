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
        $data['title'] = 'Dashboard';
        $data['admin'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
        // ngambil data dari user berdasarkan email yang ada disession, lalu ambil satu baris (row_array)

        // Kartu
        $dapat = $this->admin->pendapatan();
        $meja = $this->admin->sisaMeja();
        $selesai = $this->admin->reservasi('status', 1);
        $tunda = $this->admin->reservasi('status', 0);
        $totalReservasi = $this->admin->reservasi();

        if ($totalReservasi < 1) {
            $data['barSelesai'] =  0;
            $data['barTunda'] =  0;
        } else {
            $data['barSelesai'] =  $selesai / $this->admin->reservasi();
            $data['barTunda'] =  $tunda / $this->admin->reservasi();
        }

        $data['ketmeja'] = $this->admin->ketMeja();
        $data['sisaMeja'] = $this->admin->konvertSatuan($meja);
        $data['harian'] = $this->admin->konvertSatuan($dapat);
        $data['reservasi'] = $selesai;
        $data['reservasiTunda'] = $tunda;
        $data['totalReservasi'] =  $this->admin->reservasi();

        // Line Chart

        // tahunan
        $bln = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'];
        $data['pTahun'] = [];

        // var_dump($this->admin->chartTahunan('04'));
        foreach ($bln as $b) {
            $data['pTahun'][] = $this->admin->chartTahunan($b);;
        }


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer', $data);
    }
}
