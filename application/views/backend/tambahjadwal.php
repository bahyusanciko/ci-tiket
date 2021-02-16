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
    <link rel="stylesheet" href="<?php echo base_url('assets/frontend/timepicker') ?>/css/bootstrap-material-datetimepicker.css" />
    <?php $this->load->view('backend/include/base_css'); ?>
  </head>
  <body id="page-top">
    <!-- navbar -->
    <?php $this->load->view('backend/include/base_nav'); ?>
    <!-- Begin Page Content -->
    <div class="container-fluid">
      <!-- Page Heading -->
      <!-- Basic Card Example -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Tambah Jadwal</h6>
        </div>
        <div class="card-body">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-12">
                <form action="<?php echo base_url()?>backend/jadwal/tambahjadwal" method="post">
                  <div class="form-group">
                    <label class="">Asal</label>
                    <select class="form-control" name="asal" required>
                      <option value="" selected disabled="">-Pilih Asal-</option>
                      <?php foreach ($tujuan as $row ) {?>
                      <option value="<?php echo $row['kd_tujuan'] ?>" ><?php echo strtoupper($row['kota_tujuan'])." - ".$row['terminal_tujuan']; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label class="">Tujuan</label>
                    <select class="form-control" name="tujuan" required>
                      <option value="" selected disabled="">-Pilih Tujuan-</option>
                      <?php foreach ($tujuan as $row ) {?>
                      <option value="<?php echo $row['kd_tujuan'] ?>" ><?php echo strtoupper($row['kota_tujuan'])." - ".$row['terminal_tujuan']; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label  class="">Bus</label>
                    <select class="form-control" name="bus">
                      <option value="" selected disabled="">-Pilih Bus-</option>
                      <?php foreach ($bus as $row ) {?>
                      <option value="<?php echo $row['kd_bus'] ?>" ><?php echo strtoupper($row['nama_bus']); ?> -<?php if ($row['status_bus'] == '1') { ?>
                        Online
                        <?php } else { ?>
                        Offline
                      <?php } ?>- </option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label  class="">Jam Berangkat</label>
                    <input type="text" class="form-control"  id="time" name="berangkat" required="" placeholder="Jam Berangkat">
                  </div>
                  <div class="form-group">
                    <label  class="">Jam Tiba</label>
                    <input type="text" class="form-control"  id="time2" name="tiba" required="" placeholder="Jam Tiba">
                  </div>
                  <div class="form-group">
                    <label  class="">Harga Jadwal</label>
                    <input type="number" class="form-control" name="harga" required="" placeholder="Harga">
                    <?php echo form_error('name'),'<small class="text-danger pl-3">','</small>'; ?>
                  </div>
                </div>
              </div>
              <hr>
              <a class="btn btn-default" href="javascript:history.back()"> Kembali</a>
              <input  type="submit" class="btn btn-primary pull-rigth" value="Tambah Jadwal">
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- End of Main Content -->
    <!-- The Modal -->
    <!-- Footer -->
    <?php $this->load->view('backend/include/base_footer'); ?>
    <!-- End of Footer -->
    <!-- js -->
        <?php $this->load->view('backend/include/base_js'); ?>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.5.10/js/ripples.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.5.10/js/material.min.js"></script>
        <script type="text/javascript" src="http://momentjs.com/downloads/moment-with-locales.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/frontend/timepicker') ?>/js/bootstrap-material-datetimepicker.js"></script>
        <script type="text/javascript">
          $(document).ready(function()
          {
            $('#time').bootstrapMaterialDatePicker
            ({
              date: false,
              shortTime: false,
              format: 'HH:mm'
            });
          })
        </script>
        <script type="text/javascript">
          $(document).ready(function()
          {
            $('#time2').bootstrapMaterialDatePicker
            ({
              date: false,
              shortTime: false,
              format: 'HH:mm'
            });
          })
        </script>

      </body>
    </html>