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
		<!--
		CSS
		============================================= -->
		<?php $this->load->view('frontend/include/base_css'); ?>
	</head>
	<body class="">
		<!-- navbar -->
		<?php $this->load->view('frontend/include/base_nav'); ?>
		<section class="generic-banner">
			<div class="container">
				<div class="row height align-items-center justify-content-center">
					<div class="col-lg-5">
						<div class="card card-login mx-auto mt-10">
							<div class="card-header">Lupa Password</div>
							<div class="card-body" align="left">
								<?php echo $this->session->flashdata('pesan'); ?>
								 <form action="<?php echo base_url('login/lupapassword') ?>" method="post" >
				                    <div class="form-group">
				                      <input type="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" name="email" placeholder="Enter Email Address...">
				                    </div>
				                    <?php echo form_error('email'),'<small class="text-danger pl-3">','</small>'; ?>
				                    <button class="btn btn-primary btn-user btn-block">
				                      Reset Password
				                    </button>
				                  </form>
								<div class="text-center">
									<p><a class="d-block small mt-3" href="<?php echo base_url() ?>login/daftar">Daftar</a>
									<a class="d-block small" href="<?php echo base_url() ?>login">Login</a>
									</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- start footer Area -->
		<?php $this->load->view('frontend/include/base_footer'); ?>
		<!-- js -->
		<?php $this->load->view('frontend/include/base_js'); ?>
	</body>
</html>