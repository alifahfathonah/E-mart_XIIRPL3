<?php
defined('BASEPATH') or exit('No direct script access allowed');

class App extends CI_Controller{

	public function index()
    {
        $data['title'] = 'Halaman Utama';
        $id = $this->session->userdata('id_akun');
        $email = $this->session->userdata('email');
        $query = 'SELECT * FROM tb_akun JOIN tb_det_akun ON tb_akun.id_akun = tb_det_akun.id_akun WHERE tb_akun.email = "'.$email.'"';
        $data['user'] = $this->db->query($query)->row_array();

        if(!$this->session->userdata('email')==true)
        {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/u_bl_topbar',$data);
            $this->load->view('user/index', $data);
            $this->load->view('templates/footer');
        }
        else
        {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/u_al_topbar',$data);
            $this->load->view('user/index', $data);
            $this->load->view('templates/footer');
        }
    }
}
