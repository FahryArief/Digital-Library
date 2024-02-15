<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	class Penerbit extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
			$this->load->model('ModelPenerbit'); // Load the ModelPenerbit model
		}
		 public function index()
		 {
		$this->Security->getSecurity();

		$isi['content'] = 'penerbit';
		$isi['judul'] = 'Data Penerbit';
		$isi['data']= $this->db->get('penerbit')->result();		
		$this->load->view('dashboard',$isi);
		 }

		 public function update()
		 {
			$id_penerbit = $this->input->post('id_penerbit');
			$data['nama_penerbit'] = $this->input->post('nama_penerbit');
		
			$query = $this->ModelPenerbit->update($id_penerbit, $data);
			if ($query = true) {
				$this->session->set_flashdata('info', 'Data Berhasil DiUpdate');
				redirect('penerbit');
		 }
		}

		 public function simpan()
		 {
			$data = array(
				'nama_penerbit' => $this->input->post('nama_penerbit'),
			);
			$array = $this->db->insert('penerbit', $data);
			if ($query = true) {
				$this->session->set_flashdata('info', 'Data Berhasil Disimpan');
				redirect('penerbit');
		 }
	}
	public function hapus($id)
	{
		$query = $this->ModelPenerbit->hapus($id);
		if ($query = true) {
			$this->session->set_flashdata('info', 'Data Berhasil Dihapus');
			redirect('penerbit');
	 }
	}

		}
		?>