<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	class Register extends CI_Controller {

		 public function index()
		 {
		$this->load->view('register');
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
				$this->session->set_flashdata('info','<div class="alert alert-success alert-dismissible fade show" role="alert">
				Registrasi Berhasil, Silahkan Login Dengan Username dan Password Yang Sudah Dibuat.
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>');
				redirect('register');
		 }
	}
	
}
?>