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
        $this->session->unset_userdata('keyword');
        // otomatis
        $this->admin->defaultMeja();
        $this->admin->hapusReservasi();
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

    private function _validasiUpdate()
    {
        $this->form_validation->set_rules('jam_mulai', 'Jam Mulai', 'required|trim', [
            'required' => 'Harap masukan harga Jam Mulai'
        ]);
        $this->form_validation->set_rules('jam_selesai', 'Jam selesai', 'required|trim|callback_cekwaktu', [
            'required' => 'Harap masukan harga Jam selesai'
        ]);
        $this->form_validation->set_rules('kode_waktu', 'Kode Waktu', 'required|trim', [
            'required' => 'Harap masukkan kode waktu'

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
        $data['title'] = 'Waktu Meja';
        $data['stitle'] = 'Tambah Waktu Meja';
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
                'waktu'         => $waktu,
                'jam_mulai'     => $j_mulai,
                'jam_selesai'   => $j_selesai,
                'kode_waktu'    => $kode_waktu,
                'waktu_id_admin' => $this->session->userdata('username')
            );

            // var_dump($input);
            $insert = $this->admin->insert('tbl_waktu_meja', $input);

            if ($insert) {
                // set_pesan('Waktu Meja berhasil ditambahkan');
                $this->session->set_flashdata('title', 'Berhasil !!');
                $this->session->set_flashdata('message', 'Data waktu meja berhasil ditambahkan');
                $this->session->set_flashdata('icon', 'success');
                redirect('waktumeja/index');
            } else {
                // set_pesan('Watku Meja gagal ditambahkan', false);
                $this->session->set_flashdata('title', 'Ooopsss..');
                $this->session->set_flashdata('message', 'Data waktu meja gagal ditambahkan');
                $this->session->set_flashdata('icon', 'error');
                redirect('waktumeja/tambahwaktumeja');
            }
        }
    }

    public function editwaktumeja($getId)
    {
        $id = encode_php_tags($getId);
        $data['title'] = 'Waktu Meja';
        $data['stitle'] = 'Edit Waktu Meja';
        $data['admin'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
        // ngambil data dari user berdasarkan email yang ada disession, lalu ambil satu baris (row_array)
        $this->_validasiUpdate();

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
                'kode_waktu' => $kode_waktu,
                'waktu_id_admin' => $this->session->userdata('username')
            );

            // var_dump($input);
            $update = $this->admin->update('tbl_waktu_meja', 'id_waktu', $id, $input);

            if ($update) {
                // set_pesan('Waktu Meja berhasil diupdate');
                $this->session->set_flashdata('title', 'Berhasil !!');
                $this->session->set_flashdata('message', 'Data waktu meja berhasil diperbarui');
                $this->session->set_flashdata('icon', 'success');
                redirect('waktumeja/index');
            } else {
                // set_pesan('Watku Meja gagal diupdate', false);
                $this->session->set_flashdata('title', 'Ooopsss..');
                $this->session->set_flashdata('message', 'Data waktu meja gagal diperbarui');
                $this->session->set_flashdata('icon', 'error');
                redirect('waktumeja/tambahwaktumeja');
            }
        }
    }

    public function hapuswaktumeja($getId)

    {
        $id = encode_php_tags($getId);
        $result = $this->admin->hapusWaktu($id);

        if ($result > 0) {
            $this->session->set_flashdata('title', 'Ooopsss..');
            $this->session->set_flashdata('message', 'Data waktu meja gagal dihapus');
            $this->session->set_flashdata('footer', 'Data meja pada waktu ini harap dihapus dahulu');
            $this->session->set_flashdata('icon', 'error');
        } else {
            $this->admin->delete('tbl_waktu_meja', 'id_waktu', $id);
            $this->session->set_flashdata('title', 'Berhasil !!');
            $this->session->set_flashdata('message', 'Data waktu meja berhasil dihapus');
            $this->session->set_flashdata('icon', 'success');
        }
        redirect('waktumeja/index');
    }
}
