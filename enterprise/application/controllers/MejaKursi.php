<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MejaKursi extends CI_Controller
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
        $this->load->view('mejakursi/' . $hal, $data);
        $this->load->view('templates/footer', $data);
    }

    public function index()
    {
        $data['title'] = 'Meja dan Kursi';
        $data['admin'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
        // ngambil data dari user berdasarkan email yang ada disession, lalu ambil satu baris (row_array)

        $data['meja'] = $this->admin->getMeja();
        $hal = "index";
        $this->view($data, $hal);
    }

    private function _validasimeja()
    {
        $this->form_validation->set_rules('id_waktu_meja', 'Waktu', 'required|trim|is_unique[tbl_meja.id_waktu_meja]', [
            'required' => 'Harap pilih waktu',
            'is_unique' => 'Waktu ini sudah ada !!'
        ]);
        $this->form_validation->set_rules('meja_4', 'Meja 4', 'required|trim|greater_than[0]', [
            'required' => 'Harap masukan harga Meja 4 kursi',
            'greater_than' => 'Harus lebih besar dari 0'
        ]);
        $this->form_validation->set_rules('default_meja4', 'Default Meja 4', 'required|trim|greater_than[0]', [
            'required' => 'Harap masukan jumlah default Meja 4 kursi',
            'greater_than' => 'Harus lebih besar dari 0'
        ]);
        $this->form_validation->set_rules('harga_meja_4', 'Harga Meja 4', 'required|trim|greater_than[0]', [
            'required' => 'Harap masukan Meja 4 kursi',
            'greater_than' => 'Harus lebih besar dari 0'
        ]);
        $this->form_validation->set_rules('meja_2', 'Meja 2', 'required|trim|greater_than[0]', [
            'required' => 'Harap masukan Meja 2 kursi',
            'greater_than' => 'Harus lebih besar dari 0'
        ]);
        $this->form_validation->set_rules('harga_meja_2', 'Harga Meja 2', 'required|trim|greater_than[0]', [
            'required' => 'Harap masukan harga Meja 2 kursi',
            'greater_than' => 'Harus lebih besar dari 0'
        ]);
        $this->form_validation->set_rules('default_meja2', 'Default Meja 2', 'required|trim|greater_than[0]', [
            'required' => 'Harap masukan jumlah default Meja 2 kursi',
            'greater_than' => 'Harus lebih besar dari 0'
        ]);
    }

    private function _validasimejaedit()
    {
        $this->form_validation->set_rules('id_waktu_meja', 'Waktu', 'required|trim', [
            'required' => 'Harap pilih waktu'
        ]);
        $this->form_validation->set_rules('meja_4', 'Meja 4', 'required|trim|greater_than[0]', [
            'required' => 'Harap masukan harga Meja 4 kursi',
            'greater_than' => 'Harus lebih besar dari 0'
        ]);
        $this->form_validation->set_rules('default_meja4', 'Default Meja 4', 'required|trim|greater_than[0]', [
            'required' => 'Harap masukan jumlah default Meja 4 kursi',
            'greater_than' => 'Harus lebih besar dari 0'
        ]);
        $this->form_validation->set_rules('harga_meja_4', 'Harga Meja 4', 'required|trim|greater_than[0]', [
            'required' => 'Harap masukan Meja 4 kursi',
            'greater_than' => 'Harus lebih besar dari 0'
        ]);
        $this->form_validation->set_rules('meja_2', 'Meja 2', 'required|trim|greater_than[0]', [
            'required' => 'Harap masukan Meja 2 kursi',
            'greater_than' => 'Harus lebih besar dari 0'
        ]);
        $this->form_validation->set_rules('harga_meja_2', 'Harga Meja 2', 'required|trim|greater_than[0]', [
            'required' => 'Harap masukan harga Meja 2 kursi',
            'greater_than' => 'Harus lebih besar dari 0'
        ]);
        $this->form_validation->set_rules('default_meja2', 'Default Meja 2', 'required|trim|greater_than[0]', [
            'required' => 'Harap masukan jumlah default Meja 2 kursi',
            'greater_than' => 'Harus lebih besar dari 0'
        ]);
    }

    public function tambahmejakursi()
    {
        $data['title'] = 'Tambah Meja Kursi';
        $data['admin'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
        // ngambil data dari user berdasarkan email yang ada disession, lalu ambil satu baris (row_array)
        $this->_validasimeja();

        if ($this->form_validation->run() == false) {
            // ngambil data
            $data['tbl_waktu_meja'] = $this->admin->pilihWaktu();

            $hal = "tambah";
            $this->view($data, $hal);
        } else {
            // $input = $this->input->post(null, true);
            $input = $this->input->post(null, true);
            $input_data = [
                'id_waktu_meja'          => $input['id_waktu_meja'],
                'meja_4'                 => $input['meja_4'],
                'default_meja4'          => $input['default_meja4'],
                'harga_meja_4'            => $input['harga_meja_4'],
                'meja_2'                 => $input['meja_2'],
                'default_meja2'          => $input['default_meja2'],
                'harga_meja_2'            => $input['harga_meja_2'],
                'meja_id_admin'          => $this->session->userdata('username')
            ];
            $insert = $this->admin->insert('tbl_meja', $input_data);

            if ($insert) {
                set_pesan('Meja berhasil ditambahkan');
                redirect('mejakursi/index');
            } else {
                set_pesan('Meja gagal ditambahkan', false);
                redirect('mejakursi/tambahmejakursi');
            }
        }
    }

    public function editmejakursi($getId)
    {
        $id = encode_php_tags($getId);

        $data['title'] = 'Edit Meja Kursi';
        $data['admin'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
        // ngambil data dari user berdasarkan email yang ada disession, lalu ambil satu baris (row_array)

        $this->_validasimejaedit();

        if ($this->form_validation->run() == false) {
            // ngambil data
            // $data['twaktu_meja'] = $this->admin->get('tbl_waktu_meja');
            $data['twaktu_meja'] = $this->admin->pilihWaktu();
            $data['tmeja'] = $this->admin->get('tbl_meja', ['id_meja' => $id]);

            $hal = "edit";
            $this->view($data, $hal);
        } else {
            $input = $this->input->post(null, true);
            $input_data = [
                'id_waktu_meja'          => $input['id_waktu_meja'],
                'meja_4'                 => $input['meja_4'],
                'default_meja4'          => $input['default_meja4'],
                'harga_meja_4'            => $input['harga_meja_4'],
                'meja_2'                 => $input['meja_2'],
                'default_meja2'          => $input['default_meja2'],
                'harga_meja_2'            => $input['harga_meja_2'],
                'meja_id_admin'          => $this->session->userdata('username')
            ];
            $update = $this->admin->update('tbl_meja', 'id_meja', $id, $input_data);

            if ($update) {
                set_pesan('Meja berhasil diubah');
                redirect('mejakursi/index');
            } else {
                set_pesan('Meja gagal diubah', false);
                redirect('mejakursi/editmejakursi');
            }
        }
    }

    public function hapusmejakursi($getId)
    {
        $id = encode_php_tags($getId);

        $result = count($this->admin->getTransaksi('0', 'id_meja', $id));


        // $jm_mulai  = $this->admin->getData('tbl_meja', 'tanggal', 'id', '1');

        if ($result > 0) {
            set_pesan('Adanya transaksi pada jam tersebut.', false);
        } else {
            $this->admin->delete('tbl_meja', 'id_meja', $id);
            set_pesan('data berhasil dihapus.');
        }

        redirect('mejakursi/index');
    }
}
