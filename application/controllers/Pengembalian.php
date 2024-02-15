<?php
class Pengembalian extends CI_Controller {
	Public function __construct() {
		parent::__construct();
		$this->load->model('ModelPengembalian');
		
	}
	public function index()
	{
		$this->Security->getSecurity();
		
		$isi['content'] = 'pengembalian';
		$isi['judul'] = 'Data Pengembalian Buku';
		$isi['data']= $this->ModelPengembalian->getDataPengembalian();	
		// $isi['peminjam'] = $this->db->get('anggota')->result();
		// $isi['buku'] = $this->db->get('buku')->result();
		// $isi['id_pm']= $this->ModelPengembalian->id_pm();
		$this->load->view('dashboard',$isi);
	}
}
?>