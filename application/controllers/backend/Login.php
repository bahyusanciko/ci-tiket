<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('getkod_model');
		date_default_timezone_set("Asia/Jakarta");
	}
	function getsecurity($value=''){
		$username = $this->session->userdata('username');
		if ($username) {
			redirect('backend/home');
			$this->session->sess_destroy();
			redirect('backend/login');
		}else{
			redirect('backend/login');
		}
	}
	function getUserIP()
    {
        $client  = @$_SERVER['HTTP_CLIENT_IP'];
        $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
        $remote  = $_SERVER['REMOTE_ADDR'];

        if(filter_var($client, FILTER_VALIDATE_IP))
        {
            $ip = $client;
        }
        elseif(filter_var($forward, FILTER_VALIDATE_IP))
        {
            $ip = $forward;
        }
        else
        {
            $ip = $remote;
        }

        return $ip;
        
    }
	public function index(){
		// $this->getsecurity();
		$data['ipaddres'] = $this->getUserIP();
		// die(print_r($data));
		$this->load->view('backend/login',$data);
	}
	public function logout(){
		$this->session->sess_destroy();
		redirect(base_url('backend/login'));
	}
	public function cekuser(){
    $username = strtolower($this->input->post('username'));
    $ambil = $this->db->query('select * from tbl_admin where username_admin = "'.$username.'"')->row_array();
    $password = $this->input->post('password');

    if (password_verify($password,$ambil['password_admin'])) {
    	$this->db->where('username_admin',$username);
        $query = $this->db->get('tbl_admin');
            foreach ($query->result() as $row) {
                $sess = array(
                	'kd_admin' => $row->kd_admin,
                    'username_admin' => $row->username_admin,
                    'password_admin' => $row->password_admin,
                    'nama_admin'     => $row->nama_admin,
                    'img_admin'	=> $row->img_admin,
                    'email_admin'   => $row->email_admin,
                    'telpon_admin'   => $row->telpon_admin,
                    'alamat_admin'	=> $row->alamat_admin,
                    'level'	=> $row->level_admin
                );
                // die(print_r($sess));
                $this->session->set_userdata($sess);
                redirect('backend/home');
            }
    }else{
    	$this->session->set_flashdata('message', 'swal("Gagal", "Email/Password Salah", "error");');
    	redirect('backend/login');
    	}
	}

}

/* End of file Login.php */
/* Location: ./application/controllers/backend/Login.php */