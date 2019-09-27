<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {
	function __construct(){
	parent::__construct();
		$this->load->helper('tglindo_helper');
		$this->load->model('getkod_model');
		$this->getsecurity();
		date_default_timezone_set("Asia/Jakarta");
	}
	function getsecurity($value=''){
		if (empty($this->session->userdata('username_admin'))) {
			$this->session->sess_destroy();
			redirect('backend/login');
		}
	}
	public function index(){
		$data['title'] = "List Order";
 		$data['order'] = $this->db->query("SELECT * FROM tbl_order group by kd_order")->result_array();
		// die(print_r($data));
		$this->load->view('backend/order', $data);
	}
	public function vieworder($id=''){
		// die(print_r($_GET));
		$cek = $this->input->get('order').$id;
	 	$sqlcek = $this->db->query("SELECT * FROM tbl_order LEFT JOIN tbl_jadwal on tbl_order.kd_jadwal = tbl_jadwal.kd_jadwal WHERE kd_order ='".$cek."'")->result_array();
	 	if ($sqlcek) {
	 		$data['tiket'] = $sqlcek;
			$data['title'] = "View Order";
			// die(print_r($sqlcek));
			$this->load->view('backend/view_order',$data);
	 	}else{
	 		$this->session->set_flashdata('message', 'swal("Kosong", "Order Tidak Ada", "error");');
    		redirect('backend/tiket');
	 	}
	}
	public function inserttiket($value=''){
		// die(print_r($_POST));
		$id = $this->input->post('kd_order');
		$asal = $this->input->post('asal_beli');
		$tiket = $this->input->post('kd_tiket');
		$nama = $this->input->post('nama');
		$kursi = $this->input->post('no_kursi');
		$umur = $this->input->post('umur_kursi');
		$harga = $this->input->post('harga');
		$tgl = $this->input->post('tgl_beli');
		$status = $this->input->post('status');
		$where = array('kd_order' => $id );
		$update = array('status_order' => $status );
		$this->db->update('tbl_order', $update,$where);
		$data['asal'] = $this->db->query("SELECT * FROM tbl_tujuan WHERE kd_tujuan ='".$asal."'")->row_array();
		$data['cetak'] = $this->db->query("SELECT * FROM tbl_order LEFT JOIN tbl_jadwal on tbl_order.kd_jadwal = tbl_jadwal.kd_jadwal LEFT JOIN tbl_tujuan on tbl_jadwal.kd_tujuan = tbl_tujuan.kd_tujuan WHERE kd_order ='".$id."'")->result_array();
		$pelanggan = $this->db->query("SELECT email_pelanggan FROM tbl_pelanggan WHERE kd_pelanggan ='".$data['cetak'][0]['kd_pelanggan']."'")->row_array();
		$pdfFilePath = "assets/backend/upload/etiket/".$id.".pdf";
		$html = $this->load->view('frontend/cetaktiket', $data, TRUE);
		$this->load->library('m_pdf');
		$this->m_pdf->pdf->WriteHTML($html);
		$this->m_pdf->pdf->Output($pdfFilePath);
		for ($i=0; $i < count($nama) ; $i++) { 
			$simpan = array(
				'kd_tiket' => $tiket[$i],
				'kd_order' => $id,
				'nama_tiket' => $nama[$i],
				'kursi_tiket' => $kursi[$i],
				'umur_tiket' => $umur[$i],
				'asal_beli_tiket' => $asal,
				'harga_tiket' => $harga,
				'status_tiket' => $status,
				'etiket_tiket' => $pdfFilePath,
				'create_tgl_tiket' => date('Y-m-d'),
				'create_admin_tiket' => $this->session->userdata('username_admin')
			);
		// die(print_r($simpan));
		$this->db->insert('tbl_tiket', $simpan);
		}
		$this->session->set_flashdata('message', 'swal("Berhasil", "Tiket Order Berhasil Di Proses", "success");');
		redirect('backend/order');

		
	}
	public function kirimemail($id=''){
		$data['cetak'] = $this->db->query("SELECT * FROM tbl_order LEFT JOIN tbl_jadwal on tbl_order.kd_jadwal = tbl_jadwal.kd_jadwal LEFT JOIN tbl_tujuan on tbl_jadwal.kd_tujuan = tbl_tujuan.kd_tujuan WHERE kd_order ='".$id."'")->result_array();
		$data['asal'] = $this->db->query("SELECT * FROM tbl_tujuan WHERE kd_tujuan ='".$data['cetak']['asal_order']."'")->row_array();
		$pelanggan = $this->db->query("SELECT email_pelanggan FROM tbl_pelanggan WHERE kd_pelanggan ='".$data['cetak'][0]['kd_pelanggan']."'")->row_array();
		//email
		$subject = 'E-ticket - Order ID '.$id.' - '.date('dmY');
		$message = $this->load->view('frontend/cetaktiket', $data, TRUE);
		$attach  = base_url("assets/backend/upload/etiket/".$id.".pdf");
		$to 	= $pelanggan['email_pelanggan'];
		$config = array(
			   'mailtype'  => 'html',
               'charset'   => 'utf-8',
               'protocol'  => 'smtp',
               'smtp_host' => 'ssl://smtp.gmail.com',
               'smtp_user' => 'sancikob@gmail.com',    // Ganti dengan email gmail kamu
               'smtp_pass' => 'tiketbusci3',      // Password gmail kamu
               'smtp_port' => 465,
               'crlf'      => "rn",
               'newline'   => "rn"
					 );
        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
        $this->email->from('XTRANS');
        $this->email->to($to);
        $this->email->attach($attach);
        $this->email->subject($subject);
        $this->email->message($message);
         // Tampilkan pesan sukses atau error
        if ($this->email->send()) {
        	$this->session->set_flashdata('message', 'swal("Berhasil", "E Tiket terkirim", "success");');
			redirect('backend/order/vieworder/'.$id);
        } else {
            $this->session->set_flashdata('message', 'swal("Gagal", "E Tiket Gagal Di kirim Hubungi Team IT", "error");');
			redirect('backend/order/vieworder/'.$id);
        }

	}

}

/* End of file Order.php */
/* Location: ./application/controllers/backend/Order.php */