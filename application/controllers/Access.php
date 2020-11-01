<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Access extends CI_Controller{

	public function index()
	{
		redirect('access/blocked');
	}

	public function blocked()
	{
		$data['title'] = 'Error 403';
		$this->load->view('templates/auth_header',$data);
		$this->load->view('err/err_403');
		$this->load->view('templates/auth_footer');
	}
}