<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	class Pengarang extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
			$this->load->model('ModelPengarang'); // Load the ModelPengarang model
		}
		 public function index()
		 {
		$this->Security->getSecurity();

		$isi['content'] = 'pengarang';
		$isi['judul'] = 'Data Pengarang';
		$isi['data']= $this->db->get('pengarang')->result();		
		$this->load->view('dashboard',$isi);
		 }

		 public function update()
		 {
			$id_pengarang = $this->input->post('id_pengarang');
			$data['nama_pengarang'] = $this->input->post('nama_pengarang');
		
			$query = $this->ModelPengarang->update($id_pengarang, $data);
			if ($query = true) {
				$this->session->set_flashdata('info', 'Data Berhasil DiUpdate');
				redirect('pengarang');
		 }
		}

		 public function simpan()
		 {
			$data = array(
				'nama_pengarang' => $this->input->post('nama_pengarang'),
			);
			$array = $this->db->insert('pengarang', $data);
			if ($query = true) {
				$this->session->set_flashdata('info', 'Data Berhasil Disimpan');
				redirect('pengarang');
		 }
	}
	public function hapus($id)
	{
		$query = $this->ModelPengarang->hapus($id);
		if ($query = true) {
			$this->session->set_flashdata('info', 'Data Berhasil Dihapus');
			redirect('pengarang');
	 }
	}

		}
		?>
