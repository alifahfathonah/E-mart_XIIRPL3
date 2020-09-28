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
		$data['title'] = "Login Page";
		$this->load->view('templates/header', $data);
		$this->load->view('auth/login');
		$this->load->view('templates/footer');
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
			$this->load->view('templates/header', $data);
			$this->load->view('auth/registrasi');
			$this->load->view('templates/footer');
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
			$this->session->set_flashdata('BerhasilDaftar','Akun berhasil didaftarkan! \\r\\n Silahkan login!');
			redirect('auth/login');
		}
	}

	public function login()
	{
		$this->form_validation->set_rules('email_username', 'Email/username', 'required|trim');
		$this->form_validation->set_rules('katasandi', 'Katasandi', 'required|trim');
		if($this->form_validation->run() == false)
		{
			$data['title'] = 'Login';
			$this->load->view('templates/header',$data);
			$this->load->view('auth/login');
			$this->load->view('templates/footer');
		}
		else
		{
			$email_username = $this->input->post('email_username');
			$katasandi = $this->input->post('katasandi');
			$query = 'SELECT * FROM tb_akun WHERE email = "'.$email_username.'" or username = "'.$email_username.'"';

			$result = $this->db->query($query)->row_array();
			
			if ($result) {
	            // jika usernya aktif
	            if ($result['is_active'] == 1) {
	                // cek password
	                if (password_verify($katasandi, $result['katasandi'])) {
	                    $data = [
	                        'email' => $result['email'],
	                        'username' =>$result['username'],
	                        'role_id' => $result['role_id']
	                    ];
	                    $this->session->set_userdata($data);
	                    if ($result['role_id'] == 1) {
	                        redirect('admin');
	                    } else {
	                        redirect('app');
	                    }
	                } else {
	                    $this->session->set_flashdata('KatasandiSalah','Katasandi salah!');
	                    redirect('auth/login');
	                }
	            } else {
	                $this->session->set_flashdata('EmailBelumDiaktivasi','Email belum diaktivasi!');
	                redirect('auth/login');
	            }
	        } else {
	            $this->session->set_flashdata('Email/UsernameTidakAda','Email atau username tidak ada!');
	            redirect('auth/login');
	        }
		}
	}

	public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('Logout', 'Berhasil logout!');
        redirect('auth');
    }





}
