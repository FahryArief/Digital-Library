<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	class Anggota extends CI_Controller {

		Public function __construct() {
			parent::__construct();
			$this->load->model('ModelAnggota');
			
		}


		 public function index()
		 {
		$this->Security->getSecurity();
		$isi['content'] = 'anggota';
		$isi['judul'] = 'Data Anggota';
		$isi['data']= $this->db->get('user')->result();		
		$this->load->view('dashboard',$isi);
		 }

		 public function update()
		 {
			 $id = $this->input->post('id');
			 $password = $this->input->post('password');
    $hashP = md5($password);
			$data = array(
				'nama' => $this->input->post('name'),
				'username'=> $this->input->post('username'),
				'password' => $hashP,
				'jenkel' => $this->input->post('jenkel'),
				'alamat' => $this->input->post('alamat'),
				'no_hp' => $this->input->post('no_hp'),
				'email'=> $this->input->post('email'),
				'level'=> $this->input->post('level')
			);
			$array = $this->ModelAnggota->update($id, $data);
			if ($query = true) {
				$this->session->set_flashdata('info', 'Data Berhasil DiUpdate');
				redirect('anggota');
		 }
		}

		 public function simpan()
		 {
			$password = $this->input->post('password');
    $hashP = md5($password);
			$data = array(
				'nama' => $this->input->post('name'),
				'username'=> $this->input->post('username'),
				'password' => $hashP,
				'jenkel' => $this->input->post('jenkel'),
				'alamat' => $this->input->post('alamat'),
				'no_hp' => $this->input->post('no_hp'),
				'email'=> $this->input->post('email'),
				'level'=> $this->input->post('level')
			);
			$query = $this->db->insert('user', $data);
			if ($query = true) {
				$this->session->set_flashdata('info', 'Data Berhasil Disimpan');
				redirect('anggota');
		 }
	}
	public function hapus($id)
	{
		$query = $this->ModelAnggota->hapus($id);
		if ($query = true) {
			$this->session->set_flashdata('info', 'Data Berhasil Dihapus');
			redirect('anggota');
	 }
	}
}
?>