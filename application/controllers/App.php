<?php
defined('BASEPATH') or exit('No direct script access allowed');

class App extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
	}
	public function index()
    {
        $data['title'] = 'My Profile';
        $email = $this->session->userdata('email');
        $username = $this->session->userdata('username');
        $query = 'SELECT * FROM tb_akun WHERE email = "'.$email.'" or username = "'.$username.'"';
        $data['user'] = $this->db->query($query)->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }
}
