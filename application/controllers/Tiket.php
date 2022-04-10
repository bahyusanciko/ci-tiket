<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tiket extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->helper('tglindo_helper');
		$this->load->model('getkod_model');
		date_default_timezone_set("Asia/Jakarta");
	}
	function getsecurity($value=''){
		$username = $this->session->userdata('username');
		if (empty($username)) {
			redirect('login');
		}
	}
	public function index(){
		$this->session->unset_userdata(array('jadwal','asal','tanggal'));
		$data['title'] = "Cek Jadwal";
		$data['asal'] = $this->db->query("SELECT * FROM `tbl_tujuan` ORDER BY kota_tujuan ASC ")->result_array();
		$data['tujuan'] = $this->db->query("SELECT * FROM `tbl_tujuan` group by kota_tujuan ORDER BY kota_tujuan ASC ")->result_array();
		$data['list'] = $this->db->query("SELECT * FROM `tbl_tujuan` ORDER BY kota_tujuan ASC ")->result_array();
		$this->load->view('frontend/cektanggal',$data);
	}
	public function cektiket($value=''){
		$this->load->view('frontend/cektiket');
	}
	public function cekjadwal($tgl='' , $asl='', $tjn=''){
		$this->session->unset_userdata(array('jadwal','asal','tanggal'));
		$data['title'] = 'Cari TIket';
		$data['tanggal'] = $this->input->get('tanggal').$tgl;
		$asal = $this->input->get('asal').$asl;
		$tujuan = $this->input->get('tujuan').$tjn;
		$data['asal'] = $this->db->query("SELECT * FROM tbl_tujuan
               WHERE kd_tujuan ='$asal'")->row_array();
		$getTime = date('H:i:s');
		$data['jadwal'] = $this->db->query("SELECT * FROM tbl_jadwal LEFT JOIN tbl_bus on tbl_jadwal.kd_bus = tbl_bus.kd_bus LEFT JOIN tbl_tujuan on tbl_jadwal.kd_tujuan = tbl_tujuan.kd_tujuan WHERE tbl_jadwal.wilayah_jadwal ='$tujuan' AND tbl_jadwal.kd_asal = '$asal' AND jam_berangkat_jadwal > '$getTime'")->result_array();
		if (!empty($data['jadwal'])) {
			if ($tujuan == $data['asal']['kota_tujuan']) {
				$this->session->set_flashdata('message', 'swal("Cek", "Tujuan dan Asal tidak boleh sama", "error");');
    			redirect('tiket');
			}
		}else{
			if ($data['tanggal'] > date('Y-m-d')) {
				$data['jadwal'] = $this->db->query("SELECT * FROM tbl_jadwal LEFT JOIN tbl_bus on tbl_jadwal.kd_bus = tbl_bus.kd_bus LEFT JOIN tbl_tujuan on tbl_jadwal.kd_tujuan = tbl_tujuan.kd_tujuan WHERE tbl_jadwal.wilayah_jadwal ='$tujuan' AND tbl_jadwal.kd_asal = '$asal'")->result_array();
			}else{
				$this->session->set_flashdata('message', 'swal("Kosong", "Jadwal Tidak Ada", "error");');
				redirect('tiket');
			}
		}
		for ($i=0; $i < count($data['jadwal']); $i++) { 
			$data['kursi'][$i] = $this->db->query("SELECT count(no_kursi_order) FROM tbl_order WHERE kd_jadwal = '".$data['jadwal'][$i]['kd_jadwal']."' AND tgl_berangkat_order = '".$data['tanggal']."' AND asal_order = '".$asal."'")->result_array();
		};
		$this->load->view('frontend/cekjadwal',$data);

	}
	public function beforebeli($jadwal="",$asal='',$tanggal=''){
		$array = array(
			'jadwal' => $jadwal,
			'asal'	=> $asal,
			'tanggal'	=> $tanggal
		);
		$this->session->set_userdata($array);
		if ($this->session->userdata('username')){
			$id = $jadwal;
			$asal = $asal;
			$data['tanggal'] = $tanggal;
			$data['asal'] =  $this->db->query("SELECT * FROM tbl_tujuan
               WHERE kd_tujuan ='".$asal."'")->row_array();
			$data['jadwal'] = $this->db->query("SELECT * FROM tbl_jadwal LEFT JOIN tbl_bus on tbl_jadwal.kd_bus = tbl_bus.kd_bus LEFT JOIN tbl_tujuan on tbl_jadwal.kd_tujuan = tbl_tujuan.kd_tujuan WHERE kd_jadwal ='".$id."'")->row_array();
			$data['kursi'] = $this->db->query("SELECT no_kursi_order FROM tbl_order WHERE kd_jadwal = '".$data['jadwal']['kd_jadwal']."' AND tgl_berangkat_order = '".$data['tanggal']."' AND asal_order = '".$asal."'")->result_array();
			$this->load->view('frontend/beli_step1',$data);
		}else{ 
			redirect('login/autlogin');
		}
	}
	public function afterbeli(){
		$data['kursi'] = $this->input->get('kursi');
		$data['bank'] = $this->db->query("SELECT * FROM `tbl_bank` ")->result_array();
		$data['kd_jadwal'] = $this->session->userdata('jadwal');
		$data['asal'] = $this->session->userdata('asal');
		$data['tglberangkat'] = $this->input->get('tgl');
		if ($data['kursi']) {
			$this->load->view('frontend/beli_step2', $data);
		}else{
			$this->session->set_flashdata('message', 'swal("Kosong", "Pilih Kursi Anda", "error");');
			redirect('tiket/beforebeli/'.$data['asal'].'/'.$data['kd_jadwal']);
		}
	}
	public function gettiket($value=''){
	    include 'assets/phpqrcode/qrlib.php';
	    $asal =  $this->db->query("SELECT * FROM tbl_tujuan
               WHERE kd_tujuan ='".$this->session->userdata('asal')."'")->row_array();		
		$getkode =  $this->getkod_model->get_kodtmporder();
		$kd_jadwal = $this->session->userdata('jadwal');
		$kd_pelanggan = $this->session->userdata('kd_pelanggan');
		$tglberangkat = $this->input->post('tgl');
		$jambeli = date("Y-m-d H:i:s");
		$nama =  $this->input->post('nama');
		$kursi = $this->input->post('kursi');
		$tahun = $this->input->post('tahun');
		$no_ktp = $this->input->post('no_ktp');
		$nama_pemesan = $this->input->post('nama_pemesan');
		$hp = $this->input->post('hp');
		$alamat = $this->input->post('alamat');
		$email = $this->input->post('email');
		$bank = $this->input->post('bank');
		$satu_hari        = mktime(0,0,0,date("n"),date("j")+1,date("Y"));
		$expired       = date("d-m-Y", $satu_hari)." ".date('H:i:s');
		$status 		= '1';
		QRcode::png($getkode,'assets/frontend/upload/qrcode/'.$getkode.".png","Q", 8, 8);
		$count = count($kursi);
		$tanggal = hari_indo(date('N',strtotime($jambeli))).', '.tanggal_indo(date('Y-m-d',strtotime(''.$jambeli.''))).', '.date('H:i',strtotime($jambeli));
		for($i=0; $i<$count; $i++) {
			$simpan = array(
				'kd_order' => $getkode,
				'kd_tiket' => 'T'.$getkode.$kd_jadwal.str_replace('-','',$tglberangkat).$kursi[$i],
				'kd_jadwal'	=> $kd_jadwal,
				'kd_pelanggan' => $kd_pelanggan,
				'asal_order' => $asal['kd_tujuan'],
				'nama_order'	=> $nama_pemesan,
				'tgl_beli_order'	=> $tanggal,
				'tgl_berangkat_order' => $tglberangkat,
				'no_kursi_order'		=> $kursi[$i],
				'nama_kursi_order' => $nama[$i],
				'umur_kursi_order' => $tahun[$i],
				'no_ktp_order'	=> $no_ktp,
				'no_tlpn_order'	=> $hp,
				'alamat_order'	=> $alamat,
				'email_order'		=> $email,
				'kd_bank' => $bank,
				'expired_order'	=> $expired,
				'qrcode_order'	=> 'assets/frontend/upload/qrcode/'.$getkode.'.png',
				'status_order'	=> $status
			);
			$this->db->insert('tbl_order', $simpan);
		}
		redirect('tiket/checkout/'.$getkode);
	}
	public function cekorder($id=''){
		$id = $this->input->post('kodetiket');
		$sqlcek = $this->db->query("SELECT * FROM tbl_order LEFT JOIN tbl_jadwal on tbl_order.kd_jadwal = tbl_jadwal.kd_jadwal LEFT JOIN tbl_bus on tbl_jadwal.kd_bus = tbl_bus.kd_bus LEFT JOIN tbl_bank on tbl_order.kd_bank = tbl_bank.kd_bank WHERE kd_order ='$id'")->result_array();
		if ($sqlcek) {
			$data['tiket'] = $sqlcek;
			$data['count'] = count($sqlcek);
			$this->load->view('frontend/payment',$data);
		}else{
			$this->session->set_flashdata('message', 'swal("Kosong", "Tiket Order Tidak Ada", "error");');
    		redirect('tiket/cektiket');
		}
	}
	public function payment($id=''){
		$this->getsecurity();
		$sqlcek = $this->db->query("SELECT * FROM tbl_order LEFT JOIN tbl_jadwal on tbl_order.kd_jadwal = tbl_jadwal.kd_jadwal LEFT JOIN tbl_bus on tbl_jadwal.kd_bus = tbl_bus.kd_bus LEFT JOIN tbl_bank on tbl_order.kd_bank = tbl_bank.kd_bank WHERE kd_order ='$id'")->result_array();
		$data['count'] = count($sqlcek);
		$data['tiket'] = $sqlcek;
		$this->load->view('frontend/payment',$data);
	}
	public function checkout($value=''){
		$this->getsecurity();
		$data['tiket'] = $value;
		$send['sendmail'] = $this->db->query("SELECT * FROM tbl_order LEFT JOIN tbl_jadwal on tbl_order.kd_jadwal = tbl_jadwal.kd_jadwal LEFT JOIN tbl_tujuan on tbl_jadwal.kd_tujuan = tbl_tujuan.kd_tujuan LEFT JOIN tbl_bank on tbl_order.kd_bank = tbl_bank.kd_bank WHERE kd_order ='$value'")->row_array();
		$send['count'] = count($send['sendmail']);
		//email
		$subject = 'XTRANS';
		$message = $this->load->view('frontend/sendmail',$send, TRUE);
		$to 	 = $this->session->userdata('email');
        $config = [
			'mailtype'  => 'html',
			'charset'   => 'utf-8',
			'protocol'  => getenv('MAIL_DRIVER'),
			'smtp_host' => getenv('MAIL_HOST'),
			'smtp_user' => getenv('MAIL_USERNAME'), // Ganti dengan email gmail kamu
			'smtp_pass' => getenv('MAIL_PASSWORD'),    // Password gmail kamu
			'smtp_port' => getenv('MAIL_PORT'),
			'crlf'      => "rn",
			'newline'   => "rn"
		];
        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
        $this->email->from('XTRANS');
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($message);
        if ($this->email->send()) {
			$this->session->set_flashdata('message', 'swal("Cek", "Email kamu untuk melakukan pembayaran", "success");');
            $this->load->view('frontend/checkout', $data);
        } else {
           echo 'Error! Kirim email error';
        }
	}
	public function caritiket(){
		$id = $this->input->post('kodetiket');
		$sqlcek = $this->db->query("SELECT * FROM tbl_order LEFT JOIN tbl_bus on tbl_order.kd_bus = tbl_bus.kd_bus LEFT JOIN tbl_jadwal on tbl_order.kd_jadwal = tbl_jadwal.kd_jadwal WHERE kd_order ='".$id."'")->result_array();
		if ($sqlcek == NULL) {
			$this->session->set_flashdata('message', 'swal("Kosong", "Tidak Ada Tiket", "error");');
    		redirect('tiket/cektiket');
		}else{
			$data['tiket'] = $sqlcek;
			$this->load->view('frontend/payment', $data);
		}
	}
	public function konfirmasi($value='',$harga=''){
		$this->getsecurity();
		$data['id'] = $value;
		$data['total'] = $harga;
		$this->load->view('frontend/konfirmasi', $data);
	}
	public function insertkonfirmasi($value=''){
		$this->getsecurity();
		$config['upload_path'] = './assets/frontend/upload/payment';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload('userfile')){
			$error = array('error' => $this->upload->display_errors());
			$this->session->set_flashdata('message', 'swal("Gagal", "Cek Kembali Konfirmasi Anda", "error");');
			redirect('tiket/konfirmasi/'.$this->input->post('kd_order').'/'.$this->input->post('total'));
		}
		else{
			$upload_data = $this->upload->data();
			$featured_image = '/assets/frontend/upload/payment/'.$upload_data['file_name'];
			$data = array(
						'kd_konfirmasi' => $this->getkod_model->get_kodkon(),
						'kd_order'	=> $this->input->post('kd_order'),
						'nama_bank_konfirmasi'		=> $this->input->post('bank_km'),
						'nama_konfirmasi' =>  $this->input->post('nama'),
						'norek_konfirmasi'		=> $this->input->post('nomrek'),
						'total_konfirmasi' => $this->input->post('total'),
						'photo_konfirmasi' => $featured_image
					);
			$this->db->insert('tbl_konfirmasi', $data);
			$this->session->set_flashdata('message', 'swal("Berhasil", "Terima Kasih Atas Konfirmasinya", "success");');
			redirect('profile/tiketsaya/'.$this->session->userdata('kd_pelanggan'));
		}
	}
	public function cetak($id=''){
		$this->getsecurity();
		$order = $id;
		$data['cetak'] = $this->db->query("SELECT * FROM tbl_order LEFT JOIN tbl_bus on tbl_order.kd_bus = tbl_bus.kd_bus LEFT JOIN tbl_jadwal on tbl_order.kd_jadwal = tbl_jadwal.kd_jadwal LEFT JOIN tbl_tujuan on tbl_jadwal.kd_tujuan = tbl_tujuan.kd_tujuan WHERE kd_order ='".$id."'")->result_array();
		$tiket = $this->db->query("SELECT email_pelanggan FROM tbl_pelanggan WHERE kd_pelanggan ='".$data['cetak'][0]['kd_pelanggan']."'")->row_array();
		die(print_r($tiket));
	}

}

/* End of file Tiket.php */
/* Location: ./application/controllers/Tiket.php */
