<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('ModelDashboard');		
	}
	public function index()
	{
		$this->Security->getSecurity();
		$isi['content'] = 'home';
		$isi['judul'] = 'Dashboard';
		$isi['anggota'] = $this->ModelDashboard->anggota();
		$isi['buku'] = $this->ModelDashboard->buku();
		$isi['peminjaman'] = $this->ModelDashboard->peminjaman();
		$isi['pengembalian'] = $this->ModelDashboard->pengembalian();
		$this->load->view('dashboard', $isi);
	}
}