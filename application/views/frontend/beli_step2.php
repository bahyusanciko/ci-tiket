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
		<title>BUS XTRANS</title>
		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
		<!--CSS-->
		<?php $this->load->view('frontend/include/base_css'); ?>
	</head>
	<body>
		<!-- navbar -->
		<?php $this->load->view('frontend/include/base_nav'); ?>
		<section class="service-area section-gap relative">
			<div class="overlay overlay-bg"></div>
			<div class="container">
				<div class="row">
					<div class="col-lg-4">
						<!-- Default Card Example -->
						<form action="<?php echo base_url() ?>tiket/gettiket/" method="post">
						<input type="hidden" name="tgl" value="<?php echo $tglberangkat ?>">

							<?php $i = 1; foreach ($kursi as $row ) { ?>
							<div class="card mb-5">
								<div class="card-header">
									<i class="fa fa-id-card-o"></i> Kursi Nomor <?php echo $row; ?>
								</div>
								<div class="card-body">
									<div class="form-group">
										<input type="text" id="" class="form-control" id="" name="nama[]" placeholder="Kursi nomor <?php echo $row ?> Atas Nama" required>
										<input type="hidden" name="kursi[]" value="<?php echo $row ?>">
									</div>
									<div class="form-group">
										<select name="tahun[]" class="form-control js-example-basic-single" required>
											<option value="" selected disabled="">Umur Penumpang</option>
											<?php
											$thn_skr = 90;
											for ($x = $thn_skr; $x >= 1; $x--) {
											?>
											<option value="<?php echo $x ?>"><?php echo $x ?> Tahun</option>
											<?php
											}
											?>
										</select>
									</div>
								</div>
							</div>
							<?php } ?>
						</div>
						<div class="col-lg-5">
							<!-- Default Card Example -->
							<!-- Default Card Example -->
							<div class="card mb-5">
								<div class="card-header">
									<i class="fa fa-user"></i> Identitas Pemesan
								</div>
								<div class="card-body">
									<div class='form-group'>
										<div class='col-sm-12'>
											<input name='no_ktp' required="" maxlength='64' class='form-control required' placeholder='Nomor KTP' type='text' title='Nomor ktp harus diisi.' value="<?php echo $this->session->userdata('ktp') ?>"></div>
										</div>
										<div class='form-group'>
											<div class='col-sm-12'>
												<input name='nama_pemesan' required="" maxlength='64' class='form-control required' placeholder='Nama Pemesan' type='text' title='Nama Pemesan harus diisi.' value="<?php echo $this->session->userdata('nama_lengkap') ?>"></div>
											</div>
											<div class='form-group'>
												<div class='col-sm-12'>
													<input name='hp' required="" maxlength='16' class='form-control required' placeholder='Handphone' type='text' title='Handphone harus diisi.' value="<?php echo $this->session->userdata('telpon') ?>"></div>
												</div>
												<div class='form-group'>
													<div class='col-sm-12'>
													<textarea name='alamat' cols='20' rows='3' id='alamat' required="" maxlength='256' class='form-control required' placeholder='Alamat' title='Alamat harus diisi.' ><?php echo $this->session->userdata('alamat')?></textarea></div>
												</div>
												<div class='form-group'>
													<div class='col-sm-12'>
														<input name='email' required="" maxlength='64' class='form-control' placeholder='Email' type='text' value="<?php echo $this->session->userdata('email')?>"></div>
													</div>
												</div>
											</div>
										</div>
										<div class="col">
											<div class="card">
												<div class="card-header">
													<i class="fa fa-usd"></i> Metode Pembayaran
												</div>
												<div class="card-body">
													<form action="<?php echo base_url() ?>tiket/cektiketmu" method="post">
														<div class="form-group">
															<label for="exampleInputEmail1">Pilih Bank </label>
															<select class="form-control" name="bank" required>
																<option value="" selected disabled="">Pilih Bank</option>
																<?php foreach ($bank as $row) { ?>
																<option value="<?php echo $row['kd_bank'] ?>"><?php echo $row['nama_bank']; ?></option>
																<?php } ?>
															</select>
														</div>
														<hr>
														<div class='form-group'>
														<a href='javascript:history.back()' class='btn btn-default pull-left'>Kembali</a>
														<button class="btn btn-primary pull-right">Proses Tiket</button>
													</div>
												</form>
													</div>

											</div>
										</div>
									</div>
								</section>
								<!-- End banner Area -->
								<!-- End Generic Start -->
								<!-- start footer Area -->
								<?php $this->load->view('frontend/include/base_footer'); ?>
								<!-- js -->
								<?php $this->load->view('frontend/include/base_js'); ?>
								<script type="text/javascript">
									$(document).ready(function() {
									$('.js-example-basic-single').select2();
									});
								</script>
							</body>
						</html>