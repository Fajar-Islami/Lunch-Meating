<?php
defined('BASEPATH') or exit('No direct script access allowed');

class WaktuMeja extends CI_Controller
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
        $this->load->view('waktumeja/' . $hal, $data);
        $this->load->view('templates/footer', $data);
    }

    public function cekwaktu()
    {
        $from_date = new DateTime($this->input->post('jam_mulai')); //date-formate :- YYYY-MM-DD
        $to_date = new DateTime($this->input->post('jam_selesai'));
        if ($from_date >= $to_date) //To date must be higher i think 
        {
            $this->form_validation->set_message('cekwaktu', 'Waktu selesai harus lebih besar dari waktu mulai');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    private function _validasi()
    {
        $this->form_validation->set_rules('jam_mulai', 'Jam Mulai', 'required|trim', [
            'required' => 'Harap masukan harga Jam Mulai'
        ]);
        $this->form_validation->set_rules('jam_selesai', 'Jam selesai', 'required|trim|callback_cekwaktu', [
            'required' => 'Harap masukan harga Jam selesai'
        ]);
        $this->form_validation->set_rules('kode_waktu', 'Kode Waktu', 'required|trim|is_unique[tbl_waktu_meja.kode_waktu]', [
            'required' => 'Harap masukkan kode waktu',
            'is_unique' => 'Kode ini sudah ada !!'
        ]);
    }
    public function index()
    {
        $data['title'] = 'Waktu Meja';

        $data['admin'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
        // ngambil data dari user berdasarkan email yang ada disession, lalu ambil satu baris (row_array)

        $data['twaktu_meja'] = $this->admin->getWaktuMeja();
        $hal = "index";
        $this->view($data, $hal);
    }

    public function tambahwaktumeja()
    {
        $data['title'] = 'Tambah Waktu Meja';
        $data['admin'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
        // ngambil data dari user berdasarkan email yang ada disession, lalu ambil satu baris (row_array)
        $this->_validasi();

        // Waktu
        $jam_mulai = $this->input->post('jam_mulai');
        $jam_selesai = $this->input->post('jam_selesai');
        $kode_waktu = $this->input->post('kode_waktu');


        if ($this->form_validation->run() == false) {
            // ngambil data
            $data['tbl_waktu_meja'] = $this->admin->get('tbl_waktu_meja');
            $hal = "tambah";
            $this->view($data, $hal);
        } else {

            // konverter
            $j_mulai = $this->admin->konvertwaktu_mulai($jam_mulai);
            $j_selesai = $this->admin->konvertwaktu_selesai($jam_selesai);
            $waktu = $this->admin->waktu($j_mulai);

            $input = array(
                'waktu' => $waktu,
                'jam_mulai' => $j_mulai,
                'jam_selesai' => $j_selesai,
                'kode_waktu' => $kode_waktu

            );

            // var_dump($input);
            $insert = $this->admin->insert('tbl_waktu_meja', $input);

            if ($insert) {
                set_pesan('Waktu Meja berhasil ditambahkan');
                redirect('waktumeja/index');
            } else {
                set_pesan('Watku Meja gagal ditambahkan', false);
                redirect('waktumeja/tambahwaktumeja');
            }
        }
    }

    public function editwaktumeja($getId)
    {
        $id = encode_php_tags($getId);

        $data['title'] = 'Tambah Waktu Meja';
        $data['admin'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
        // ngambil data dari user berdasarkan email yang ada disession, lalu ambil satu baris (row_array)
        $this->_validasi();

        // Waktu
        $jam_mulai = $this->input->post('jam_mulai');
        $jam_selesai = $this->input->post('jam_selesai');
        $kode_waktu = $this->input->post('kode_waktu');

        if ($this->form_validation->run() == false) {
            // ngambil data
            $data['twm'] = $this->admin->get('tbl_waktu_meja', ['id_waktu' => $id]);
            $hal = "edit";
            $this->view($data, $hal);
        } else {

            // konverter
            $j_mulai = $this->admin->konvertwaktu_mulai($jam_mulai);
            $j_selesai = $this->admin->konvertwaktu_selesai($jam_selesai);
            $waktu = $this->admin->waktu($j_mulai);

            $input = array(
                'waktu' => $waktu,
                'jam_mulai' => $j_mulai,
                'jam_selesai' => $j_selesai,
                'kode_waktu' => $kode_waktu
            );

            // var_dump($input);
            $update = $this->admin->update('tbl_waktu_meja', 'id_waktu', $id, $input);

            if ($update) {
                set_pesan('Waktu Meja berhasil diupdate');
                redirect('waktumeja/index');
            } else {
                set_pesan('Watku Meja gagal diupdate', false);
                redirect('waktumeja/tambahwaktumeja');
            }
        }
    }

    public function hapuswaktumeja($getId)
    {
        $id = encode_php_tags($getId);
        if ($this->admin->delete('tbl_waktu_meja', 'id_waktu', $id)) {
            set_pesan('data berhasil dihapus.');
        } else {
            set_pesan('data gagal dihapus.', false);
        }
        redirect('waktumeja/index');
    }
}
