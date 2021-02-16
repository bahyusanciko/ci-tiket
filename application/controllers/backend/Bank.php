<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bank extends CI_Controller {
	function __construct(){
	parent::__construct();
		$this->load->helper('tglindo_helper');
		$this->load->model('getkod_model');
		$this->getsecurity();
		date_default_timezone_set("Asia/Jakarta");
	}
	function getsecurity($value=''){
		$username = $this->session->userdata('username_admin');
		if (empty($username)) {
			$this->session->sess_destroy();
			redirect('backend/login');
		}
	}
	public function index(){
	$data['title'] = "Link BANK";
 	$data['bank'] = $this->db->query("SELECT * FROM tbl_bank ")->result_array();
		// die(print_r($data));
	$this->load->view('backend/bank', $data);	
	}
	public function viewbank($id=""){
	$data['title'] = "Link BANK";
 	$data['bank'] = $this->db->query("SELECT * FROM tbl_bank WHERE kd_bank = '".$id."'")->row_array();
		// die(print_r($data));
	$this->load->view('backend/view_bank', $data);	
	}

}

/* End of file Bank.php */
/* Location: ./application/controllers/backend/Bank.php */