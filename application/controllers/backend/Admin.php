<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	function __construct(){
	parent::__construct();
		$this->load->helper('tglindo_helper');
		$this->load->model('getkod_model');
		$this->load->library('form_validation');
		$this->getsecurity();
		date_default_timezone_set("Asia/Jakarta");
	}
	function getsecurity($value=''){
		$username = $this->session->userdata('level');
		if ($username == '2') {
			$this->session->sess_destroy();
			redirect('backend/login');
		}
	}
	public function index(){
		$data['title'] = "List Admin";
		$data['admin'] = $this->db->query("SELECT * FROM tbl_admin")->result_array();
		// die(print_r($data));
		$this->load->view('backend/admin', $data);
	}
	public function daftar(){
		$this->form_validation->set_rules('name', 'Name', 'trim|required');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|is_unique[tbl_admin.username_admin]',array(
			'required' => 'Email Wajib Di isi.',
			'is_unique' => 'Username Sudah Di Gunakan'
			 ));
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email',array(
			'required' => 'Email Wajib Di isi.',
			 ));
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|matches[password2]',array(
			'matches' => 'Password Tidak Sama.',
			'min_length' => 'Password Minimal 8 Karakter.'
			 ));
		$this->form_validation->set_rules('password2', 'Password2', 'trim|required|matches[password]');
		if ($this->form_validation->run() == false) {
			$data['title'] = "Tambah Admin";
			$this->load->view('backend/daftar',$data);
		} else {
			// die(print_r($_POST));
			$kode = $this->getkod_model->get_kodadm();
			$data = array(
				'kd_admin' => $kode,
				'nama_admin' => $this->input->post('name'),
				'email_admin'		 => $this->input->post('email'),
				'img_admin'		=> 'assets/backend/img/default.png',
				'username_admin' => strtolower($this->input->post('username')),
				'password_admin' => password_hash($this->input->post('password'),PASSWORD_DEFAULT),
				'level_admin'	=> 2,
				'status_admin' => 1,
				'date_create_admin' => time()
				 );
			$this->db->insert('tbl_admin', $data);
			$this->session->set_flashdata('message', 'swal("Berhasil", "Berhasil Tambah Akun", "success");');
    		redirect('backend/admin');
		}

	}
}

/* End of file Admin.php */
/* Location: ./application/controllers/backend/Admin.php */