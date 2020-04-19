<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Reservasi extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model', 'user');
        $this->load->library('form_validation');

        // otomatis
        $this->user->defaultMeja();
        $this->user->hapusReservasi(time());
    }

    public function view($data, $hal)
    {
        $data['wmeja'] = $this->user->getWaktu('0');
        $this->load->view('templates/home_header', $data);
        $this->load->view('templates/header', $data);
        $this->load->view('menu/' . $hal, $data);
        $this->load->view('templates/home_footer');
    }

    private function validasi()
    {
        $this->form_validation->set_rules('total_biaya', 'Total biaya', 'trim|callback_totalbiaya');
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
            'required' => 'Harap masukan harga Nama'
        ]);
    }

    // public function _validasi()
    // {
    //     $this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
    //         'required' => 'Harap masukan harga Nama'
    //     ]);

    //     $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email', [
    //         'valid_email' => 'Masukan alamat email yang valid !!',
    //         'required' => 'Email harap diisi'
    //     ]);

    //     $this->form_validation->set_rules('notelp', 'Nomor Telepon', 'required|trim', [
    //         'required' => 'Harap masukan harga Nomor Telepon'
    //     ]);
    // }


    // Home
    public function index()
    {
        $mulai = $this->user->mejaHabis((time()  % 86400) + 25200);

        if ($mulai < 1) {
            $data['mejaAda'] = 'Tidak ada waktu reservasi yang tersedia !!';
        } else {
            $data['mejaAda'] = '';
        }


        $waktu_mulai = (time() + 25200)  % 86400;
        // $waktu_mulai = 1000;
        $data['wreservasimeja'] = $this->user->getWaktuReservasi();
        $data['wmeja'] = $this->user->getWaktu();
        $data['judul'] = 'Reservasi';
        // $data['judul'] = $waktu_mulai;

        $data['ket'] = $mulai;

        $hal = "reservasi";
        // if ($this->form_validation->run() == false) {
        $this->view($data, $hal);
        // } else {
        // }
    }

    // public function totalbiaya0()
    // {
    //     $totalbiaya = $this->input->post('total_biaya');
    //     $this->form_validation->set_message('total', 'Total biaya tidak boleh 0');
    //     return false;
    // }

    public function jumlahMejaReservasi2()
    {
        $id = $this->input->post('id');
        $jumlah = $this->user->getData('tbl_meja', 'meja_2', 'id_meja', $id);

        // masukan ubah data jadi string
        foreach ($jumlah as $row) {
            $tes = $row;
        }

        echo "<option disabled >Pilih Jumlah Meja</option>";
        echo "<option value= 0 selected>0</option>";
        for ($i = 1; $i <= $tes; $i++) {
            echo "<option value='" . $i . "'>" . $i . "</option>";
        }
    }

    public function jumlahMejaReservasi4()
    {
        $id = $this->input->post('id');
        $jumlah = $this->user->getData('tbl_meja', 'meja_4', 'id_meja', $id);

        // masukan ubah data jadi string
        foreach ($jumlah as $row) {
            $tes = $row;
        }
        var_dump($id);

        echo "<option disabled >Pilih Jumlah Meja</option>";
        echo "<option value= 0 selected>0</option>";
        for ($i = 1; $i <= $tes; $i++) {
            echo "<option value='" . $i . "'>" . $i . "</option>";
        }
    }

    public function totalbiayaMeja2()
    {
        // jumlah meja
        $id = $this->input->post('id');

        // cek harga
        $harga = $this->input->post('harga');
        $harga1 = $this->user->getData('tbl_meja', 'harga_meja_2', 'id_meja', $harga);

        foreach ($harga1 as $row) {
            $tes = $row;
        }

        $bayar = $tes * $id;
        echo json_encode($bayar);
    }

    public function totalbiayaMeja4()
    {
        // jumlah meja
        $id = $this->input->post('id');

        // cek harga
        $harga = $this->input->post('harga');
        $harga1 = $this->user->getData('tbl_meja', 'harga_meja_4', 'id_meja', $harga);

        foreach ($harga1 as $row) {
            $tes = $row;
        }

        $bayar = $tes * $id;
        echo json_encode($bayar);
    }



    public function pesan()
    {
        // data reservasi
        $id_waktu_meja = $this->input->post('id_waktu_meja');
        $waktu_meja = $this->input->post('waktu_meja');
        $jumlah_meja2 = $this->input->post('jumlah_meja2');
        $bayar_meja2 = $this->input->post('bayar_meja2');
        $jumlah_meja4 = $this->input->post('jumlah_meja4');
        $bayar_meja4 = $this->input->post('bayar_meja4');
        $total_biaya = $this->input->post('total_biaya');

        // data diri
        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $notelp = $this->input->post('notelp');
        $alamat = $this->input->post('alamat');

        // buat kode tr
        // $panggil_kode = $this->user->getData('tbl_waktu_meja', 'kode_waktu', 'id_waktu', $id_waktu_meja);
        $panggil_kode = $this->user->getKodeWaktu($id_waktu_meja);

        // masukan ubah data jadi string    
        foreach ($panggil_kode as $row) {
            $hasil_panggil = $row;
        }

        // tr reset setiap hari
        $Kode_awal = 'TR-' . $hasil_panggil . '-LM-' . date('ymd') . '-';
        // 
        $kode_blkg = $this->user->getMax('tbl_transaksi', 'kode_transaksi', $Kode_awal);
        $jml_tr = substr($kode_blkg, -4, 4);
        $jml_tr++;
        $kode_akhir = str_pad($jml_tr, 4, '0', STR_PAD_LEFT);

        //kode transaksi
        $kode_tr = $Kode_awal . $kode_akhir;


        $input = array(
            'kode_transaksi' => $kode_tr,
            'id_waktu_reservasi' => $id_waktu_meja,
            'waktu_reservasi' => $waktu_meja,
            'jumlah_meja2' => $jumlah_meja2,
            'biaya_meja2' => $bayar_meja2,
            'jumlah_meja4' => $jumlah_meja4,
            'biaya_meja4' => $bayar_meja4,
            'total_biaya' => $total_biaya,

            'nama_pelanggan' => $nama,
            'email' => $email,
            'no_telp' => $notelp,
            'alamat' => $alamat,

            'tanggal_pesan' => time(),
            'status' => 0
        );

        $tambah = $this->user->insert('tbl_transaksi', $input);
        if (!$tambah) {
            die;
        };

        // pembuatan tanggal

        // jam mulai
        $mulai = $this->user->getData('tbl_waktu_meja', 'jam_mulai', 'kode_waktu',  $hasil_panggil);

        foreach ($mulai as $row) {
            $j_mulai = $row;
        }
        // jam akhir
        $selesai = $this->user->getData('tbl_waktu_meja', 'jam_selesai', 'kode_waktu',  $hasil_panggil);

        foreach ($selesai as $row) {
            $j_selesai = $row;
        }

        $jam = date('H:i', $j_mulai - 25200) . ' - ' . date('H:i', $j_selesai - 25200);
        // 

        $this->_kirimEmail($email, $nama,  $jam, $jumlah_meja2, $bayar_meja2, $jumlah_meja4, $bayar_meja4, $total_biaya, $kode_tr);
    }

    private function _kirimEmail($email, $nama,  $jam, $jumlah_meja2, $bayar_meja2, $jumlah_meja4, $bayar_meja4, $total_biaya, $kode_tr)
    {



        // konversi duit
        $k_bayar_meja2 = number_format($bayar_meja2, 2, ",", ".");
        $k_bayar_meja4 = number_format($bayar_meja4, 2, ",", ".");
        $k_total_biaya = number_format($total_biaya, 2, ",", ".");

        $config = [
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.gmail.com',
            'smtp_user' => 'tesprogram2000@gmail.com',
            'smtp_pass' => 'fajar2000',
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
       
        Pemesanan reservasi kamu untuk hari ini ' . date('d/m/Y', $waktu = time() - ((time() % 86400) + 25200)) . ' pada jam ' . $jam . ' <b>Hampir Selesai !!</b> <br><br>
        
        Berikut rinciannya : <br>

        <table border=1 cellpadding="3">
            <col width="120">
            <col width="80">
            <col width="180">
            <tr>
                <th></th>
                <th>Jumlah</th>
                <th>Biaya</th>
            </tr>
            <tr align="center" >
                <td>Meja 2 Kursi </td>
                <td>' . $jumlah_meja2 . '</td>
                <td align="left">&nbsp;&nbsp;&nbsp;Rp. ' . $k_bayar_meja2 . '</td>
            </tr>
            <tr align="center">
                <td>Meja 4 Kursi </td>
                <td>' . $jumlah_meja4 . '</td>
                <td align="left">&nbsp;&nbsp;&nbsp;Rp. ' . $k_bayar_meja4 . '</td>
            </tr>
            <tr align="center">
                <th colspan="2">Total Biaya</th>
                <th align="left">&nbsp;&nbsp;&nbsp;Rp. ' . $k_total_biaya . ' </th>
            </tr>
        </table>

        <br>
        
        Jadi, yang harus kamu bayarkan adalah Rp.' . $k_total_biaya . ' <strong>untuk menyelesaikan pemesanan kamu </strong>  <br>
        Harap membayar melalui rekening kamu ke 123-456-789 <br>
        Pemesanan kamu ini bisa hangus loh kalau tidak dibayar dalam waktu <strong>15 Menit</strong><br>
        Ayo segera transfer agar pemesanan kamu selesai,  lalu kirim bukti transfernya ke WA kami (0123456789)<br>
        Terima Kasih Sudah Memesan Meja di Lunch Meating Restoran. <br><br><br><br><br>
        Kode Transaksi kamu ' . $kode_tr . '<br><hr>
        
        <hr>
        <div class="footer">
       
        &copy; Lunch Meating Restaurant ' . date('Y') . '<br>
        Untuk info lebih lanjut hubungi 0123456789</div>
        </div>
        </body>
        <html>
        </div>';

        $this->load->library('email', $config);
        $this->email->initialize($config);

        $this->email->from('tesprogram2000@gmail.com', 'Lunch Meating Restaurant');
        $this->email->to($email);

        // if ($type == 'forgot') {
        $this->email->subject('Reservasi Lunch Meating');
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
