<!DOCTYPE html>
<html lang="zxx" class="no-js">
	<head>
		<!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Favicon-->
		<link rel="shortcut icon" href="img/elements/fav.png">
		<!-- Author Meta -->
		<meta name="author" content="colorlib">
		<!-- Meta Description -->
		<meta name="description" content="">
		<!-- Meta Keyword -->
		<meta name="keywords" content="">
		<!-- meta character set -->
		<meta charset="UTF-8">
		<!-- Site Title -->
		<title>Dapat Tiket</title>
		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
		<!--CSS-->
		<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/frontend/datepicker/dcalendar.picker.css">
		<?php $this->load->view('frontend/include/base_css'); ?>
	</head>
	<body>
		<!-- navbar -->
		<?php $this->load->view('frontend/include/base_nav'); ?>
		<section class="service-area section-gap relative">
			<div class="overlay overlay-bg"></div>
			<div class="container">
				<div class="row d-flex justify-content-center">
					<div class="col-lg-4">
						<!-- Default Card Example -->
						<div class="card wobble animated">
					  <div class="card-header">
					    Konfirmasi Pembayaran
					  </div>
					  <div class="card-body">
					    <form action="<?php echo base_url() ?>tiket/insertkonfirmasi" method="post" enctype="multipart/form-data">
									<div class="form-group">
										<label for="exampleInputEmail1">Kode Order</label>
										<input type="text" id="" class="form-control" id="" name="kd_order" value="<?php echo $id ?>" placeholder="Kode Tiket">
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">BANK Kamu</label>
										<select class="form-control" name="bank_km">
											<option value="" selected disabled="">Pilih Bank</option>
											<option value="BCA" >BCA</option>
											<option value="Mandiri">Mandiri</option>
											<option value="BNI">BNI</option>
											<option value="BRI">BRI</option>
										</select>
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Nomor Rekening</label>
										<input type="number" class="form-control" name="nomrek" value="" placeholder="Nomor Rekening">
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Nama Pengirim</label>
										<input type="text" class="form-control" name="nama" value="" placeholder="Nama Pengirim">
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Jumlah Pembayaran</label>
										<input type="number" class="form-control" name="total" value="<?php echo $total ?>" placeholder="Total Harga" readonly>
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Upload Poto Transaksi</label>
										<input type="file" class="form-control" name="userfile" required="">
									</div>
									<button type="submit" class="btn btn-primary pull-right">Konfirmasi </button>
								</form>
					  </div>
					</div>
					</div>
			</section>
			<!-- End banner Area -->
			<!-- start footer Area -->
			<?php $this->load->view('frontend/include/base_footer'); ?>
			<!-- js -->
			<?php $this->load->view('frontend/include/base_js'); ?>
		</body>
	</html>