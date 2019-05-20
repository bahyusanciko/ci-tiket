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
      <h1 class="h3 mb-2 text-gray-800">Data Bus</h1>
      <!-- DataTales Example -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#ModalTujuan">
          Tambah Bus
          </button>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Kode Bus</th>
                  <th>Nama Bus</th>
                  <th>Plat Bus</th>
                  <th>Kapasitas Kursi</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1 ; foreach ($bus as $row ) { ?>
                <tr>
                  <td><?php echo $i++; ?></td>
                  <td><?php echo strtoupper($row['kd_bus']); ?></td>
                  <td><?php echo strtoupper($row['nama_bus']); ?></td>
                  <td><?php echo strtoupper($row['plat_bus']); ?></td>
                  <td><?php echo $row['kapasitas_bus'] ?></td>
                  <?php if ($row['status_bus'] == '1') { ?>
                    <td class="btn-success"> Online</td> 
                    <?php } else { ?>
                    <td class="btn-danger">Offline</td>
                  <?php } ?>
                  <td align="center"><a href="<?php echo base_url('backend/bus/viewbus/'.$row['kd_bus'])?>" class="btn btn btn-primary">View</a></a>
                </td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <!-- /.container-fluid -->
  </div>
  <!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
<!-- Footer -->
<?php $this->load->view('backend/include/base_footer'); ?>
<!-- End of Footer -->
<!-- Modal -->
<div class="modal fade" id="ModalTujuan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
  <div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Tambah Bus</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="modal-body">
    <form action="<?php echo base_url()?>backend/bus/tambahbus" method="post">
      <div class="form-group">
        <label for="platbus" class="">Nama BUS</label>
        <input type="text" class="form-control" name="nama_bus" placeholder="Plat Bus">
      </div>
      <div class="form-group">
        <label for="platbus" class="">Plat BUS</label>
        <input type="text" class="form-control" name="plat_bus" placeholder="Plat Bus">
      </div>
      <div class="form-group">
        <label for="seat" class="">Jumlah Kursi</label>
        <input type="number" class="form-control" id="seat" name="seat" placeholder="Jumlah Kursi">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button class="btn btn-primary">Simpan</button>
      </div>
    </form>
  </div>
</div>
</div>
</div>
<!-- js -->
<?php $this->load->view('backend/include/base_js'); ?>
</body>
</html>