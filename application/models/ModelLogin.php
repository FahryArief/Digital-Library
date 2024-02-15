<?php
	class ModelLogin extends CI_Model{

		public function auth($username,$pass)
		{
			$password = md5($pass);
			$username = $this->db->where('username', $username);
			$pass = $this->db->where('password', $password);
			$query = $this->db->get('user');
			if ($query->num_rows()>0) {
				foreach ($query -> result() as $row) {
					$sess = array(
						'id' => $row->id,
						'nama' => $row->nama,
						'username' => $row->username,
						'level' => $row->level
					);
					$this->session->set_userdata($sess);
				}
				redirect('dashboard');
			}else{
				$this->session->set_flashdata('info','<div class="alert alert-danger alert-dismissible fade show" role="alert">
				Login Gagal, Pastikan Username dan Password Benar.
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>');
			redirect('login');
			}
			
			
		}
	}

?>