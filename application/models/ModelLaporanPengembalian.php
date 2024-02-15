<?php

class ModelLaporanPengembalian extends CI_Model{

    public function getAllData()
    {
        $this->db->select('*');
        $this->db->from('pengembalian');
        $this->db->join('user', 'pengembalian.id = user.id');
        $this->db->join('buku', 'pengembalian.id_buku = buku.id_buku');
        return $this->db->get()->result();
    }

    public function filterData($tgl_awal, $tgl_akhir)
    {
        // Konversi format tanggal
        $tgl_awal_converted = date('Y-m-d', strtotime($tgl_awal));
        $tgl_akhir_converted = date('Y-m-d', strtotime($tgl_akhir));

        $this->db->select('*');
        $this->db->from('pengembalian');
        $this->db->join('user', 'pengembalian.id = user.id');
        $this->db->join('buku', 'pengembalian.id_buku = buku.id_buku');
        $this->db->where("STR_TO_DATE(pengembalian.tgl_pinjam, '%d-%m-%Y') >=", $tgl_awal_converted);
        $this->db->where("STR_TO_DATE(pengembalian.tgl_pinjam, '%d-%m-%Y') <=", $tgl_akhir_converted);
        return $this->db->get()->result();
    }
}