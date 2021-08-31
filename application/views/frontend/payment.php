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
		<title>Pembayaran</title>
		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
		<!--CSS-->
		<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/frontend/datepicker/dcalendar.picker.css">
		<?php $this->load->view('frontend/include/base_css'); ?>
	</head>
	<body>
		<!-- navbar -->
		<?php $this->load->view('frontend/include/base_nav'); ?>
		<section class="service-area section-gap relative">
			<div class="overlay overlay-bg"></div>
			<div class="container">
				<div class="row d-flex justify-content-center">
					<div class="col-lg-8">
						<!-- Default Card Example -->
						<div class="card mb-5">
							<div class="card-header" align="center">
								<b><i class="fa fa-ticket"></i> KODE ORDER <?= $tiket[0]['kd_order']; ?></b>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table class="table table-striped">
										<thead>
											<tr>
												<th scope="col">No Tiket</th>
												<th scope="col">No jadwal [Kode Bus]</th>
												<th scope="col">Berangkat</th>
												<th scope="col">No. Kursi</th>
												<th scope="col">Harga</th>
											</tr>
										</thead>
										<tbody>
											<?php $i = 1; foreach ($tiket as $row) { ?>
											<tr>
												<?php $now = hari_indo(date('N',strtotime($row['tgl_berangkat_order']))).', '.tanggal_indo(date('Y-m-d',strtotime(''.$row['tgl_berangkat_order'].''))).', '.date('H:i',strtotime($row['jam_berangkat_jadwal']));?>
												<th scope="row"><?= $row['kd_tiket']; ?></th>
												<td><?= $row['kd_jadwal']." [".$row['kd_bus'].']' ?></td>
												<td><?= $now?></td>
												<td><?= $row['no_kursi_order']; ?></td>
												<td>Rp <?= $row['harga_jadwal']; ?></td>
											</tr>
											<?php } ?>
											<td colspan="5"> <b class="pull-right">Total Rp <?php $total = $count * $tiket[0]['harga_jadwal'] ; echo $total ?></b></td>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-8">
						<!-- Default Card Example -->
						<div class="card">
							<div class="card-header" align="center">
								<i class="fa fa-ticket"></i> Proses Pembayaran
							</div>
							<div class="card-body" align="center">
								<h4>Segera Menyelesaikan Pembayaran Anda</h4><br>
								<p>Batas waktu pembayaran Anda akan berakhir pada</p>
								<h1><p id="expired"></p></h1>
								<p>(Sebelum <?php $expired = hari_indo(date('N',strtotime($tiket[0]['expired_order']))).', '.tanggal_indo(date('Y-m-d',strtotime(''.$tiket[0]['expired_order'].''))).', '.date('H:i',strtotime($tiket[0]['expired_order'])); echo $expired;?>)</p>
								<hr>
								<div class="medium-title col-12 mb-20">
									<h4><p>Silahkan transfer pembayaran ke nomor rekening berikut ini</p></h4>
								</div>
								<div class="offset-lg-1 col-lg-10 offset-sm-0 col-sm-12">
									<div class="row">
										<div class="col-md-3 col-4 mb-xs-10 pr-xs-0">
											<img src="<?= base_url().$tiket[0]['photo_bank'] ?>" height="50" width="100" alt="Icon Bank" />
										</div>
										<div class="col-md-6 col-8 mb-xs-10 rekening-text">
											<p ><input type="hidden" name="" id="myInput" value="<?= $tiket[0]['nomrek_bank']; ?> an <?= $tiket[0]['nama_bank'] ?>"><h4 id="myInput"><?= number_format((float)($tiket[0]['nomrek_bank']),0,"-","-"); ?> an <?= $tiket[0]['nama_bank'] ?></h4></p>
										</div>
										<div class="col-md-3 copy-link">
											<button onclick="myFunction()" class="btn">Salin No Rek</button>
										</div>
									</div>
								</div>
								<div class="col-12 medium-title regular-text mt-20">
									<h4><b> <p>Sebesar</p></b></h4>
								</div>
								<div class="col-12 bigger-title text-orange">
									<h3 ><p >Rp <?= number_format($total,0,',','.') ;?>,-</p></h3>
								</div>
								<div class="col-14 mt-15 mb-15">
									<hr>
									<div class="col-md-8 mt-sm-30">
										<h3 class="mb-20">PANDUAN PEMBAYARAN</h3>
										<div class="">
											<ol class="ordered-list" align="left">
												<li>Masukkan Kartu ATM <?= $tiket[0]['nama_bank']; ?> Anda</li>
												<li>Masukan PIN ATM Anda</li>
												<li>Pilih Menu Transaksi Lainnya</li>
												<li>Pilih menu Transfer dan Ke Rek <?= $tiket[0]['nama_bank']; ?></li>
												<li>Masukkan no rekening <?= $tiket[0]['nama_bank']; ?> yang dituju</li>
												<li>Masukkan Nominal Jumlah Uang yang akan di transfer</li>
												<li>Layar ATM akan menampilkan data transaksi anda ,</li>
												<li>Jika data sudah benar pilih “YA” (OK)</li>
												<li>Selesai (struk akan keluar dari mesin ATM)</li>
												<li>Ambil Kartu ATM anda</li>
											</ol>
										</div>
									</div>
								</div>
								<a href="<?= base_url('tiket/konfirmasi/'.$tiket[0]['kd_order'].'/'.$total) ?>" class="btn btn-primary pull-center">Konfirmasi Pembayaran </a>
							</div>
						</div>
					</div>
				</section>
				<!-- End banner Area -->
				<!-- start footer Area -->
				<?php $this->load->view('frontend/include/base_footer'); ?>
				<!-- js -->
				<?php $expired1 = tanggal_ing(date('Y-m-d',strtotime($tiket[0]['expired_order']))).', '.date('Y',strtotime($tiket[0]['expired_order'])).' '.date('H:i',strtotime($tiket[0]['expired_order']))?>
				<script>
				function myFunction() {
				var copyText = document.getElementById("myInput");
				copyText.select();
				document.execCommand("copy");
				swal("Copy", "Berhasil Copy Nomo Rekening", "info");
				}
				</script>
				<script>
				// Set the date we're counting down to
				var countDownDate = new Date("<?= $expired1 ?>").getTime();
				// Update the count down every 1 second
				var x = setInterval(function() {
				// Get todays date and time
				var now = new Date().getTime();
				// Find the distance between now and the count down date
				var distance = countDownDate - now;
				// Time calculations for days, hours, minutes and seconds
				var days = Math.floor(distance / (1000 * 60 * 60 * 24));
				var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
				var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
				var seconds = Math.floor((distance % (1000 * 60)) / 1000);
				// Output the result in an element with id="demo"
				document.getElementById("expired").innerHTML = hours + " Jam : "
				+ minutes + " Menit : " + seconds + " Detik ";
				// If the count down is over, write some text
				if (distance < 0) {
				clearInterval(x);
				document.getElementById("expired").innerHTML =  "Waktu Pembayaran Selesai";
				}
				}, 1000);
				</script>
				<?php $this->load->view('frontend/include/base_js'); ?>
			</body>
		</html>