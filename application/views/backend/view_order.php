<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?php echo $title ?></title>
    <!-- css -->
    <?php $this->load->view('backend/include/base_css'); ?>
  </head>
  <body id="page-top">
    <!-- navbar -->
    <?php $this->load->view('backend/include/base_nav'); ?>
    <!-- Begin Page Content -->
    <div class="container-fluid">
      <!-- Page Heading -->
      <h1 class="h3 mb-4 text-gray-800">Blank Page</h1>
      <!-- Basic Card Example -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">KODE Order [<?php echo $tiket[0]['kd_order']; ?>]  </h6>
        </div>
        <div class="card-body">
          <form action="<?php echo base_url().'backend/order/inserttiket' ?>" method="post" enctype="multipart/form-data">
             
            <div class="card-body">
              <div class="row">
                <?php foreach ($tiket as $row ) { ?>
                <input type="hidden" class="form-control" name="kd_pelanggan" value="<?php echo $row['kd_pelanggan'] ?>" readonly>
                <input type="hidden" class="form-control" name="kd_order" value="<?php echo $row['kd_order'] ?>" readonly>
                <input type="hidden" class="form-control" name="asal_beli" value="<?php echo $row['asal_order'] ?>" readonly>
                <input type="hidden" class="form-control" name="kd_tiket[]" value="<?php echo $row['kd_tiket'] ?>" readonly>
                <div class="col-sm-6">
                  <label >Kode Tiket <b><?php echo $row['kd_tiket'] ?></b></label>
                  <p>Nama Pemesan <b><?php echo $row['nama_order']; ?></b></p>
                  <hr>
                  <div class="row form-group">
                    <label for="nama" class="col-sm-4 control-label">Kode Jadwal</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="kd_jadwal" value="<?php echo $row['kd_jadwal'] ?>" readonly>
                    </div>
                  </div>
                  <div class="row form-group">
                    <label for="nama" class="col-sm-4 control-label">Nama Penumpang</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="nama[]" value="<?php echo $row['nama_kursi_order'] ?>" readonly>
                    </div>
                  </div>
                  <div class="row form-group">
                    <label for="" class="col-sm-4 control-label">Nomor Kursi</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="no_kursi[]" value="<?php echo $row['no_kursi_order'] ?>" readonly>
                    </div>
                  </div>
                  <div class="row form-group">
                    <label for="" class="col-sm-4 control-label">Umur Penumpang</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="umur_kursi[]>" value="<?php echo $row['umur_kursi_order'] ?> Tahun" readonly>
                    </div>
                  </div>
                  <div class="row form-group">
                    <label for="" class="col-sm-4 control-label">Harga Tiket</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="harga" value="<?php  echo $row['harga_jadwal']; ?>" readonly>
                    </div>
                  </div>
                  <div class="row form-group">
                    <label for="" class="col-sm-4 control-label">Batas Pembayaran</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="tgl_beli" value="<?php echo hari_indo(date('N',strtotime($row['expired_order']))).', '.tanggal_indo(date('Y-m-d',strtotime(''.$row['expired_order'].''))).', '.date('H:i',strtotime($row['expired_order']));  ?>" readonly>
                    </div>
                  </div>
                </div>
                <?php } ?>
                <div class="col-sm-6">
                  <div class="row form-group">
                    <label for="" class="col-sm-4 control-label">Cek Konfirmasi Pembayaran</label>
                    <div class="col-sm-8">
                      <a href="<?php echo base_url('backend/konfirmasi/viewkonfirmasi/'.$tiket[0]['kd_order']) ?>" class="btn btn-secondary">Lihat</a>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="row form-group">
                    <label for="" class="col-sm-4 control-label">Status</label>
                    <div class="col-sm-8">
                       <?php if ($tiket[0]['status_order'] == '1') { ?>
                      <select class="form-control" name="status" required>
                          <option value='' selected disabled>Belum Bayar</option>
                          <option value='2'>Sudah Bayar</option>
                          <option value='3'>Hapus Order</option>
                           </select>
                          <?php } elseif($tiket[0]['status_order'] == '2') { ?>
                            <p class="btn "><b class="btn btn-default">Sudah Bayar</b> <a href="" class="btn btn-danger">Refund Tiket</a></p>

                        <?php } ?>
                     
                    </div>
                  </div>
                  <div class="row form-group">
                    <label for="" class="col-sm-4 control-label">Total Pembayaran</label>
                    <div class="col-sm-8">
                      <p><b>Rp <?php $total =  count($tiket) * $tiket[0]['harga_jadwal']; echo number_format($total)?></b></p>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
              <hr><a class="btn btn-default" href="<?php echo base_url().'backend/order' ?>"> Kembali</a>
              &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;<?php if ($tiket[0]['status_order'] == '1') { ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="submit" class="btn btn-info">Proses</button>
            <?php }else{ ?>
              <a class="btn btn-success" href="<?php echo base_url('assets/backend/upload/etiket/'.$row['kd_order'].'.pdf') ?>"> Cetak Eticket</a>
              <a class="btn btn-success" href="<?php echo base_url('backend/order/kirimemail/'.$row['kd_order']) ?>"> Kirim Eticket</a>
                        <?php } ?>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- End of Main Content -->
  <!-- Footer -->
  <?php $this->load->view('backend/include/base_footer'); ?>
  <!-- End of Footer -->
</div>
<!-- End of Content Wrapper -->
</div>
<!-- End of Page Wrapper -->
<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
<i class="fas fa-angle-up"></i>
</a>
<!-- js -->
<?php $this->load->view('backend/include/base_js'); ?>
</body>
</html>