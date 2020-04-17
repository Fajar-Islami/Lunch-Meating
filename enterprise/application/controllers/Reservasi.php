<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Reservasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();

        $this->load->model('Admin_model', 'admin');
        $this->load->library('form_validation');

        // otomatis
        $this->admin->defaultMeja();
        $this->admin->hapusReservasi(time());
    }

    public function view($data, $hal)
    {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('reservasi/' . $hal, $data);
        $this->load->view('templates/footer', $data);
    }

    public function index()
    {
        $data['title'] = 'Daftar Reservasi';

        $data['admin'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
        // ngambil data dari user berdasarkan email yang ada disession, lalu ambil satu baris (row_array)

        $data['tbl_tr'] = $this->admin->getTransaksi('1');
        $hal = "index";
        $this->view($data, $hal);
    }

    public function pemesanan()
    {
        $data['title'] = 'Pemesanan Reservasi';

        $data['admin'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
        // ngambil data dari user berdasarkan email yang ada disession, lalu ambil satu baris (row_array)

        $data['tbl_tr'] = $this->admin->getTransaksi('0');
        $hal = "pemesanan";
        $this->view($data, $hal);
    }

    public function update($id)
    {
        // $id = encode_php_tags($getId);
        $data['admin'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
        $this->admin->get('tbl_transaksi', ['kode_transaksi' => $id])['status'];
        $input = array(
            'status' => 1
        );

        $pesan = "Pemesanan berhasil diaktifkan";
        if ($this->admin->update('tbl_transaksi', 'kode_transaksi', $id, $input)) {
            // set_pesan($pesan);
            $this->session->set_flashdata('message', 'Aktivasi' . $id);
            redirect('reservasi/pemesanan');
        }
    }
}
