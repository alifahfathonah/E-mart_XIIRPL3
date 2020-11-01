<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Toko extends CI_Controller{
	public function index()
	{

	}

	public function buat()
	{
		$id = $this->session->userdata('id_akun');
        $email = $this->session->userdata('email');
        $query = 'SELECT * FROM tb_akun JOIN tb_det_akun ON tb_akun.id_akun = tb_det_akun.id_akun WHERE tb_akun.email = "'.$email.'"';
        $data['user'] = $this->db->query($query)->row_array();
        $data['kategori'] = $this->db->query("SELECT * FROM tb_kategori ORDER BY kategori ASC");
        $data['sub_kategori'] = $this->db->query("SELECT * FROM tb_sub_kategori");
        $data['toko'] = $this->db->query("SELECT * FROM tb_akun JOIN tb_toko ON tb_akun.id_akun = tb_toko.id_akun WHERE tb_akun.id_akun = '".$id."'")->row_array();
        $data['keranjang'] = $this->db->query("SELECT * FROM tb_produk as tp JOIN tb_keranjang as tk ON tp.id_produk = tk.id_produk WHERE tk.id_akun = '".$id."'");
		$data['title'] = 'Buat Toko';
		if(!$this->session->userdata('email'))
		{
			$this->session->set_flashdata('LoginDulu','Silahkan login terlebih dahulu!');
			redirect(base_url('auth/login'));
		}
		if($data['toko'])
		{
			redirect(base_url('toko/profil'));
		}

		$this->form_validation->set_rules('namaToko','Nama Toko', 'required|trim|max_length[24]|min_length[10]|is_unique[tb_toko.nama_toko]');

		if($this->form_validation->run()== FALSE)
		{
			$this->load->view('templates/header',$data);
			$this->load->view('templates/u_al_topbar',$data);
			$this->load->view('toko/buat_toko',$data);
			$this->load->view('templates/footer',$data);
		}
		else
		{
			$namaToko = htmlspecialchars($this->input->post('namaToko'));
			$id = $this->session->userdata('id_akun');
			$data = [
				'id_akun' => $id,
				'nama_toko' => $namaToko,
				'img_toko' => 'default-toko-image.png',
				'tgl_dibuat' => time(),
				'status' => 0
			];
			$this->db->insert('tb_toko',$data);
			$this->session->set_flashdata('TungguKonfirmasi','Toko berhasil dibuat! Mohon tunggu konfirmasi admin untuk mengaktifkan toko!');
			redirect(base_url('toko/profil'));
		}
	}

	// public function profil($id)
	// {
	// 	$idToko = $id;
	// }
}