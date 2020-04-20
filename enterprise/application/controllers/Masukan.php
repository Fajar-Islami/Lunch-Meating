<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Masukan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();

        $this->load->model('Admin_model', 'admin');

        // otomatis
        $this->admin->defaultMeja();
        $this->admin->hapusReservasi(time());
    }


    public function index()
    {
        $data['title'] = 'Masukan, kritik dan saran';
        $data['masukan'] = $this->admin->pilihOrder('waktu_diterima', 'app_masukan', 'desc');
        $data['admin'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
        // ngambil data dari user berdasarkan email yang ada disession, lalu ambil satu baris (row_array)

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('masukan/index', $data);
        $this->load->view('templates/footer');
    }
}
