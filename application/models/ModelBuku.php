<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelBuku extends CI_Model {

    public function id_buku()
    {
        $this->db->select_max('id_buku');
        $query = $this->db->get('buku');
        
        $lastId = $query->row('id_buku');
        $kode = ($lastId) ? intval(substr($lastId, 2)) + 1 : 1;
        $kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT);
        
        return "BK" . $kodemax;
    }

	public function update($id_buku, $data) {
		// Lakukan update data buku
		$this->db->where('id_buku', $id_buku);
		return $this->db->update('buku', $data);
	}
	

    public function hapus($id)
    {
        $this->db->where('id_buku', $id);
        return $this->db->delete('buku');
    }

    public function getDataBuku()
    {
        $this->db->select('*');
        $this->db->from('buku');
        $this->db->join('pengarang', 'buku.id_pengarang = pengarang.id_pengarang');
        $this->db->join('penerbit', 'buku.id_penerbit = penerbit.id_penerbit');
        $this->db->join('kategori', 'buku.id_kategori = kategori.id_kategori');
        return $this->db->get();
    }
	
	public function getEbookNameById($id_buku)
{
    $this->db->select('ebook');
    $this->db->where('id_buku', $id_buku);
    $query = $this->db->get('buku');
    $row = $query->row();
    return ($query->num_rows() > 0) ? $row->ebook : false;
}

}
?>
