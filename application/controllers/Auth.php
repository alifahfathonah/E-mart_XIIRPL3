<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}


	public function index()
	{
		$data['title'] = "Login";
		$this->load->view('templates/auth_header', $data);
		$this->load->view('main/index');
		$this->load->view('templates/auth_footer');
	}

	public function registrasi()
	{
		$this->form_validation->set_rules('nama_depan', 'Nama Depan', 'required|trim|min_length[3]|max_length[16]');
		$this->form_validation->set_rules('nama_belakang', 'Nama Belakang', 'required|trim|min_length[3]|max_length[16]');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|max_length[64]|is_unique[tb_akun.email]');
		$this->form_validation->set_rules('username', 'Username', 'required|trim|min_length[6]|max_length[16]|is_unique[tb_akun.username]');
		$this->form_validation->set_rules('katasandi', 'Katasandi', 'required|trim|min_length[6]|matches[katasandi2]');
		$this->form_validation->set_rules('katasandi2', 'Ulangi Katasandi', 'required|trim|matches[katasandi]');

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Registrasi';
			$this->load->view('templates/auth_header', $data);
			$this->load->view('admin/registrasi');
			$this->load->view('templates/auth_footer');
		} else {
			$data = [
				'nama_depan' => htmlspecialchars($this->input->post('nama_depan', true)),
				'nama_belakang' => htmlspecialchars($this->input->post('nama_belakang', true)),
				'email' => htmlspecialchars($this->input->post('email', true)),
				'username' => htmlspecialchars(strtolower($this->input->post('username', true))),
				'katasandi' => password_hash($this->input->post('katasandi'), PASSWORD_DEFAULT),
				'role_id' => 2,
				'is_active' => 1,
				'date_created' => time()
			];

			$this->db->insert('tb_akun', $data);
			redirect('auth');
		}
	}
}
