<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller{

	public function index()
	{
		$data['title'] = "Admin Page";
		$id = $this->session->userdata('id_akun');
		$email = $this->session->userdata('email');
		$query = 'SELECT * FROM tb_akun JOIN tb_det_akun ON tb_akun.id_akun = tb_det_akun.id_akun WHERE tb_akun.email = "'.$email.'"';
		$data['user'] = $this->db->query($query)->row_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('templates/a_topbar',$data);
		$this->load->view('admin/index',$data);
		$this->load->view('templates/footer');
	}
}
