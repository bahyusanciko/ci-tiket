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
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

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
						<div class="card mb-5">
							<div class="card-header">
								<i class="fa fa-info-circle"></i> Keterengan Tiket
							</div>
							<div class="card-body">
								<ul>
									<li>► Jurusan <b><?php echo $asal['kota_tujuan']." - ".$jadwal['kota_tujuan']." [".$jadwal['kd_jadwal']."]"; ?></b></li>
									<li>► Armada  <b><?php echo $jadwal['nama_bus'];  ?></b></li>
									<li>► Plat BUS  <b><?php echo $jadwal['plat_bus'];  ?></b></li>
									<li>► Berangkat dari <b><?php echo strtoupper($asal['kota_tujuan'])." - ".$asal['terminal_tujuan']; ?></b></li>
									<li>► Turun di <b><?php echo strtoupper($jadwal['kota_tujuan'])." - ".$jadwal['terminal_tujuan']; ?></b></li>
									<li>► Harga tiket: <b>Rp <?php echo number_format((float)($jadwal['harga_jadwal']),0,",",".") ; ?>,-</b></li>
									<li>► Berangkat hari <b><?php echo nama_hari($tanggal).",".tgl_indo($tanggal) ?></b></li>
									<li>► Jam keberangkatan <b>pukul <?php echo $jadwal['jam_berangkat_jadwal']; ?> WIB</b></li>
									<li>► Jam Tiba <b>pukul <?php echo $jadwal['jam_tiba_jadwal']; ?> WIB</b></li>
									<li>► Silahkan pilih kursi</li>
									<li>► Pilih maksimal 4 kursi</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-lg-4">
						<form action="<?php echo base_url('tiket/afterbeli') ?>" method="get">
							<input type="hidden" name="tgl" value="<?php echo $tanggal ?>">
							<!-- Default Card Example -->
							<div class="card mb-5" >
								<div class="card-header">
									<i class="fa fa-bus"></i> Pilih Kursi
								</div>
								<center class="">
								<table class="">
									<tr>
										<td class='btn-group' width='139'>
											<!--=================================================START 3A=========================================================-->
											<label class='btn btn-default'>
												<input name='kursi[]' value='1' id='1' onclick='cer(this)' autocomplete='off' type='checkbox' <?php if (in_array(array('no_kursi_order' => '1'), $kursi)) { echo "disabled checked";} ?>>&nbsp;1
											</label>
											<!--=================================================START 3A=========================================================-->
											<label class='btn btn-default'>
												<input name='kursi[]' value='2' id='2' onclick='cer(this)' autocomplete='off' type='checkbox'<?php if (in_array(array('no_kursi_order' => '2'), $kursi)) { echo "disabled checked";} ?>>&nbsp;2
											</label>
										</td>
										<td class='btn-group' width='139'>
											<!--=================================================START 3C=========================================================-->
											<label class='btn btn-primary'>
												<a value='' autocomplete='off' disabled='disabled'>SUPIR</a>
											</label>
										</td>
									</tr>
									<tr>
										<td class='btn-group' width='139'>
											<!--=================================================START 3A=========================================================-->
											<label class='btn btn-default'>
												<input name='kursi[]' value='3' id='3' onclick='cer(this)' autocomplete='off' type='checkbox' <?php if (in_array(array('no_kursi_order' => '3'), $kursi)) { echo "disabled checked";} ?>>&nbsp;3
												</label>				<!--=================================================START 3B=========================================================-->
												<label class='btn btn-default'>
													<input name='kursi[]' value='4' id='4' onclick='cer(this)' autocomplete='off' type='checkbox' <?php if (in_array(array('no_kursi_order' => '4'), $kursi)) { echo "disabled checked";} ?>>&nbsp;4
												</label>
											</td>
											<td class='btn-group' width='139'>
												<!--=================================================START 3A=========================================================-->
												<label class='btn btn-default'>
													<input name='kursi[]' value='5' id='5' onclick='cer(this)' autocomplete='off' type='checkbox' <?php if (in_array(array('no_kursi_order' => '5'), $kursi)) { echo "disabled checked";} ?> >&nbsp;5
												</label>
											</td>
										</tr>
										<tr>
											<td class='btn-group' width='139'>
												<!--=================================================START 3A=========================================================-->
												<label class='btn btn-default'>
													<input name='kursi[]' value='6' id='6' onclick='cer(this)' autocomplete='off' type='checkbox' <?php if (in_array(array('no_kursi_order' => '6'), $kursi)) { echo "disabled checked";} ?>>&nbsp;6
													</label>				<!--=================================================START 3B=========================================================-->
													<label class='btn btn-default'>
														<input name='kursi[]' value='7' id='7' onclick='cer(this)' autocomplete='off' type='checkbox' <?php if (in_array(array('no_kursi_order' => '7'), $kursi)) { echo "disabled checked";} ?>>&nbsp;7
													</label>
												</td>
												<td class='btn-group' width='139'>
													<!--=================================================START 3A=========================================================-->
													<label class='btn btn-default'>
														<input name='kursi[]' value='8' id='8' onclick='cer(this)' autocomplete='off' type='checkbox' <?php if (in_array(array('no_kursi_order' => '8'), $kursi)) { echo "disabled checked";} ?>>&nbsp;8
													</label>
													<label class='btn btn-default'>
														<input name='kursi[]' value='9' id='9' onclick='cer(this)' autocomplete='off' type='checkbox' <?php if (in_array(array('no_kursi_order' => '9'), $kursi)) { echo "disabled checked";} ?>>&nbsp;9
													</label>
												</td>
											</tr>
											<tr>
												<td class='btn-group' width='139'>
													<!--=================================================START 3A=========================================================-->
													<label class='btn btn-default'>
														<input name='kursi[]' value='10' id='10' onclick='cer(this)' autocomplete='off' type='checkbox' <?php if (in_array(array('no_kursi_order' => '10'), $kursi)) { echo "disabled checked";} ?>>&nbsp;10
														</label>				<!--=================================================START 3B=========================================================-->
														<label class='btn btn-default'>
															<input name='kursi[]' value='11' id='11' onclick='cer(this)' autocomplete='off' type='checkbox' <?php if (in_array(array('no_kursi_order' => '11'), $kursi)) { echo "disabled checked";} ?>>&nbsp;11
														</label>
													</td>
													<td class='btn-group' width='139'>
														<!--=================================================START 3A=========================================================-->
														<label class='btn btn-default'>
															<input name='kursi[]' value='12' id='12' onclick='cer(this)' autocomplete='off' type='checkbox' <?php if (in_array(array('no_kursi_order' => '12'), $kursi)) { echo "disabled checked";} ?>>&nbsp;12
														</label>
													</td>
												</tr>
												<tr>
													<td class='btn-group' width='139'>
														<!--=================================================START 3A=========================================================-->
														<label class='btn btn-default'>
															<input name='kursi[]' value='13' id='13' onclick='cer(this)' autocomplete='off' type='checkbox' <?php if (in_array(array('no_kursi_order' => '13'), $kursi)) { echo "disabled checked";} ?>>&nbsp;13
															</label>				<!--=================================================START 3B=========================================================-->
															<label class='btn btn-default'>
																<input name='kursi[]' value='14' id='14' onclick='cer(this)' autocomplete='off' type='checkbox' <?php if (in_array(array('no_kursi_order' => '14'), $kursi)) { echo "disabled checked";} ?>>&nbsp;14
															</label>
														</td>
														<td class='btn-group' width='139'>
															<!--=================================================START 3A=========================================================-->
															<label class='btn btn-default'>
																<input name='kursi[]' value='15' id='15' onclick='cer(this)' autocomplete='off' type='checkbox' <?php if (in_array(array('no_kursi_order' => '15'), $kursi)) { echo "disabled checked";} ?>>&nbsp;15
															</label>
														</td>
													</tr>
													<tr>
														<td class='btn-group' width='139'>
															<!--=================================================START 3A=========================================================-->
															<label class='btn btn-default'>
																<input name='kursi[]' value='16' id='16' onclick='cer(this)' autocomplete='off' type='checkbox' <?php if (in_array(array('no_kursi_order' => '16'), $kursi)) { echo "disabled checked";} ?>>&nbsp;16
																</label>				<!--=================================================START 3B=========================================================-->
																<label class='btn btn-default'>
																	<input name='kursi[]' value='17' id='17' onclick='cer(this)' autocomplete='off' type='checkbox' <?php if (in_array(array('no_kursi_order' => '17'), $kursi)) { echo "disabled checked";} ?>>&nbsp;17
																</label>
															</td>
															<td class='btn-group' width='139'>
																<!--=================================================START 3A=========================================================-->
																<label class='btn btn-default'>
																	<input name='kursi[]' value='18' id='18' onclick='cer(this)' autocomplete='off' type='checkbox' <?php if (in_array(array('no_kursi_order' => '18'), $kursi)) { echo "disabled checked";} ?>>&nbsp;18
																</label>
																<label class='btn btn-default'>
																	<input name='kursi[]' value='19' id='19' onclick='cer(this)' autocomplete='off' type='checkbox' <?php if (in_array(array('no_kursi_order' => '19'), $kursi)) { echo "disabled checked";} ?>>&nbsp;19
																</label>
															</td>
														</tr>
													</table>
													</center>
												</div>
											</div>
											<div class="col-lg-4">
												<!-- Default Card Example -->
												<div class="card mb-5">
													<div class="card-header">
														<i class="fa fa-user"></i> Konfirmasi Pemesanan
													</div>
													<div class="alert alert-primary" role="alert">
														<p>Setelah memilih kursi, silahkan klik tombol 'selanjutnya' dibawah ini !</p>
														<div class='btn-group'>
															<a href="<?php echo base_url('tiket/cekjadwal/'.$tanggal.'/'.$asal['kd_tujuan'].'/'.$jadwal['kota_tujuan']) ?>" class='btn btn-default'>Kembali</a>
															<input class="btn btn-primary pull-right" disabled="disabled" type="submit" value="Selanjutnya">
															
														</div>
													</div>
													<form>
													</div>
												</div>
											</section>
											<!-- End banner Area -->
											<!-- End Generic Start -->
											<!-- start footer Area -->
											<?php $this->load->view('frontend/include/base_footer'); ?>
											<!-- js -->
											<script type="text/javascript">
										     jQuery(document).ready(function(){
									     
									          var checkboxes = $("input[type='checkbox']"),
									              submitButt = $("input[type='submit']");

									          checkboxes.click(function() {
									              submitButt.attr("disabled", !checkboxes.is(":checked"));
												  
									          });

									         })
									                                                  
																					                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                     
										    </script>
											<script type="text/javascript">
											var count=0
											function cer(elem){
											if (elem.checked) {
											count = count + 1;
											if (count>4) {
											count = 4;
											swal("Maaf", "Maaf anda hanya boleh memilih 4 kursi !", "error");
											elem.checked = false;
											}
											}else{
											count = count-1;
											}
											}
											</script>
											<?php $this->load->view('frontend/include/base_js'); ?>
										</body>
									</html>