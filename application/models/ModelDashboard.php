<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
class ModelDashboard extends CI_Model {

	public function anggota()
	{
		return $this->db->count_all('user');
	}
	public function buku()
	{
		return $this->db->count_all('buku');
	}
	public function peminjaman()
	{
		return $this->db->count_all('peminjaman');
	}
	public function pengembalian()
	{
		return $this->db->count_all('pengembalian');
	}
	
}
?>