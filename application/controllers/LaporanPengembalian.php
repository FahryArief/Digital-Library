<?php

class LaporanPengembalian extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('ModelLaporanPengembalian');
        $this->load->helper('tgl_indo_helper');
        $this->load->library('pdf_report');
    }

    public function index()
    {
        $tgl_awal = $this->input->post('tgl_awal');
        $tgl_akhir = $this->input->post('tgl_akhir');

        $this->session->set_userdata('tanggal_awal', $tgl_awal);
        $this->session->set_userdata('tanggal_akhir', $tgl_akhir);

        if (empty($tgl_awal)   || empty($tgl_akhir)) {
            $isi['content'] = 'laporanpengembalian';
            $isi['judul']   = 'Laporan Pengembalian';
            $isi['data']    = $this->ModelLaporanPengembalian->getAllData();
        }else{
            $isi['content'] = 'laporanpengembalian';
            $isi['judul']   = 'Laporan Pengembalian';
            $isi['data']    = $this->ModelLaporanPengembalian->filterData($tgl_awal, $tgl_akhir);
        }

            $this->load->view('dashboard', $isi);
    }

    public function pdf_laporan_pengembalian()
    {
        if (empty($this->session->userdata('tanggal_awal')) || empty($this->session->userdata('tanggal_akhir'))) {
            $isi['data'] = $this->ModelLaporanPengembalian->getAllData();
			$isi['tga']	= $this->session->userdata('tanggal_awal');
			$isi['tgak'] = $this->session->userdata('tanggal_akhir');
            $this->load->view('pdf_laporan_pengembalian', $isi);
        }else{
			$isi['tga']	= $this->session->userdata('tanggal_awal');
			$isi['tgak'] = $this->session->userdata('tanggal_akhir');
            $isi['data'] = $this->ModelLaporanPengembalian->filterData($this->session->userdata('tanggal_awal'), $this->session->userdata('tanggal_akhir'));
            $this->load->view('pdf_laporan_pengembalian', $isi);
        }
    }
}