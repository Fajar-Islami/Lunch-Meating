<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
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
        $data['title'] = 'Profil Saya';
        $data['admin'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
        // ngambil data dari user berdasarkan email yang ada disession, lalu ambil satu baris (row_array)

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('profile/index', $data);
        $this->load->view('templates/footer');
    }

    public function edit()
    {
        $data['title'] = 'Profil Saya';
        $data['stitle'] = 'Edit Profil';
        $data['admin'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
        // ngambil data dari user berdasarkan email yang ada disession, lalu ambil satu baris (row_array)

        $this->form_validation->set_rules('no_telp', 'Nomor Telepon', 'required|min_length[11]|max_length[13]|trim', [
            'required' => 'Harap masukan nomor telepon',
            'min_length' => 'Nomor telepon minimal 11 karakter!!',
            'max_length' => 'Nomor telepon minimal 13 karakter!!'
        ]);
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
            'required' => 'Harap masukan nama'
        ]);
        $nama = $this->input->post('nama');
        $no_telp = $this->input->post('no_telp');
        $email = $this->input->post('email');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('profile/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $nama = $this->input->post('nama');
            $no_telp = $this->input->post('no_telp');
            $email = $this->input->post('email');

            // cek jika ada gambar yang akan diupload
            $upload_image = $_FILES['foto']['name'];

            if ($upload_image) {
                $config['upload_path']      = "./assets/img/profile";
                $config['allowed_types']    = 'gif|jpg|jpeg|png';
                // $config['encrypt_name']     = TRUE;
                $config['max_size']         = '2048';


                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if ($this->upload->do_upload('foto')) {

                    // ngecek gambar lama,klo ada di hapus kecuali default
                    $old_image = $data['admin']['foto'];
                    if ($old_image != 'default.png') {
                        unlink(FCPATH . 'assets/img/profile/' . $old_image);
                    }

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('foto', $new_image);
                } else {
                    // $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '<div>');
                    $this->session->set_flashdata('title', 'Ooopsss..');
                    $this->session->set_flashdata('message', 'Format foto salah, foto harus berformat gif/jpg/jpeg/png');
                    $this->session->set_flashdata('icon', 'error');
                    redirect('profile/edit');
                }
            }
            $this->db->set('nama', $nama);
            $this->db->set('nomor_telp', $no_telp);
            $this->db->where('email', $email);
            $this->db->update('admin');
            // $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><center>Profil berhasil diperbarui </center></div>');
            $this->session->set_flashdata('title', 'Berhasil !!');
            $this->session->set_flashdata('message', 'Profil berhasil diperbarui');
            $this->session->set_flashdata('icon', 'success');
            redirect('profile');
        }
    }

    public function ubahpassword()
    {
        $data['title'] = 'Profil Saya';
        $data['stitle'] = 'Ubah Kata Sandi';
        $data['admin'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
        // ngambil data dari user berdasarkan email yang ada disession, lalu ambil satu baris (row_array)

        $this->form_validation->set_rules('pwlama', 'Kata Sandi Lama', 'required|trim', [
            'required' => 'Harap masukan katasandi lama'
        ]);
        $this->form_validation->set_rules('pwbaru1', 'New Kata Sandi', 'required|trim|min_length[3]', [
            'required' => 'Harap masukan katasandi baru',
            'min_length' => 'Kata Sandi minimal 3 karakter!!'
        ]);
        $this->form_validation->set_rules('pwbaru2', 'Confirm New Kata Sandi', 'required|trim|min_length[3]|matches[pwbaru1]', [
            'required' => 'Harap ulangi katasandi baru',
            'min_length' => 'Kata Sandi minimal 3 karakter!!',
            'matches' => 'Kata Sandi tidak sama !!'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('profile/ubahpassword', $data);
            $this->load->view('templates/footer');
        } else {
            $this->session->set_flashdata('validasi', 'validasi');
            $pwlama = $this->input->post('pwlama');
            $pwbaru1 = $this->input->post('pwbaru1');
            // ngecek kecocokan password
            // if (!password_verify($pwlama, $data['user']['password'])) {
            if (!($pwlama == $data['admin']['password'])) {
                // $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><center><b>Kata Sandi lama salah !!</b></center></div>');
                $this->session->set_flashdata('title', 'Ooopsss..');
                $this->session->set_flashdata('message', 'Kata Sandi lama salah !!');
                $this->session->set_flashdata('icon', 'error');
                // $this->session->set_flashdata('ket', 'error');
                // $this->session->set_lambang('message', 'Info');
                redirect('profile/ubahpassword');
            } else {
                if ($pwlama == $pwbaru1) {
                    // $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><center><b>Kata Sandi baru tidak boleh sama dengan password sebelumnya</b></center></div>');
                    $this->session->set_flashdata('title', 'Ooopsss..');
                    $this->session->set_flashdata('message', 'Kata Sandi baru tidak boleh sama dengan kata sandi sebelumnya sebelumnya');
                    $this->session->set_flashdata('icon', 'error');
                    // $this->session->set_flashdata('ket', 'error');
                    redirect('profile/ubahpassword');
                } else {
                    // password baru sudah ok
                    // $password_hash = password_hash($pwbaru1, PASSWORD_DEFAULT);

                    // $this->db->set('password', $password_hash);
                    $this->db->set('password', $pwbaru1);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('admin');

                    $this->session->set_flashdata('title', 'Berhasil !!');
                    $this->session->set_flashdata('message', 'Kata Sandi berhasil diperbarui');
                    $this->session->set_flashdata('icon', 'success');

                    // $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><center>Kata Sandi berhasil diubah</center></div>');
                    redirect('profile');
                }
            }
        }
    }
}
