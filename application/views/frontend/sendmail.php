<!DOCTYPE html>
<html>
	<head>
		<title>Thank you</title>
		<meta NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
		
	</head>
	<body style="font-family: tahoma; font-size: 12px;">
		<center>
		<table class="wrapper" width="600px" style="padding: 0; margin: 0; border-collapse: collapse; border: solid 1px #fd7521;">
			<tr class="header" style="background-color:#484B51;">
				<td style="padding-right:10px;" align="left">
					<a href="<?php echo base_url() ?>" target="_blank">
						<h4>Tiket XTRANS</h4>
					</a>
				</td>
				<td style="padding-right:10px;" align="right">
					<a href="<?php echo base_url() ?>" target="_blank">
						<img height="45" src="https://cdn4.iconfinder.com/data/icons/dot/256/bus.png" alt="">
					</a>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<p style="text-align: justify; padding: 10px;">
						Dear Customer Tiket XTRANS,<br>
						Terima kasih telah menggunakan Tiket XTRANS.
					</p>
					<p style="text-align: justify; padding: 10px;">
						Berikut Ringkasan Pembelian Anda:
						<table width="100%" style="font-size: 14px; margin: 10px;">
								<tr>
								<td>
									Manual Transfer Nomor Rekening
									</td><td>:</td>
									<td>
										<strong><?php echo $sendmail['nomrek_bank']; ?></strong>
									</td>
								</tr>
								<tr>
								<td>
									Atas Nama
									</td><td>:</td>
									<td>
										<strong><?php echo $sendmail['nasabah_bank']; ?></strong>
									</td>
								</tr>
								<tr>
									<td>
										Bank Penerima
									</td>
									<td>:</td>
									<td>
										<strong><?php echo $sendmail['nama_bank']; ?></strong>
									</td>
								</tr>
								<tr>
									<td>
										Nominal yang dibayarkan
									</td>
									<td>:</td>
									<td>
										<?php $total = $count['count(kd_order)'] * $sendmail['harga_jadwal'] ?>
										<strong>Rp <?php echo number_format((float)($total),0,",","."); ?></strong>
									</td>
								</tr>
								<tr>
									<td>
										Nomor Order
									</td>
									<td>:</td>
									<td>
										<strong><?php echo $sendmail['kd_order']; ?></strong>
									</td>
								</tr>
								<tr>
									<td>
										Deskprisi Pembelian
									</td>
									<td>:</td>
									<td>
										<strong>Kode Jadwal <?php echo $sendmail['kd_jadwal'] ?></strong><br>
										<strong>Berangkat <?php echo hari_indo(date('N',strtotime($sendmail['tgl_berangkat_order']))).', '.tanggal_indo(date('Y-m-d',strtotime(''.$sendmail['tgl_berangkat_order'].''))).', '.date('H:i',strtotime($sendmail['jam_berangkat_jadwal'])); ?></strong><br>
										<strong><?php echo $count['count(kd_order)']; ?> Kursi</strong>
									</td>
								</tr>
								<tr>
									<td>
										Tanggal Beli
									</td>
									<td>:</td>
									<td>
										<strong><?php echo $sendmail['tgl_beli_order']; ?></strong>
									</td>
								</tr>
								<tr>
									<td>
										Berlaku hingga
									</td>
									<td>:</td>
									<td>
										<strong><?php $expired = hari_indo(date('N',strtotime($sendmail['expired_order']))).', '.tanggal_indo(date('Y-m-d',strtotime(''.$sendmail['expired_order'].''))).', '.date('H:i',strtotime($sendmail['expired_order'])); echo $expired;?></strong>
									</td>
								</tr>
									</table>
								</p>
							</td>
						</tr>
						<tr>
							<td colspan="2">
								<table width="100%" >
									<tr>
										<td>
											<div class="col-md-12 col-xs-12">
												<h4>Cara Transfer Melalui</h4>
												<div class="hr hr8 hr-double hr-dotted"></div>
												<div class="row">
													<div class="col-md-4">
														<div style="border:1px solid #fd7521;margin:2px;padding:5px;">
															<center><h4>ATM</h4></center>
															<div class="hr hr8 hr-double hr-dotted"></div>
															<ol style="padding:0;">
																<li>Panduan Bayar</li>
																<li>Pilih Menu <span class="label">Transaksi Lainnya</span></li>
																<li>Pilih <span class="label">Transfer</span></li>
																<li>Pilih <span class="label">Ke rekening <?php echo $sendmail['nama_bank'];; ?> </span></li>
																<li>Input Nomor Rekening <span class="label"><?php echo $sendmail['nomrek_bank']; ?></span></li>
																<li>Pilih <span class="label">Benar</span></li>
																<li>Pilih <span class="label">Ya</span></li>
																<li>Ambil bukti bayar anda</li>
																<li>Selesai</li>
															</ol>
														</div>
													</div>
													<div class="col-md-4">
														<div style="border:1px solid #fd7521;margin:2px;padding:5px;">
															<center><h4>MOBILE BANKING</h4></center>
															<div class="hr hr8 hr-double hr-dotted"></div>
															<ol style="padding:0;">
																<li>Login Mobile Banking</li>
																<li>Pilih <span class="label">m-Transfer</span></li>
																<li>Pilih <span class="label">BCA Rekening</span></li>
																<li>Input Nomor Rekening <span class="label"><?php echo $sendmail['nomrek_bank'] ?></span></li>
																<li>Klik <span class="label">Send</span></li>
																<li>Informasi VA akan ditampilkan</li>
																<li>Klik <span class="label">OK</span></li>
																<li>Input <span class="label">PIN</span></li>
																<li>Mobile Banking</li>
																<li>Bukti bayar ditampilkan</li>
																<li>Selesai</li>
															</ol>
														</div>
													</div>
													<div class="col-md-4">
														<div style="border:1px solid #fd7521;margin:2px;padding:5px;">
															<center><h4>INTERNET BANKING</h4></center>
															<div class="hr hr8 hr-double hr-dotted"></div>
															<ol style="padding:0;">
																<li>Pilih <span class="label">Transaksi Dana</span></li>
																<li>Pilih <span class="label">Transfer Ke BCA Rekening</span></li>
																<li>Input Nomor Rekening <span class="label"><?php echo $sendmail['nomrek_bank'] ?></span></li>
																<li></li>
																<li>Klik <span class="label">Lanjutkan</span></li>
																<li>Input Respon <span class="label">KeyBCA Appli 1</span></li>
																<li>Klik <span class="label">Kirim</span></li>
																<li>Bukti bayar ditampilkan</li>
																<li>Selesai</li>
															</ol>
														</div>
													</div>
												</div>
											</div>
											</td>
										</tr>
									</table>
								</td>
							</tr>
							<tr>
								<td colspan="2">
									<p style="padding:10px;">
										<br>
										Hormat Kami,<br>
										<span style="color:#fd7521;"><strong>Tiket XTRANS</strong></span>
										<br>
										<br>
									</p>
								</td>
							</tr>
							<tr>
								
							</tr>
							<tr class="footer" style="font-size: 10px; background-color: #484B51;color:#ffffff;">
								<td style="padding-left:10px; padding-right:10px;">
									<?php echo date("Y"); ?> &copy; Tiket XTRANS
								</td>
								<td align="right" style="padding-left:10px; padding-right:10px;">
									<img height="30" src="https://cdn4.iconfinder.com/data/icons/dot/256/bus.png" border="0">
								</td>
							</tr>
						</table>
						</center>
					</body>
				</html>