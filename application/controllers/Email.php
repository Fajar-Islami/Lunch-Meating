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
        $this->_sendEmail($email);
        if (!$tambah) {
            die;
        };
    }

    private function _sendEmail($email)
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

        $this->email->from('tesprogram2000@gmail.com', 'Lunch Meating Restaurant');
        $this->email->to($email);

        $this->email->subject('Subscribe Lunch Meating');
        $this->email->message('Terima kasih telah melakukan subscribe pada website kami <br>
        Silahkan menunggu informasi terbaru dari kami');

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }
}
