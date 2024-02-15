<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelHistory extends CI_Model {


    public function getDataPengembalian()
    {
        $this->db->select('*');
        $this->db->from('pengembalian');
		$this->db->where('pengembalian.id',$this->session->userdata('id')); 	
        $this->db->join('user', 'pengembalian.id = user.id');
        $this->db->join('buku', 'pengembalian.id_buku = buku.id_buku');
		
        return $this->db->get();
    }

	public function jumlah_buku($id)
	{
		$this->db->select('jumlah');
		$this->db->from('buku');
		$this->db->where('id_buku', $id);
		return $this->db->get()->row_array();		
		
		
	}
	public function getDatapengembalianByid($id)
	{
		$this->db->select('*');
		$this->db->from('peminjaman');
		$this->db->join('user', 'peminjaman.id = user.id');
		$this->db->join('buku', 'peminjaman.id_buku = buku.id_buku');
		$this->db->where('peminjaman.id_pm', $id);
		return $this->db->get()->row_array();	
	}

	public function deletePM($id)
	{
		$this->db->where('id_pm', $id);
		$this->db->delete('peminjaman');
	}
}
?>