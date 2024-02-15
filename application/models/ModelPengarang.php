<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class ModelPengarang extends CI_Model {
	
	public function update($id_pengarang,$data)
	{
	$this->db->where('id_pengarang', $id_pengarang);
	$this->db->update('pengarang', $data);
	}

	public function hapus($id)
	{
		$this->db->where('id_pengarang', $id);
		$this->db->delete('pengarang');
	}
	}
	
	/* End of file ModelName.php */
	
?>