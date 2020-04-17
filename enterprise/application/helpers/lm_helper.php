<?php
function is_logged_in()
{
    // Instansiasi CodeIgniter (Memanggil library CI)
    $ci = get_instance();

    // belum login
    if (!$ci->session->userdata('username')) {
        redirect('auth');
    }
}

function set_pesan($pesan, $tipe = true)
{
    $ci = get_instance();
    if ($tipe) {
        $ci->session->set_flashdata('message', "<div class='alert alert-success'><strong>SUKSES!</strong> {$pesan} <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
    } else {
        $ci->session->set_flashdata('message', "<div class='alert alert-danger'><strong>GAGAL!</strong> {$pesan} <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
    }
}

// function output_json($data)
// {
//     $ci = get_instance();
//     $data = json_encode($data);
//     $ci->output->set_content_type('application/json')->set_output($data);
// }
