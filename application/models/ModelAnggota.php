<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class ModelAnggota extends CI_Model {
	
	
	public function update($id,$data)
	{
	$this->db->where('id', $id);
	$this->db->update('user', $data);
	}

	public function hapus($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('user');
	}
	}
	
	/* End of file ModelName.php */
	
?>