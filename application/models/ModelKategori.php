<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class ModelKategori extends CI_Model {
	
	public function update($id_kategori,$data)
	{
	$this->db->where('id_kategori', $id_kategori);
	$this->db->update('kategori', $data);
	}

	public function hapus($id)
	{
		$this->db->where('id_kategori', $id);
		$this->db->delete('kategori');
	}
	}
	
	/* End of file ModelName.php */
	
?>