<?php
defined('BASEPATH') or exit('No direct script access allowed');

class App extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
    }

	public function index()
    {
        $data['title'] = '';
        $id = $this->session->userdata('id_akun');
        $email = $this->session->userdata('email');
        $query = 'SELECT * FROM tb_akun JOIN tb_det_akun ON tb_akun.id_akun = tb_det_akun.id_akun WHERE tb_akun.email = "'.$email.'"';
        $data['user'] = $this->db->query($query)->row_array();
        $data['kategori'] = $this->db->query("SELECT * FROM tb_kategori ORDER BY kategori ASC");
        $data['sub_kategori'] = $this->db->query("SELECT * FROM tb_sub_kategori");
        $data['toko'] = $this->db->query("SELECT * FROM tb_akun JOIN tb_toko ON tb_akun.id_akun = tb_toko.id_akun WHERE tb_akun.id_akun = '".$id."'")->row_array();
        $data['keranjang'] = $this->db->query("SELECT COUNT(tk.id_keranjang) as jumlah_keranjang, SUM(tk.jumlah_produk) as jumlah_produk_keranjang,tp.nama_produk, tp.harga,tp.img_produk,tk.jumlah_produk FROM tb_produk as tp JOIN tb_keranjang as tk ON tp.id_produk = tk.id_produk WHERE tk.id_akun = '".$id."'");
        // $data['keranjang'] = $this->db->select('*')
        //                             ->from('tb_akun as ta')
        //                             ->where(['tk.id_akun'=>$this->session->userdata('id_akun')])
        //                             ->join('tb_keranjang as tk','ta.id_akun = tk.id_akun','LEFT')
        //                             ->join('tb_produk as tp','tp.id_produk = tk.id_produk','LEFT')
        //                             ->get();
        if(!$this->session->userdata('email')==true)
        {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/u_bl_topbar',$data);
            $this->load->view('user/index', $data);
            $this->load->view('templates/footer',$data);
        }
        else
        {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/u_al_topbar',$data);
            $this->load->view('user/index', $data);
            $this->load->view('templates/footer',$data);
        }
    }
    
    // public function logout()
    // {
    //     $this->session->sess_destroy();

    //     $this->session->set_flashdata('Logout', 'Berhasil logout!');
    //     redirect('app');
    // }
}
