<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function index(){
		$this->autlogin();
	}
	public function autlogin(){
			$this->load->view('frontend/login');
	}
	public function logout(){
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}
	public function cekuser(){
	$username = strtolower($this->input->post('username'));
    $ambil = $this->db->query('select * from tbl_pelanggan where username_pelanggan = "'.$username.'"')->row_array();
    $password = $this->input->post('password');
		if ($ambil) {
			if ($ambil['status_pelanggan'] == '1') { 
				if (password_verify($password,$ambil['password_pelanggan'])) {
		    	$this->db->where('username_pelanggan',$username);
		        $query = $this->db->get('tbl_pelanggan');
		            foreach ($query->result() as $row) {
		                $sess = array(
		                	'kd_pelanggan' => $row->kd_pelanggan,
		                    'username' => $row->username_pelanggan,
		                    'password' => $row->password_pelanggan,
		                    'ktp'     => $row->no_ktp_pelanggan,
		                    'nama_lengkap'     => $row->nama_pelanggan,
		                    'img_pelanggan'	=> $row->img_pelanggan,
		                    'email'   => $row->email_pelanggan,
		                    'telpon'   => $row->telpon_pelanggan,
		                    'alamat'	=> $row->alamat_pelanggan
		                	);
		                }
		                $this->session->set_userdata($sess);
		                if ($this->session->userdata('jadwal') == NULL) {
		                	redirect('tiket');
		                }else{
		                	redirect('tiket/beforebeli/'.$this->session->userdata('jadwal').'/'.$this->session->userdata('asal').'/'.$this->session->userdata('tanggal'));
		                }
            		}else{
            		$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
					  Salah Password
					</div>');
				redirect('login');
            	}
			}else{
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
					  Username Belum verifikasi cek kembali email anda
					</div>');
				redirect('login');
			}
		}else{
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
					  Username Tidak Terdaftar
					</div>');
    		redirect('login');
		}
	
	}
	public function daftar(){
		$this->form_validation->set_rules('nomor', 'Nomor', 'trim|required|is_unique[tbl_pelanggan.telpon_pelanggan]',array(
			'required' => 'Nomor HP Wajib Di isi.',
			'is_unique' => 'Nomor Sudah Di Gunakan.'
			 ));
		$this->form_validation->set_rules('name', 'Name', 'trim|required',array(
			'required' => 'Nama Wajib Di isi.',
			 ));
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|is_unique[tbl_pelanggan.username_pelanggan]',array(
			'required' => 'Username Wajib Di isi.',
			'is_unique' => 'Username Sudah Di Gunakan.'
			 ));
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[tbl_pelanggan.email_pelanggan]',array(
			'required' => 'Email Wajib Di isi.',
			'valid_email' => 'Masukan Email Dengan Benar',
			'is_unique' => 'Email Sudah Di Gunakan.'
			 ));
		$this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[8]|matches[password2]',array(
			'matches' => 'Password Tidak Sama.',
			'min_length' => 'Password Minimal 8 Karakter.'
			 ));
		$this->form_validation->set_rules('password2', 'Password', 'trim|required|matches[password1]');
		if ($this->form_validation->run() == false) {
			$this->load->view('frontend/daftar');
		} else {
			// die(print_r($_POST));
			$this->load->model('getkod_model');
			$data = array(
			'kd_pelanggan'	=> $this->getkod_model->get_kodpel(),
			'nama_pelanggan'  => $this->input->post('name'),
			'email_pelanggan'	    	=> $this->input->post('email'),
			'img_pelanggan'		=> 'assets/frontend/img/default.png',
			'alamat_pelanggan'		=> $this->input->post('alamat'),
			'telpon_pelanggan'		=> $this->input->post('nomor'),
			'username_pelanggan'		=> $this->input->post('username'),
			'status_pelanggan' => 0,
			'date_create_pelanggan' => time(),
			'password_pelanggan'		=> password_hash($this->input->post('password1'),PASSWORD_DEFAULT)
			);
			// die(print_r($data));
			$token = md5($this->input->post('email').date("d-m-Y H:i:s"));
			$data1 = array(
				'nama_token' => $token,
				'email_token' => $this->input->post('email'),
				'date_create_token' => time()
				 );
			// die(print_r($data1));
			$this->db->insert('tbl_pelanggan', $data);
			$this->db->insert('tbl_token_pelanggan', $data1);
			$this->_sendmail($token,'verify');
			$this->session->set_flashdata('message', 'swal("Berhasil", "Berhasil Daftar Harap Cek Email Kamu", "success");');
    		redirect('login');
		}

	}
	Private function _sendmail($token='',$type=''){
		$config = [
               'mailtype'  => 'html',
               'charset'   => 'utf-8',
               'protocol'  => 'smtp',
               'smtp_host' => 'ssl://smtp.gmail.com',
               'smtp_user' => 'sancikob@gmail.com',    // Ganti dengan email gmail kamu
               'smtp_pass' => 'tiketbusci3',      // Password gmail kamu
               'smtp_port' => 465,
               'crlf'      => "rn",
               'newline'   => "rn"
           ];
        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
        $this->email->from('XTRANS');
        $this->email->to($this->input->post('email'));
        // $this->email->attach('https://masrud.com/content/images/20181215150137-codeigniter-smtp-gmail.png');
        if ($type == 'verify') {
        	$this->email->subject('Account verify Tiket XTRANS');
       		$this->email->message('Klik link tersebut untuk verifikasi akun anda <a href="'.base_url('login/verify?email='.$this->input->post('email').'&token='.$token).'" >Verifikasi</a>');
        }elseif ($type == 'forgot') {
        	$this->email->subject('Akun Reset Tiket XTRANS');
       		$this->email->message('Klik link tersebut untuk Reset akun anda <a href="'.base_url('login/forgot?email='.$this->input->post('email').'&token='.$token).'" >Reset Password</a>');
        }
        if ($this->email->send()) {
            return true;
        } else {
            echo 'Error! email tidak dapat dikirim.';
        }
	}
	public function verify($value=''){
		$email = $this->input->get('email');
		$token = $this->input->get('token');
		$sqlcek = $this->db->get_where('tbl_pelanggan',['email_pelanggan' => $email])->row_array();
		if ($sqlcek) {
			$sqlcek_token = $this->db->get_where('tbl_token_pelanggan',['nama_token' => $token])->row_array();
			if ($sqlcek_token) {
				if(time() - $sqlcek_token['date_create_token'] < (60 * 60 * 24)){
					$update = array('status_pelanggan' => 1, );
					$where = array('email_pelanggan' => $email );
					$this->db->update('tbl_pelanggan', $update,$where);
					$this->db->delete('tbl_token_pelanggan',['email_token' => $email]);
					$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
					Berhasil Verifikasi Login Kembali Akun Anda
					</div>');
					redirect('login');
				}else{
					$this->db->delete('tbl_pelanggan',['email_pelanggan' => $email]);
					$this->db->delete('tbl_token_pelanggan',['email_token' => $email]);
					$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
						 Token Expaird Harap kembali daftar akun anda
						</div>');
	    			redirect('login');
				}
			}else{
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
						  Gagal Verifikasi Token Salah 
						</div>');
	    		redirect('login');
			}
		}else{
		$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
						  Gagal Verifikasi Email
						</div>');
	    redirect('login');
		}
	}
	public function lupapassword($value=''){
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email',array(
			'required' => 'Email Wajib Di isi.',
			'valid_email' => 'Masukan Email Dengan Benar',
			 ));
		if ($this->form_validation->run() == false) {
			$this->load->view('frontend/lupapassword');
		} else {
			// print_r($_POST);
			$email = $this->input->post('email');
			$sqlcek = $this->db->get_where('tbl_pelanggan',['email_pelanggan' => $email],['status_pelanggan' => 1])->row_array();
			// print_r($sqlcek);
			if ($sqlcek) {
				$token = md5($email.date("d-m-Y H:i:s"));
				$data = array(
				'nama_token' => $token,
				'email_token' => $email,
				'date_create_token' => time()
				 );
			// die(print_r($data));
			$this->db->insert('tbl_token_pelanggan', $data);
			$this->_sendmail($token,'forgot');
			$this->session->set_flashdata('message', 'swal("Berhasil", "Berhasil Reset Password Harap Cek Email Kamu", "success");');
    		redirect('login');
			}else{
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
						  Email Tidak Ada Atau Akun Belum Aktif
						</div>');
	   			redirect('login/lupapassword');
			}
		}
	}
	public function forgot($value=''){
		$email = $this->input->get('email');
		$token = $this->input->get('token');
		$sqlcek = $this->db->get_where('tbl_pelanggan',['email_pelanggan' => $email])->row_array();
		if ($sqlcek) {
			$sqlcek_token = $this->db->get_where('tbl_token_pelanggan',['nama_token' => $token])->row_array();
			if ($sqlcek_token) {
				$this->session->set_userdata('resetemail' ,$email);
				$this->changepassword();
			}else{
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
						  Gagal Reset Token Email Salah 
						</div>');
	    		redirect('login');
			}
		}else{
		$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
						  Gagal Reset Email Salah
						</div>');
	    redirect('login');
		}
	}
	public function changepassword($value=''){
		if ($this->session->userdata('resetemail') == NULL) {
			redirect('login/daftar');
		}
		$this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[8]|matches[password2]',array(
			'matches' => 'Password Tidak Sama.',
			'min_length' => 'Password Minimal 8 Karakter.'
			 ));
		$this->form_validation->set_rules('password2', 'Password', 'trim|required|matches[password1]');
		if ($this->form_validation->run() == false) {
			$this->load->view('frontend/resetpassword');
		}else{
			$email = $this->session->userdata('resetemail');
			$update = array('password_pelanggan' => password_hash($this->input->post('password1'),PASSWORD_DEFAULT) );
			$where = array('email_pelanggan' => $email );
			$this->db->update('tbl_pelanggan', $update,$where);
			$this->session->unset_userdata('resetemail');
			$this->db->delete('tbl_token_pelanggan',['email_token' => $email]);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
					Berhasil Reset, Login Kembali Akun Anda
					</div>');
			redirect('login');
		}
	}
}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */