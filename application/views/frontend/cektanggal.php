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
		<title><?php echo $title ?></title>
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
				<div class="row">
					<div class="col-lg-4">
						<!-- Default Card Example -->
						<div class="card mb-5">
							<div class="card-header">
								<i class="fa fa-search"></i> Cari Tiket
							</div>
							<div class="card-body">
								<div class="alert alert-primary" role="alert">
									<p><b>PENTING!!</b></p>
									<P>Sebelum Membeli Tiket Harap Baca terlebih Dahulu <b><i data-toggle="modal" data-target="#exampleModal" >Cara Pemesanan</i></b></P>
								</div>
								<form action="<?php echo base_url() ?>tiket/cekjadwal?>" method="get">
									<div class="form-group">
										<label for="exampleInputEmail1">Pilih Tanggal</label>
										<input placeholder="Masukkan tanggal" type="text" class="form-control datepicker" name="tanggal" required="">
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Asal</label>
										<!-- <div class="default-select" id="default-select"> -->
										<select name="asal" class="form-control js-example-basic-single" required >
											<option value="" selected disabled="">Pilih Asal</option>
											<?php foreach ($asal as $row ) { ?>
											<option value="<?php echo $row['kd_tujuan'] ?>"><?php echo strtoupper($row['kota_tujuan']).'['.$row['nama_terminal_tujuan'].']'; ?> - <br><?php echo $row['terminal_tujuan']; ?> </option>
											<?php } ?>
										</select>
										<!-- </div> -->
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Tujuan</label>
										<!-- <div class="default-select" id="default-select"> -->
										<select name="tujuan" class="form-control js-example-basic-single">
											<option value="" selected disabled="">Pilih Tujuan</option>
											<?php foreach ($tujuan as $row ) { ?>
											<option value="<?php echo $row['kota_tujuan'] ?>"><?php echo strtoupper($row['kota_tujuan']); ?></option>
											<?php } ?>
										</select>
										<!-- </div> -->
									</div>
									<a href="<?php echo base_url() ?>tiket" class="btn btn-primary pull-left">Kembali </a>
									<button type="submit" class="btn btn-primary pull-right">Cari </button>
								</form>
							</div>
						</div>
					</div>
					<div class="col-lg-8">
						<div class="card mb-10">
							<div class="card-header">
								<i class="fa fa-info"></i> Info Terminal
							</div>
							<div class="card-body">
								<table class="table table-bordered table-condensed" style="font-size:12px;" id="mydata">
                <thead>
                    <tr>
                        <th style="text-align:center;width:50px;">KOTA</th>
                        <th>Lokasi Terminal</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($list as $value) { ?>
                    <tr>
                        <td style="text-align:center;vertical-align:middle"><?php echo strtoupper($value['kota_tujuan']) ?></td>
                        <td style="vertical-align:middle;"><?php echo $value['terminal_tujuan'] ?></td>
                    </tr>
                 <?php } ?>
                </tbody>
            </table>
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
			<script type="text/javascript">
			 $(function(){
			 	var date = new Date();
				date.setDate(date.getDate());

			  $(".datepicker").datepicker({
			  		startDate: date,
			      format: 'yyyy-mm-dd',
			      autoclose: true,
			      todayHighlight: true,
			  });
			 });
			</script>
			<script type="text/javascript">
				$(document).ready(function() {
				$('.js-example-basic-single').select2();
				});
			</script>
		</body>
	</html>
	<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Cara Pemesanan</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="table-responsive">
					<ol class="ordered-list" align="left"><span class="center_content2"><li>Cari tiket kemudian klik pada tombol <b>Pesan</b>&nbsp;pada tiket yang ingin Anda pesan.</li>
					<li style="font-weight: normal;">Tiket yang Anda pesan akan masuk ke dalam <span style="font-weight: bold">Tiket Keranjang</span>.</li>
					<li style="font-weight: normal;">Jika sudah selesai, klik tombol <span style="font-weight: bold">Selesai Pesan</span>, maka akan tampil form untuk pengisian data kustomer/pembeli.</li>
					<li style="font-weight: normal;">Setelah data pembeli selesai diisikan, klik tombol <span style="font-weight: bold">Proses</span>,
					maka akan tampil data pembeli beserta tiketyang dipesannya (jika
					diperlukan catat nomor ordernya). Dan juga ada total pembayaran serta
				nomor rekening pembayaran.</li>
				<li style="font-weight: normal;">Apabila telah melakukan pembayaran, bawalah bukti pembayaran pada saat keberangkatan dan dilakukan penukaran satu jam sebelum keberangkatan. </li></span></ol><w:worddocument></w:worddocument>
			</div>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		</div>
	</div>
</div>
</div>