<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	class Buku extends CI_Controller {

		Public function __construct() {
			parent::__construct();
			$this->load->model('ModelBuku');
			$this->load->model('ModelPeminjaman');
			$this->load->library('upload');
		}


	public function index(){
		$this->Security->getSecurity();
		$isi['content'] = 'buku';
		$isi['judul'] = 'Data Buku';
		$isi['id_pm']= $this->ModelPeminjaman->id_pm();
		$isi['data']= $this->ModelBuku->getDataBuku();		
		$isi['pengarang']= $this->db->get('pengarang')->result();		
		$isi['penerbit']= $this->db->get('penerbit')->result();
		$isi['kategori']= $this->db->get('kategori')->result();
		$isi['id_buku']= $this->ModelBuku->id_buku();
		$this->load->view('dashboard',$isi);
	}

	public function update() {
		$id_buku = $this->input->post('id_buku');
		$data = array(
			'id_pengarang' => $this->input->post('id_pengarang'),
			'id_penerbit' => $this->input->post('id_penerbit'),
			'id_kategori' => $this->input->post('id_kategori'),
			'judul_buku' => $this->input->post('judul_buku'),
			'tahun_terbit' => $this->input->post('tahun_terbit'),
			'jumlah' => $this->input->post('jumlah')
		);
	
		// Upload file baru jika ada
		if (!empty($_FILES['ebook']['name'])) {
			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'pdf';
			$config['max_size'] = 10000; // dalam KB
	
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			if ($this->upload->do_upload('ebook')) {
				// Jika berhasil upload, ambil informasi file
				$ebook = $this->upload->data('file_name');
				// Masukkan nama file baru ke dalam data update
				$data['ebook'] = $ebook;
	
				// Hapus file buku lama
				$old_ebook = $this->ModelBuku->getEbookNameById($id_buku);
				if ($old_ebook) {
					$path = './uploads/' . $old_ebook;
					if (file_exists($path)) {
						unlink($path);
					}
				}
			} else {
				// Handle the case where the upload fails
				$error = array('error' => $this->upload->display_errors());
				print_r($error); // Output pesan error
				return;
			}
		}
	
		// Lakukan update data buku
		$query = $this->ModelBuku->update($id_buku, $data);
		if ($query) {
			$this->session->set_flashdata('info', 'Data Berhasil Diupdate');
			redirect('buku');
		} else {
			// Handle the case where the update fails
			$this->session->set_flashdata('info', 'Update Gagal');
			redirect('buku');
		}
	}
	
	
	public function simpan() {
			$ebook =$_FILES['ebook']['name'];
			// Konfigurasi upload file
			$config['upload_path']   = './uploads/';
			$config['allowed_types'] = 'pdf';
			$config['max_size']      = 10000; // dalam KB
	
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			// Lakukan upload file
			if ($this->upload->do_upload('ebook')) {
				// Jika berhasil upload, ambil informasi file
				$ebook = $this->upload->data('file_name');
	
				// Buat array data untuk disimpan ke database
				$data = array(
					'id_buku'       => $this->input->post('id_buku'),
					'id_pengarang'  => $this->input->post('id_pengarang'),
					'id_penerbit'   => $this->input->post('id_penerbit'),
					'id_kategori'   => $this->input->post('id_kategori'),
					'judul_buku'    => $this->input->post('judul_buku'),
					'tahun_terbit'  => $this->input->post('tahun_terbit'),
					'jumlah'        => $this->input->post('jumlah'),
					'ebook'         => $ebook // Simpan nama file
				);
	
				// Simpan data ke database
				$query = $this->db->insert('buku', $data);
				if ($query) {
					$this->session->set_flashdata('info', 'Data Berhasil Disimpan');
					redirect('buku');
				} else {
					// Handle the case where the insert fails
					$this->session->set_flashdata('info', 'Insert Gagal');
					redirect('buku');
				}
			} else {
				// Handle the case where the upload fails
				$error = array('error' => $this->upload->display_errors());
				print_r($error); // Output pesan error
			}
		}

	public function hapus($id){
		// 
		$this->db->where('id_buku',$id);
		$query = $this->db->get('buku');
		$row = $query->row();
   
		unlink("./uploads/$row->ebook");
   
		$array = $this->db->delete('buku', array('id_buku' => $id));
		if ($array = true) {
			$this->session->set_flashdata('info', 'Data Berhasil Dihapus');
			redirect('buku');
	 }
	}
	function baca($ebook){
        if (isset($_POST['view'])) {
            header("content-type: application/pdf");
            readfile('./uploads/' . $ebook . '');
        }
    }
}
?>
