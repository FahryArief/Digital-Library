<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class ModelPenerbit extends CI_Model {
	
	public function update($id_penerbit,$data)
	{
	$this->db->where('id_penerbit', $id_penerbit);
	$this->db->update('penerbit', $data);
	}

	public function hapus($id)
	{
		$this->db->where('id_penerbit', $id);
		$this->db->delete('penerbit');
	}
	}
	
	/* End of file ModelName.php */
	
?>