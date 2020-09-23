<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller{

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
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim|min_length[3]|max_length[64]');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|max_length[64]|is_unique[tb_akun.email]');
		$this->form_validation->set_rules('username', 'Username', 'required|trim|min_length[6]|max_length[16]|is_unique[tb_akun.username]');
		$this->form_validation->set_rules('katasandi', 'Katasandi', 'required|trim|min_length[6]|matches[katasandi2]');
		$this->form_validation->set_rules('katasandi2', 'Ulangi Katasandi', 'required|trim|matches[katasandi]');

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Registrasi';
			$this->load->view('templates/auth_header', $data);
			$this->load->view('main/registrasi');
			$this->load->view('templates/auth_footer');
		} else {
			$data1 = [
				'nama' => htmlspecialchars($this->input->post('nama', true)),
				'email' => htmlspecialchars(strtolower($this->input->post('email', true))),
				'username' => htmlspecialchars(strtolower($this->input->post('username', true))),
				'katasandi' => password_hash($this->input->post('katasandi'), PASSWORD_DEFAULT),
				'role_id' => 2,
				'is_active' => 1,
				'date_created' => time()
			];
			
			$this->db->insert('tb_akun', $data1);
			$last_id = $this->db->insert_id();
			$data2 = [
					'id_akun' => $last_id,
					'img_profil' =>'default.jpg'
			];

			
			
			$this->db->insert('tb_det_akun',$data2);
			redirect('auth');
		}
	}
}
