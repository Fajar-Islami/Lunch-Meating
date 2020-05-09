<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Email extends CI_Controller
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
    public function subs()
    {
        $email = $this->input->post('subsE');

        $input = array(
            'email' => $email,
            'waktu_subs' =>  date('Y-m-d H:i:s')
        );

        $tambah = $this->user->insert('app_email', $input);
        if (!$tambah) {
            die;
        };
    }
}
