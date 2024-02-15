<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	class Kategori extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
			$this->load->model('ModelKategori'); // Load the Modelkategori model
		}
		 public function index()
		 {
		$this->Security->getSecurity();
		$isi['content'] = 'kategori';
		$isi['judul'] = 'Data Kategori';
		$isi['data']= $this->db->get('kategori')->result();		
		$this->load->view('dashboard',$isi);
		 }

		 public function update()
		 {
			$id_kategori = $this->input->post('id_kategori');
			$data['nama_kategori'] = $this->input->post('nama_kategori');
		
			$query = $this->Modelkategori->update($id_kategori, $data);
			if ($query = true) {
				$this->session->set_flashdata('info', 'Data Berhasil DiUpdate');
				redirect('kategori');
		 }
		}

		 public function simpan()
		 {
			$data = array(
				'nama_kategori' => $this->input->post('nama_kategori'),
			);
			$array = $this->db->insert('kategori', $data);
			if ($query = true) {
				$this->session->set_flashdata('info', 'Data Berhasil Disimpan');
				redirect('kategori');
		 }
	}
	public function hapus($id)
	{
		$query = $this->Modelkategori->hapus($id);
		if ($query = true) {
			$this->session->set_flashdata('info', 'Data Berhasil Dihapus');
			redirect('kategori');
	 }
	}

		}
		?>