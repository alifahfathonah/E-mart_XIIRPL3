<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
	}


	public function index()
	{
		redirect('auth/login');

	}
	public function login()
	{
		if($this->session->userdata('email'))
		{
			if($this->session->userdata('role_id') == 1)
			{
				redirect('admin');
			}
			else
			{
				redirect('app');
			}
		}

		$this->form_validation->set_rules('email_username', 'Email/username', 'required|trim');
		$this->form_validation->set_rules('katasandi', 'Katasandi', 'required|trim');
		if($this->form_validation->run() == false)
		{
			$data['title'] = 'Login';
			$this->load->view('templates/auth_header',$data);
			$this->load->view('auth/login');
			$this->load->view('templates/auth_footer');
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
	                    	'id_akun' => $result['id_akun'],
	                        'email' => $result['email'],
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

	public function registrasi()
	{
		if($this->session->userdata('email'))
		{
			if($this->session->userdata('role_id') == 1)
			{
				redirect('admin');
			}
			else
			{
				redirect('app');
			}
		}
		

		$this->form_validation->set_rules('nama', 'Nama', 'required|trim|min_length[3]|max_length[64]');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|max_length[64]|is_unique[tb_akun.email]');
		$this->form_validation->set_rules('username', 'Username', 'required|trim|min_length[6]|max_length[16]|is_unique[tb_akun.username]');
		$this->form_validation->set_rules('katasandi', 'Katasandi', 'required|trim|min_length[6]|matches[katasandi2]');
		$this->form_validation->set_rules('katasandi2', 'Ulangi Katasandi', 'required|trim|matches[katasandi]');

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Registrasi';
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/registrasi');
			$this->load->view('templates/auth_footer');
		} else {
			$email = htmlspecialchars(strtolower($this->input->post('email', true)));
			$data_akun = [
				'nama' => htmlspecialchars($this->input->post('nama', true)),
				'email' => $email,
				'username' => htmlspecialchars(strtolower($this->input->post('username', true))),
				'katasandi' => password_hash($this->input->post('katasandi'), PASSWORD_DEFAULT),
				'role_id' => 2,
				'is_active' => 0,
				'date_created' => time()
			];

			$token = base64_encode(random_bytes(32));
            $user_token = [
                'email' => $email,
                'token' => $token,
                'status' => 'unexpired',
                'date_created' => time()
            ];

            if($this->db->insert('tb_akun', $data_akun))
            {
				$last_id = $this->db->insert_id();
				$data_det_akun = [
						'id_akun' => $last_id,
						'img_profil' =>'default.png'
				];
				$this->db->insert('tb_det_akun',$data_det_akun);
				
				if($this->db->insert('tb_user_token', $user_token))
				{
					$this->session->set_userdata('unverify', TRUE);
				}
            }
			


			$this->_sendEmail($token,'verify');
			$this->session->set_flashdata('BerhasilDaftar','Akun berhasil didaftarkan! Silahkan verifikasi terlebih dahulu.!');
			redirect('auth/verifikasi');
		}
	}


	public function verifikasi(){
		if($this->session->userdata('email'))
		{
			if($this->session->userdata('role_id') == 1)
			{
				redirect('admin');
			}
			else
			{
				redirect('app');
			}
		}
		else if(!$this->session->userdata('unverify'))
		{
			redirect('access/blocked');
		}
	}

	private function _sendEmail($token, $type)
    {
        $config = [
            'protocol'  => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'rifkyalfariz1020@gmail.com',
            'smtp_pass' => 'Banjar 03 Februari 2003',
            'smtp_port' => 465,
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'newline'   => "\r\n"
        ];

        $this->email->initialize($config);

        $this->email->from('rifkyalfariz1020@gmail.com', 'Rifky Alfariz');
        // $this->email->to('rifkyalfariz2003@gmail.com');
        $this->email->to($this->input->post('email'));

        if ($type == 'verify') {
            $this->email->subject('Account Verification');
            $this->email->message('Click this link to verify you account : <a href="' . base_url() . 'auth/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Activate</a><br> Token will expired in 30 minutes.');
        } else if ($type == 'forgot') {
            $this->email->subject('Reset Password');
            $this->email->message('Click this link to reset your password : <a href="' . base_url() . 'auth/resetpassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Reset Password</a>');
        }

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }


    public function verify()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('tb_akun', ['email' => $email])->row_array();

        if ($user) {
            $user_token = $this->db->get_where('tb_user_token', ['token' => $token])->row_array();

            if ($user_token) {
                if (time() - $user_token['date_created'] < (60 * 30)) {
                    $this->db->set('is_active', 1);
                    $this->db->where('email', $email);
                    $this->db->update('tb_akun');

                    $this->db->set('status', 'used');
                    $this->db->where('email', $email);
                    $this->db->update('tb_user_token');

                    // $this->db->delete('tb_user_token', ['email' => $email]);

                    $this->session->set_flashdata('BerhasilDiaktivasi', 'Your email has been activated! Please login.');
                    redirect('auth/login');
                } else {
                	$this->db->set('status', 'expired');
                    $this->db->where('email', $email);
                    $this->db->update('tb_user_token');

                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Account activation failed! Token expired.</div>');
                    redirect('auth/login');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Account activation failed! Wrong token.</div>');
                redirect('auth/login');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Account activation failed! Wrong email.</div>');
            redirect('auth/login');
        }
    }















	public function lupa_katasandi()
	{
		if($this->session->userdata('email'))
		{
			if($this->session->userdata('role_id') == 1)
			{
				redirect('admin');
			}
			else
			{
				redirect('app');
			}
		}
		if($this->form_validation->run() == false){
			$data['title'] = 'Lupa Katasandi';
			$this->load->view('templates/auth_header',$data);
			$this->load->view('auth/lupa_katasandi',$data);
			$this->load->view('templates/auth_footer');
		}
		else
		{
			$email = $this->input->post('email');
			$akun = $this->this->db->get_where('tb_akun', ['email' => $email])->row_array();
			if($akun)
			{
				
			}
		}
	}

	public function logout()
    {
        $this->session->sess_destroy();

        $this->session->set_flashdata('Logout', 'Berhasil logout!');
        redirect('app');
    }





}
