<?php
class History extends CI_Controller {
	Public function __construct() {
		parent::__construct();
		$this->load->model('ModelHistory');
		
	}
	public function index()
	{
		$this->Security->getSecurity();
		
		$isi['content'] = 'history';
		$isi['judul'] = 'History Peminjaman Buku';
		$isi['data']= $this->ModelHistory->getDataPengembalian();	
		// $isi['peminjam'] = $this->db->get('anggota')->result();
		// $isi['buku'] = $this->db->get('buku')->result();
		// $isi['id_pm']= $this->ModelPengembalian->id_pm();
		$this->load->view('dashboard',$isi);
	}
}
?>