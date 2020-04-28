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
        $this->admin->hapusReservasi(time());
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
        $data['title'] = 'Edit Profil';
        $data['admin'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
        // ngambil data dari user berdasarkan email yang ada disession, lalu ambil satu baris (row_array)

        $this->form_validation->set_rules('no_telp', 'Nomor Telepon', 'required|trim', [
            'required' => 'Harap masukan nomor telepon'
        ]);
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
            'required' => 'Harap masukan nama'
        ]);


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
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '<div>');
                    redirect('profile');
                }
            }
            $this->db->set('nama', $nama);
            $this->db->set('nomor_telp', $no_telp);
            $this->db->where('email', $email);
            $this->db->update('admin');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><center>Profil berhasil diperbarui </center></div>');
            redirect('profile');
        }
    }

    public function ubahpassword()
    {
        $data['title'] = 'Ubah Password';
        $data['admin'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
        // ngambil data dari user berdasarkan email yang ada disession, lalu ambil satu baris (row_array)

        $this->form_validation->set_rules('pwlama', 'Password Lama', 'required|trim', [
            'required' => 'Harap masukan password lama'
        ]);
        $this->form_validation->set_rules('pwbaru1', 'New Password', 'required|trim|min_length[3]', [
            'required' => 'Harap masukan password baru',
            'min_length' => 'Password minimal 3 karakter!!'
        ]);
        $this->form_validation->set_rules('pwbaru2', 'Confirm New Password', 'required|trim|min_length[3]|matches[pwbaru1]', [
            'required' => 'Harap ulangi masukan password baru',
            'min_length' => 'Password minimal 3 karakter!!',
            'matches' => 'Password tidak sama !!'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('profile/ubahpassword', $data);
            $this->load->view('templates/footer');
        } else {
            $pwlama = $this->input->post('pwlama');
            $pwbaru1 = $this->input->post('pwbaru1');
            // ngecek kecocokan password
            // if (!password_verify($pwlama, $data['user']['password'])) {
            if (!($pwlama == $data['admin']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><center>Password lama salah !!</center></div>');
                redirect('profile/ubahpassword');
            } else {
                if ($pwlama == $pwbaru1) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><center>Password baru tidak boleh sama dengan password sebelumnya</center></div>');
                    redirect('profile/ubahpassword');
                } else {
                    // password baru sudah ok
                    // $password_hash = password_hash($pwbaru1, PASSWORD_DEFAULT);

                    // $this->db->set('password', $password_hash);
                    $this->db->set('password', $pwbaru1);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('admin');

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><center>Password berhasil diubah</center></div>');
                    redirect('profile');
                }
            }
        }
    }
}
