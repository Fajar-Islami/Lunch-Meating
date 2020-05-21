<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');

        $this->load->model('Admin_model', 'admin');
        $this->session->unset_userdata('keyword');
        // otomatis
        $this->admin->defaultMeja();
        $this->admin->hapusReservasi();
    }

    public function index()
    {
        if ($this->session->userdata('username')) {
            redirect('admin');
        }

        $this->form_validation->set_rules('username', 'User', 'trim|required', [
            'required' => 'Username harap diisi'
        ]);
        $this->form_validation->set_rules('password', 'password', 'trim|required', [
            'required' => 'Kata Sandi harap diisi'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Halaman Login Admin';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
        } else {
            // Validasi success
            $this->_login();
        }
    }

    private function _login()
    // akses modifiernya private
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->db->get_where('admin', ['username' => $username])->row_array();

        if ($user) {
            // usernya ada
            if ($password == $user['password']) {
                $this->session->set_userdata($user);
                redirect('admin');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><center>Kata Sandi <b>salah !!</b></center></div>');
                redirect('auth');
            }
        } else {
            // user tidak ada
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><center>Username <b>tidak terdaftar !!</b></center></div>');
            redirect('auth');
        }
    }

    public function lupaPassword()
    {
        if ($this->session->userdata('username')) {
            redirect('admin');
        }

        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email', [
            'valid_email' => 'Masukan alamat email yang valid !!',
            'required' => 'Email harap diisi'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Lupa Kata Sandi';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/lupa-password');
            $this->load->view('templates/auth_footer');
        } else {
            $email = $this->input->post('email');
            $user = $this->db->get_where('admin', ['email' => $email])->row_array();

            // cek klo ada isinya(email), buat token
            if ($user) {
                // buat toker / bilangan random
                $token = base64_encode(random_bytes(32));
                $admin_token = [
                    'email' => $email,
                    'token' => $token,
                    'tgl_dibuat' => time()
                ];

                $this->db->insert('admin_token', $admin_token);

                $this->_sendEmail($token, 'forgot');
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><center>Cek email anda untuk mengganti kata sandi</center></div>');
                redirect('auth/lupapassword');
            } else {
                // user tidak terdaftar
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><center>Email <b>tidak terdaftar !! <b></center></div>');
                redirect('auth/lupapassword');
            }
        }
    }

    public function ubahPassword()
    {
        if ($this->session->userdata('username')) {
            redirect('admin');
        }

        $email = $this->input->get('email');
        $token = $this->input->get('token');

        // cek keaslian email
        $user = $this->db->get_where('admin', ['email' => $email])->row_array();
        $admin = $user['username'];

        // klo email ada
        if ($user) {
            $admin_token = $this->db->get_where('admin_token', ['token' => $token])->row_array();

            // klo email + token bener
            if ($admin_token) {
                // validasi waktu
                if (time() - $admin_token['tgl_dibuat'] < (60 * 18)) {

                    // session supaya cuma server yang tau datanya, session ini ada ketika mau reset saja
                    $this->session->set_userdata('reset_email1', $admin);
                    $this->session->set_userdata('reset_email', $email);
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> <center> Harap masukkan password baru </center></div>');
                    redirect('auth/pro_ubahpassword');
                } else {
                    $this->db->delete('admin_token', ['email' => $email]);

                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Token <b>kadaluarsa !!</b></div>');
                    redirect('auth/lupapassword');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><center> Token <b>salah / sudah digunakan !!</b> </center></div>');
                redirect('auth/lupapassword');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><center>Alamat email <b>salah</b></center></div>');
            redirect('auth/lupapassword');
        }
    }

    public function pro_ubahPassword()
    {
        if ($this->session->userdata('username')) {
            redirect('admin');
        }

        if (!$this->session->userdata('reset_email')) {
            redirect('auth');
        }


        $this->form_validation->set_rules('password1', 'Kata Sandi', 'required|trim|min_length[3]|matches[password2]', [
            'required' => 'Harap ulangi katasandi baru',
            'min_length' => 'Kata Sandi minimal 3 karakter!!',
            'matches' => 'Kata Sandi tidak sama !!'
        ]);
        $this->form_validation->set_rules('password2', 'Repeat Kata Sandi', 'required|trim|min_length[3]|matches[password1]', [
            'required' => 'Harap ulangi katasandi baru',
            'min_length' => 'Kata Sandi minimal 3 karakter!!',
            'matches' => 'Kata Sandi tidak sama !!'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Ubah Kata Sandi';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/ubah-password');
            $this->load->view('templates/auth_footer');
        } else {
            $password = $this->input->post('password1');
            $email = $this->session->userdata('reset_email');

            // edit table user
            $this->db->set('password', $password);
            $this->db->where('email', $email);
            $this->db->update('admin');
            $this->db->delete('admin_token', ['email' => $email]);

            // hapus session
            $this->session->unset_userdata('reset_email');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><center>Kata Sandi berhasil diubah</center></div>');
            redirect('auth');
        }
    }

    private function _sendEmail($token, $type)
    {


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

        $this->email->from('tesprogram2000@gmail.com', 'tes program');
        $this->email->to($this->input->post('email'));

        if ($type == 'forgot') {
            $this->email->subject('Reset Kata Sandi');
            $this->email->message('Tekan link ini untuk reset kata sandi : <a href="' . base_url() . 'auth/ubahpassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '".>Reset Kata sandi</a> <br> <strong>Token kadaluarsa dalam 15 menit</strong>');
        }

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }

    public function logout()
    {
        if ($this->session->userdata('username')) {
            $this->session->unset_userdata('username');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><center>Berhasil keluar !!</center></div>');
        }
        redirect('auth');
    }
}
