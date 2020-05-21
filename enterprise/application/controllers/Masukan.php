<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Masukan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->session->unset_userdata('keyword');
        $this->load->model('Admin_model', 'admin');

        // otomatis
        $this->admin->defaultMeja();
        $this->admin->hapusReservasi();
    }


    public function index()
    {
        // Pagination
        $this->load->library('pagination');


        $data['keyword'] = $this->session->userdata('keyword');

        // //Config
        $this->db->from('app_masukan');

        $config['total_rows'] = $this->db->count_all_results();
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = 10;

        //Initialize
        $this->pagination->initialize($config);

        $data['start'] = $this->uri->segment(3);
        $data['masukan'] = $this->admin->getMasukan($config['per_page'], $data['start'], $data['keyword']);
        $data['title'] = 'Tanggapan Pelanggan';
        $data['admin'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
        // ngambil data dari user berdasarkan email yang ada disession, lalu ambil satu baris (row_array)

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('masukan/index', $data);
        $this->load->view('templates/footer');
    }

    public function ajax()
    {
        // Pagination
        $this->load->library('pagination');

        // Ambil data search
        if ($this->input->post('submit')) {
            $data['keyword'] = $this->input->post('keyword');
            $this->session->set_userdata('keyword', $data['keyword']);
        } else {
            $data['keyword'] = $this->session->userdata('keyword');
        }
        $carian = $data['keyword'];
        //Config
        $this->db->like('nama', $data['keyword']);
        $this->db->or_like('email', $data['keyword']);
        $this->db->or_like('jenis_kel', $data['keyword']);
        $this->db->or_like('no_telp', $data['keyword']);
        $this->db->or_like('alamat', $data['keyword']);
        $this->db->or_like('pesan', $data['keyword']);
        $this->db->or_like('waktu_diterima', $data['keyword']);
        // $this->db->having("tanggal LIKE '%$carian%' ");
        // $this->db->select("DATE_FORMAT(waktu_diterima, '%d/%m/%Y %H:%i:%s') as 'tanggal'");
        $this->db->from('app_masukan');


        $config['total_rows'] = $this->db->count_all_results();
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = 10;

        //Initialize
        $this->pagination->initialize($config);

        $data['start'] = $this->uri->segment(3);
        $data['masukan'] = $this->admin->getMasukan($config['per_page'], $data['start'], $data['keyword']);
        $data['title'] = 'Tanggapan Pelanggan';
        $data['admin'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
        // ngambil data dari user berdasarkan email yang ada disession, lalu ambil satu baris (row_array)

        if (!$this->input->is_ajax_request()) $this->load->view('templates/header', $data);
        if (!$this->input->is_ajax_request()) $this->load->view('templates/sidebar', $data);
        if (!$this->input->is_ajax_request()) $this->load->view('templates/topbar', $data);
        $this->load->view('masukan/index', $data);
        if (!$this->input->is_ajax_request()) $this->load->view('templates/footer');
    }
}
