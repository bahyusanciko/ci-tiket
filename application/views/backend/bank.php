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
      <h1 class="h3 mb-2 text-gray-800">Data Bank</h1>
      <!-- DataTales Example -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#ModalTujuan">
          Tambah Bank
          </button>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Kode Bank</th>
                  <th>Nama Bank</th>
                  <th>NomRek</th>
                  <th>Atas Nama</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1 ; foreach ($bank as $row ) { ?>
                <tr>
                  <td><?php echo $i++; ?></td>
                  <td><?php echo $row['kd_bank']; ?></td>
                  <td><?php echo $row['nama_bank']; ?></td>
                  <td><?php echo $row['nomrek_bank']; ?></td>
                  <td><?php echo $row['nasabah_bank']; ?></td>
                  <td align="center"><a href="<?php echo base_url('backend/bank/viewbank/'.$row['kd_bank']) ?>" class="btn btn btn-primary">View</a></a>
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
<!-- Modal -->
<div class="modal fade" id="ModalTujuan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
  <div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Tambah Tujuan</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="modal-body">
    <form action="<?php echo base_url()?>backend/home/tambahbus" method="post">
      <div class="form-group">
        <label for="platbus" class="">Plat BUS</label>
        <input type="text" class="form-control" id="inputEmail3" name="kd_bus" placeholder="Plat Bus">
      </div>
      <div class="form-group">
        <label for="seat" class="">Kelas</label>
        <select class="form-control" name="kelas">
          <option value="" disabled required>-Pilih Kelas-</option>
          <option value="Business">Business</option>
          <option value="Executive">Executive</option>
          <option value="Super Executive">Super Executive</option>
        </select>
      </div>
      <div class="form-group">
        <label for="seat" class="">Jumlah Kursi</label>
        <input type="number" class="form-control" id="seat" name="seat" placeholder="Jumlah Kursi">
      </div>
      <div class="form-group">
        <label for="harga" class="">Harga Tiket</label>
        <input type="number" class="form-control" id="harga" name="harga" placeholder="Harga">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button class="btn btn-primary">Save changes</button>
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