<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peminjaman extends CI_Controller {

	Public function __construct() {
		parent::__construct();
		$this->load->model('ModelPeminjaman');
		
	}

	public function index()
	{
		$this->Security->getSecurity();
		
		$isi['content'] = 'peminjaman';
		$isi['judul'] = 'Data Peminjaman';
		$isi['data']= $this->ModelPeminjaman->getDataPeminjam();	
		$isi['peminjam'] = $this->db->get('user')->result();
		$isi['buku'] = $this->db->get('buku')->result();
		$isi['id_pm']= $this->ModelPeminjaman->id_pm();
		$this->load->view('dashboard',$isi);
	}
	
	public function simpan()
	{
	   $data = array(
		   'id_pm'			=> $this->input->post('id_pm'),
		   'id' 			=> $this->input->post('id'),
		   'id_buku' 		=> $this->input->post('id_buku'),
		   'tgl_pinjam' 	=> $this->input->post('tgl_pinjam'),
		   'tgl_kembali'	=> $this->input->post('tgl_kembali'),
	   );
	   $array = $this->db->insert('peminjaman', $data);
	   if ($query = true) {
		   $this->session->set_flashdata('info', 'Data Berhasil Disimpan');
		   redirect('peminjaman');
	}else {
			// Handle the case where the update fails
			$this->session->set_flashdata('info', 'Update Gagal');
			redirect('peminjaman');
		}
}

	public function jumlah_buku()
	{
		$id = $this->input->post('id');
		$data = $this->ModelPeminjaman->jumlah_buku($id);
		echo json_encode($data);
	}

	public function kembalikan($id)
	{
		$data = $this->ModelPeminjaman->getDataPeminjamanByid($id);
		$tgl_kembali = new DateTime($data['tgl_kembali']);
		
		$tgl_sekarang = new DateTime('now');

// Date comparison
$selisih = $tgl_kembali->diff($tgl_sekarang)->format("%r%a"); // Include the sign of the difference

// Check if the return date is in the future
if ($selisih>0) {
    // Book is returned late
    $denda = $selisih * 1000;
} else {
    // Book is returned on time or earlier
    $denda = 0;
}


		$kembalikan = array(
			'id'=> $data['id'],
			'id_buku'=>$data['id_buku'],
			'tgl_pinjam'=> $data['tgl_pinjam'],
			'tgl_kembali'=> $data['tgl_kembali'],
			'tgl_dikembalikan'=> date('d-m-Y'),
			'denda' => $denda
		);
		$query = $this->db->insert('pengembalian', $kembalikan);
		if ($query = true) {
			$delete = $this->ModelPeminjaman->deletePM($id);
			if ($delete = true){
				$this->session->set_flashdata('info', 'Buku Berhasil Dikembalikan');
			redirect('peminjaman');
			} 
		}
	}
}