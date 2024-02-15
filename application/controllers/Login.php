<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

public function __construct() {
	parent::__construct();
	$this->load->model('ModelLogin');
}

	public function index()
	{
		$this->load->view('login');
	}

	public function auth(){
		$username = $this->input->post('username');
		$pass = $this->input->post('password');
		$this->ModelLogin->auth($username,$pass);
	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('login');
	}
}