<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{
    // otomatis
    public function defaultMeja()
    {
        // update default meja otomatis
        $tgl_skrg = time() - ((time() % 86400) + 25200);
        $tgl = $this->admin->getData('tbl_tgl', 'tanggal', 'id', '1');

        foreach ($tgl as $row) {
            $tgl_db = $row;
        }
        if ($tgl_skrg > $tgl_db) {
            $input = array(
                'tanggal' => $tgl_skrg
            );
            return $this->admin->update('tbl_tgl', 'id', '1', $input);
        }
    }

    public function hapusReservasi($waktu)
    {
        $this->db->where('status', '0');
        $this->db->where("$waktu  - tanggal_pesan > ", 900, false);
        return $this->db->delete('tbl_transaksi');
    }
    // otomatis


    public function get($table, $data = null, $where = null)
    {
        if ($data != null) {
            return $this->db->get_where($table, $data)->row_array();
        } else {
            return $this->db->get_where($table, $where)->result_array();
        }
    }

    public function getData($tabel, $select, $where, $nilai)
    {
        $this->db->where($where, $nilai);
        $this->db->select($select);
        return  $this->db->get($tabel)->row();
    }

    public function update($table, $pk, $id, $data)
    {
        $this->db->where($pk, $id);
        return $this->db->update($table, $data);
    }

    public function insert($table, $data, $batch = false)
    {
        return $batch ? $this->db->insert_batch($table, $data) : $this->db->insert($table, $data);
    }

    public function delete($table, $pk, $id)
    {
        return $this->db->delete($table, [$pk => $id]);
    }

    public function getUsers($id)
    {
        /**
         * ID disini adalah untuk data yang tidak ingin ditampilkan. 
         * Maksud saya disini adalah 
         * tidak ingin menampilkan data user yang digunakan, 
         * pada managemen data user
         */
        $this->db->where('id_user !=', $id);
        return $this->db->get('user')->result_array();
    }

    public function pilihWaktu()
    {
        $this->db->order_by('jam_mulai');
        return $this->db->get('tbl_waktu_meja')->result_array();
    }

    public function getMeja()
    {
        $this->db->join('tbl_waktu_meja wm', 'a.id_waktu_meja = wm.id_waktu');
        $this->db->order_by('jam_mulai');
        return $this->db->get('tbl_meja a')->result_array();
    }

    public function getWaktuMeja()
    {
        $this->db->order_by('jam_mulai');
        return $this->db->get('tbl_waktu_meja')->result_array();
    }

    // public function getReservasi($tabel, $orderby, $status, $nilaistatus)
    // {
    //     $this->db->where($status, $nilaistatus);
    //     $this->db->order_by($orderby);
    //     return $this->db->get($tabel)->result_array();
    // }

    // public function cekTransaksiMeja(   )
    // {
    //     $this->db->where('a.status', $status);
    //     $this->db->join('tbl_meja b', 'b.id_meja = a.id_waktu_reservasi', 'left');
    //    return $this->db->get('tbl_meja a')
    // }

    public function getTransaksi($status, $id_meja = false, $id_waktu_reservasi = false)
    {
        $this->db->where('a.status', $status);
        $this->db->where($id_meja, $id_waktu_reservasi);
        $this->db->select('*');
        $this->db->join('tbl_meja b', 'b.id_meja = a.id_waktu_reservasi', 'left');
        $this->db->order_by('a.id_waktu_reservasi');
        return $this->db->get('tbl_transaksi a')->result_array();
    }

    public function konvertwaktu_mulai($jam_mulai)
    {
        // Convert dari date jadi int
        $j_mulai = strtotime($jam_mulai);
        return ($j_mulai + 25200) % 86400;
    }

    public function konvertwaktu_selesai($jam_selesai)
    {
        // Convert dari date jadi int
        $j_selesai = strtotime($jam_selesai);
        return ($j_selesai + 25200) % 86400;
    }

    public function waktu($waktu_mulai)
    {

        if ($waktu_mulai >= 0 && $waktu_mulai < 43200) {
            return $waktu = "Pagi";
        } elseif ($waktu_mulai >= 43200 && $waktu_mulai < 54000) {
            return $waktu = "Siang";
        } elseif ($waktu_mulai >= 54000 && $waktu_mulai < 64800) {
            return $waktu = "Sore";
        } elseif ($waktu_mulai >= 64800 && $waktu_mulai < 86401) {
            return $waktu = "Malam";
        } else {
            return $waktu = "Salah";
        }
    }


    ///////////////////////////////////////////////////////////////////////
    public function getBarangMasuk($limit = null, $id_barang = null, $range = null)
    {
        $this->db->select('*');
        $this->db->join('user u', 'bm.user_id = u.id_user');
        $this->db->join('supplier sp', 'bm.supplier_id = sp.id_supplier');
        $this->db->join('barang b', 'bm.barang_id = b.id_barang');
        $this->db->join('satuan s', 'b.satuan_id = s.id_satuan');
        if ($limit != null) {
            $this->db->limit($limit);
        }

        if ($id_barang != null) {
            $this->db->where('id_barang', $id_barang);
        }

        if ($range != null) {
            $this->db->where('tanggal_masuk' . ' >=', $range['mulai']);
            $this->db->where('tanggal_masuk' . ' <=', $range['akhir']);
        }

        $this->db->order_by('id_barang_masuk', 'DESC');
        return $this->db->get('barang_masuk bm')->result_array();
    }

    public function getBarangKeluar($limit = null, $id_barang = null, $range = null)
    {
        $this->db->select('*');
        $this->db->join('user u', 'bk.user_id = u.id_user');
        $this->db->join('barang b', 'bk.barang_id = b.id_barang');
        $this->db->join('satuan s', 'b.satuan_id = s.id_satuan');
        $this->db->join('status st', 'bk.status_id = st.id_status');

        if ($limit != null) {
            $this->db->limit($limit);
        }
        if ($id_barang != null) {
            $this->db->where('id_barang', $id_barang);
        }
        if ($range != null) {
            $this->db->where('tanggal_keluar' . ' >=', $range['mulai']);
            $this->db->where('tanggal_keluar' . ' <=', $range['akhir']);
        }
        $this->db->order_by('id_barang_keluar', 'DESC');
        return $this->db->get('barang_keluar bk')->result_array();
    }

    public function getMax($table, $field, $kode = null)
    {
        $this->db->select_max($field);
        if ($kode != null) {
            $this->db->like($field, $kode, 'after');
        }
        return $this->db->get($table)->row_array()[$field];
    }

    public function count($table)
    {
        return $this->db->count_all($table);
    }

    public function sum($table, $field)
    {
        $this->db->select_sum($field);
        return $this->db->get($table)->row_array()[$field];
    }

    public function min($table, $field, $min)
    {
        $field = $field . ' <=';
        $this->db->where($field, $min);
        return $this->db->get($table)->result_array();
    }

    public function chartBarangMasuk($bulan)
    {
        $like = 'T-BM-' . date('y') . $bulan;
        $this->db->like('id_barang_masuk', $like, 'after');
        return count($this->db->get('barang_masuk')->result_array());
    }

    public function chartBarangKeluar($bulan)
    {
        $like = 'T-BK-' . date('y') . $bulan;
        $this->db->like('id_barang_keluar', $like, 'after');
        return count($this->db->get('barang_keluar')->result_array());
    }

    public function laporan($table, $mulai, $akhir)
    {
        $tgl = $table == 'barang_masuk' ? 'tanggal_masuk' : 'tanggal_keluar';
        $this->db->where($tgl . ' >=', $mulai);
        $this->db->where($tgl . ' <=', $akhir);
        return $this->db->get($table)->result_array();
    }

    public function cekStok($id)
    {
        $this->db->join('satuan s', 'b.satuan_id=s.id_satuan');
        return $this->db->get_where('barang b', ['id_barang' => $id])->row_array();
    }
}