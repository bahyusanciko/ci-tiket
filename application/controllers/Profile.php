<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
	public function __construct(){
		parent::__construct();
		date_default_timezone_set("Asia/Jakarta");
	}
	public function index(){
		$this->load->view('frontend/profile');
	}
	public function profilesaya($id=''){
		$data['profile'] = $this->db->query("SELECT * FROM tbl_pelanggan WHERE kd_pelanggan LIKE '".$id."'")->row_array();
		// die(print_r($data));
		$this->load->view('frontend/profile',$data);
	}
	public function editprofile($id=''){
		$id = $this->input->post('kode');
		$where = array('kd_pelanggan' => $id );
		$update = array(
			'no_ktp_pelanggan'			=> $this->input->post('ktp'),
			'nama_pelanggan'  => $this->input->post('nama'),
			'email_pelanggan'	    	=> $this->input->post('email'),
			'img_pelanggan'		=> 'assets/frontend/img/default.png',
			'alamat_pelanggan'		=> $this->input->post('alamat'),
			'telpon_pelanggan'		=> $this->input->post('hp'),
			 );
		$this->db->update('tbl_pelanggan', $update,$where);
		$this->session->set_flashdata('message', 'swal("Berhasil", "Data Di Edit", "success");');
		redirect('profile/profilesaya/'.$id);
	}
	public function tiketsaya($id=''){
		$this->getsecurity();
		$data['tiket'] = $this->db->query("SELECT * FROM tbl_order WHERE kd_pelanggan ='".$id."' group by kd_order")->result_array();
		// die(print_r($data));
		$this->load->view('frontend/tiketmu',$data);
	}
	public function changepassword($id=''){
		$this->load->library('form_validation');
		$pelanggan = $this->db->query("SELECT password_pelanggan FROM tbl_pelanggan where kd_pelanggan ='".$id."'")->row_array();
		// die(print_r($pelanggan));
		$this->form_validation->set_rules('currentpassword', 'currentpassword', 'trim|required|min_length[8]',array(
			'required' => 'Masukan Password',
			 ));
		$this->form_validation->set_rules('new_password1', 'new_password1', 'trim|required|min_length[8]|matches[new_password2]',array(
			'required' => 'Masukan Password.',
			'matches' => 'Password Tidak Sama.',
			'min_length' => 'Password Minimal 8 Karakter.'
			 ));
		$this->form_validation->set_rules('new_password2', 'new_password2', 'trim|required|min_length[8]|matches[new_password1]',array(
			'required' => 'Masukan Password.',
			'matches' => 'Password Tidak Sama.',
			'min_length' => 'Password Minimal 8 Karakter.'
			 ));
		if ($this->form_validation->run() == false) {
			$this->load->view('frontend/changepassword');
		} else {
			$currentpassword = $this->input->post('currentpassword');
			$newpassword 	 = $this->input->post('new_password1');
			if (!password_verify($currentpassword, $pelanggan['password_pelanggan'])) {
				$this->session->set_flashdata('gagal', '<div class="alert alert-danger" role="alert">
					  Password Sebelumnya Salah
					</div>');
				redirect('profile/changepassword');
			}elseif ($currentpassword == $newpassword) {
				$this->session->set_flashdata('gagal', '<div class="alert alert-danger" role="alert">
					  Password Tidak Boleh Sama Sebelumnya
					</div>');
				redirect('profile/changepassword');
			}else{
				$password_hash = password_hash($newpassword, PASSWORD_DEFAULT);
				$where = array('kd_pelanggan' => $id );
				$update = array(
				'password_pelanggan'			=> $password_hash,
				 );
				$this->db->update('tbl_pelanggan', $update,$where);
				$this->session->set_flashdata('message', 'swal("Berhasil", "Data Di Edit", "success");');
				redirect('profile/profilesaya/'.$id);
			}
		}

	}
	function getsecurity($value=''){
		$username = $this->session->userdata('username');
		if (empty($username)) {
			$this->session->sess_destroy();
			redirect('backend/login');
		}
	}
}

/* End of file Profile.php */
/* Location: ./application/controllers/Profile.php */