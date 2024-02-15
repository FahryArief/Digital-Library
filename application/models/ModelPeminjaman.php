<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelPeminjaman extends CI_Model {

    public function id_pm()
    {
        $this->db->select_max('id_pm');
        $query = $this->db->get('peminjaman');
        
        $lastId = $query->row('id_pm');
        $kode = ($lastId) ? intval(substr($lastId, 2)) + 1 : 1;
        $kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT);
        
        return "PM" . $kodemax;
    }

    public function update($id_pm, $data)
    {
        $this->db->where('id_pm', $id_pm);
        return $this->db->update('peminjaman', $data);
    }

    public function hapus($id)
    {
        $this->db->where('id_pm', $id);
        return $this->db->delete('peminjaman');
    }

    public function getDataPeminjam()
    {
        $this->db->select('*');
        $this->db->from('peminjaman');
        $this->db->join('user', 'peminjaman.id = user.id');
        $this->db->join('buku', 'peminjaman.id_buku = buku.id_buku');
        return $this->db->get();
    }

	public function jumlah_buku($id)
	{
		$this->db->select('jumlah');
		$this->db->from('buku');
		$this->db->where('id_buku', $id);
		return $this->db->get()->row_array();		
		
		
	}
	public function getDataPeminjamanByid($id)
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