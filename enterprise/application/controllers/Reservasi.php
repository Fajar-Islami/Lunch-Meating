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
        $this->session->unset_userdata('keyword');
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
        $data['title'] = 'Reservasi Tervalidasi';

        $data['admin'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
        // ngambil data dari user berdasarkan email yang ada disession, lalu ambil satu baris (row_array)

        // $data['tbl_tr'] = $this->admin->getTransaksi('1');
        $data['tbl_tr'] = $this->admin->pilihOrder('kode_transaksi', 'tbl_transaksi', 'desc', 'status', '1');
        $hal = "index";
        $this->view($data, $hal);
    }

    public function pemesanan()
    {
        $data['title'] = 'Reservasi Sementara';

        $data['admin'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
        // ngambil data dari user berdasarkan email yang ada disession, lalu ambil satu baris (row_array)

        // $data['tbl_tr'] = $this->admin->getTransaksi('0');
        $data['tbl_tr'] = $this->admin->pilihOrder('tanggal_pesan', 'tbl_transaksi', 'desc', 'status', '0');
        $hal = "pemesanan";
        $this->view($data, $hal);
    }

    public function update($id)
    {
        // $id = encode_php_tags($getId);
        $data['admin'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
        $this->admin->get('tbl_transaksi', ['kode_transaksi' => $id])['status'];
        $input = array(
            'waktu_setuju' => date('Y-m-d H:i:s'),
            'status' => 1,
            'setuju_id_admin' => $this->session->userdata('username')
        );

        // $pesan = "Pemesanan berhasil diaktifkan";
        if ($this->admin->update('tbl_transaksi', 'kode_transaksi', $id, $input)) {
            // set_pesan($pesan);   
            $this->session->set_flashdata('title', 'Aktivasi Berhasil');
            $this->session->set_flashdata('message', 'Aktivasi ' . $id);
            $this->session->set_flashdata('icon', 'success');
            $this->_sendEmail($id);
            redirect('reservasi/pemesanan');
        }
    }

    private function _sendEmail($id)
    {
        $t_nama = $this->admin->getData('tbl_transaksi', 'nama_pelanggan', 'kode_transaksi',  $id);
        $nama = $this->admin->konvertSatuan($t_nama);
        $t_waktuR = $this->admin->getData('tbl_transaksi', 'waktu_reservasi', 'kode_transaksi',  $id);
        $waktuR = $this->admin->konvertSatuan($t_waktuR);
        $t_email = $this->admin->getData('tbl_transaksi', 'email', 'kode_transaksi',  $id);
        $email = $this->admin->konvertSatuan($t_email);

        $config = [
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.gmail.com',
            'smtp_user' => 'tesprogram2000@gmail.com',
            'smtp_pass' => 'kelompok8',
            'smtp_port' => 465,
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n"
        ];

        $this->load->library('email', $config);
        $this->email->initialize($config);

        $this->email->from('tesprogram2000@gmail.com', 'Lunch Meating Restaurant');
        $this->email->to($email);

        $this->email->subject('Reservasi Lunch Meating');
        $this->email->message('<strong>Selamat ' . $nama . '</strong> Reservasi kamu pada ' . $waktuR . ' berhasil <strong>diaktifkan</strong>');

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }
}
