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
		<title>Daftar</title>
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
					<div class="col-lg-6">
						<!-- Default Card Example -->
						<div class="card ">
							<div class="card-header">
								<i class="fa fa-address-card-o"></i> Daftar
							</div>
							<div class="card-body">
								<form action="<?php echo base_url() ?>login/daftar" method="post">
									<div class="form-group">
										<div class="form-group">
											<div class="form-label-group">
												<input type="text" name="name" class="form-control" required="" placeholder="Nama Kamu" value="<?php echo set_value('name') ?>">
												<?php echo form_error('name'),'<small class="text-danger pl-3">','</small>'; ?>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="form-row">
											<div class="col-md-6">
												<div class="form-label-group">
													<input type="text" name="email" class="form-control" required="" placeholder="Email" value="<?php echo set_value('email') ?>">
													<?php echo form_error('email'),'<small class="text-danger pl-3">','</small>'; ?>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-label-group">
													<input type="number" id="nomor" name="nomor" class="form-control" required="" placeholder="Nomor Handphone" value="<?php echo set_value('nomor') ?>">
													<?php echo form_error('nomor'),'<small class="text-danger pl-3">','</small>'; ?>
												</div>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label for="username">Alamat</label>
										<div class="form-label-group">
											<textarea class="form-control" name="alamat"><?php echo set_value('alamat') ?></textarea>
											<?php echo form_error('alamat'),'<small class="text-danger pl-3">','</small>'; ?>
										</div>
									</div>
									<div class="form-group">
										<div class="form-label-group">
											<input type="text" id="username" name="username" class="form-control" required="" placeholder="Username" >
											<?php echo form_error('username'),'<small class="text-danger pl-3">','</small>'; ?>
										</div>
									</div>
									<div class="form-group row">
										<div class="col-sm-6 mb-3 mb-sm-0">
											<input type="password" class="form-control form-control-user" name="password1" placeholder="Password">
										</div>
										<div class="col-sm-6">
											<input type="password" class="form-control form-control-user" name="password2" placeholder="Repeat Password">
										</div>
									</div>
									<?php echo form_error('password1'),'<small class="text-danger pl-3">','</small>'; ?>
									<button class="btn btn-primary btn-block">Daftar</button>
								</form>
								<div class="text-center">
									<p><a class="d-block small mt-3" href="<?php echo base_url() ?>login">Login Page</a></p>
								</div>
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