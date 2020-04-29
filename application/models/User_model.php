<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    // awal otomatis
    public function defaultMeja()
    {
        // update default meja otomatis
        $tgl_skrg = time() - ((time() % 86400) + 25200);
        $tgl = $this->user->getData('tbl_tgl', 'tanggal', 'id', '1');

        foreach ($tgl as $row) {
            $tgl_db = $row;
        }
        if ($tgl_skrg > $tgl_db) {
            $input = array(
                'tanggal' => $tgl_skrg
            );
            return $this->user->update('tbl_tgl', 'id', '1', $input);
        }
    }

    public function hapusReservasi()
    {
        $this->db->where('status', '0');
        $this->db->where("TIMESTAMPDIFF(second,tanggal_pesan,CURRENT_TIME)>", 900, false);
        return $this->db->delete('tbl_transaksi');
    }
    // akhir otomatis



    // awal menu
    public function getFoto($tabel, $kolom = false, $isi = false)
    {
        $this->db->where($kolom, $isi);
        return $this->db->get($tabel)->result_array();
    }
    // akhir menu

    // awal resevasi
    public function update($table, $pk, $id, $data)
    {
        $this->db->where($pk, $id);
        return $this->db->update($table, $data);
    }

    public function insert($table, $data, $batch = false)
    {
        return $batch ? $this->db->insert_batch($table, $data) : $this->db->insert($table, $data);
    }

    public function mejaHabis()
    {
        $waktu_mulai = (time() + 25200)  % 86400;
        $this->db->where('wm.jam_mulai >', $waktu_mulai);
        $this->db->select('*');
        $this->db->join('tbl_waktu_meja wm', 'a.id_waktu_meja = wm.id_waktu');
        // $this->db->order_by('jam_mulai');
        $this->db->from('tbl_meja a');
        return $this->db->count_all_results();
    }

    public function getWaktuReservasi()
    {
        $waktu_mulai = (time() + 25200)  % 86400;
        return $this->getWaktu($waktu_mulai);
    }

    public function getWaktu($waktu_mulai = 0)
    {
        // if ($waktu_mulai) {
        //     $waktu_mulai1 = (time() + 25200)  % 86400;
        // } else {
        //     $waktu_mulai1 = 0;
        // }


        $this->db->where('wm.jam_mulai >', $waktu_mulai);
        $this->db->select('*');
        $this->db->join('tbl_waktu_meja wm', 'a.id_waktu_meja = wm.id_waktu');
        $this->db->order_by('wm.jam_mulai');
        return $this->db->get('tbl_meja a')->result_array();
    }

    public function getData($tabel, $select, $where, $nilai)
    {
        $this->db->where($where, $nilai);
        $this->db->select($select);
        return  $this->db->get($tabel)->row();
    }

    public function getKodeWaktu($kodewaktu)
    {
        $this->db->where('a.id_meja', $kodewaktu);
        $this->db->select('kode_waktu wm');
        $this->db->join('tbl_waktu_meja wm', 'a.id_waktu_meja = wm.id_waktu');
        return $this->db->get('tbl_meja a')->row();
    }

    public function getMax($tabel, $kolom, $kode)
    {
        $this->db->select_max($kolom);
        $this->db->like('kode_transaksi', $kode, 'after');
        return $this->db->get($tabel)->row_array()[$kolom];
    }
    // akhir resevasi

    public function konvertSatuan($a)
    {
        foreach ($a as $row) {
            $b = $row;
        }
        return $b;
    }
}
