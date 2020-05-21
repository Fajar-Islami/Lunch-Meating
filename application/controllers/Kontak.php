<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kontak extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model', 'user');
        $this->load->library('form_validation');

        // otomatis
        $this->user->defaultMeja();
        $this->user->hapusReservasi();
    }

    // Home
    public function index()
    {

        $data['judul'] = 'Kontak';
        $data['wmeja'] = $this->user->getWaktu('0');
        $this->load->view('templates/home_header', $data);
        $this->load->view('templates/header', $data);
        $this->load->view('menu/kontak', $data);
        $this->load->view('templates/home_footer');
    }

    public function pesan()
    {
        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $jenis_kel = $this->input->post('jenis_kel');
        $no_telp = $this->input->post('no_telp');
        $alamat = $this->input->post('alamat');
        $pesan = $this->input->post('pesan');

        $input = array(
            'nama' => $nama,
            'email' => $email,
            'jenis_kel' => $jenis_kel,
            'no_telp' => $no_telp,
            'alamat' => $alamat,
            'pesan' => $pesan,
            'waktu_diterima' =>  date('Y-m-d H:i:s')
        );

        $tambah = $this->user->insert('app_masukan', $input);
        if (!$tambah) {
            die;
        };

        $this->_kirimEmail($email, $nama);
    }

    private function _kirimEmail($email, $nama)
    {
        // konversi duit
        // $k_bayar_meja2 = number_format($bayar_meja2, 2, ",", ".");
        // $k_bayar_meja4 = number_format($bayar_meja4, 2, ",", ".");
        // $k_total_biaya = number_format($total_biaya, 2, ",", ".");

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

        $pesan = '
        <html>
        <head>
        <style>
            .footer {
                float: right;
                height: 35px;
                margin: 0px 50px 0px 0px;
              
                text-align: right;
            }
        </style>
        </head>
        <body>
        <div style="color:black">
        <strong>Halo, ' . $nama . '</strong> <br>
        Terimakasih atas saran dan masukan kamu, semoga saran dan masukan kamu dapat kami terapkan di restoran kami... <br><br>
        
        <hr>
        <hr>
        <div class="footer">
       
        &copy; Lunch Meating Restaurant ' . date('Y') . '<br>
        Untuk info lebih lanjut hubungi 0123456789</div>
        </div>
        </body>
        <html>';

        $this->load->library('email', $config);
        $this->email->initialize($config);

        $this->email->from('tesprogram2000@gmail.com', 'Lunch Meating Restaurant');
        $this->email->to($email);

        // if ($type == 'forgot') {
        $this->email->subject('Kotak Saran Lunch Meating');
        $this->email->message($pesan);
        // }

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }
}
