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
                <form class="user" method="post" action="<?php echo base_url('backend/login/daftar') ?>">
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="exampleFirstName" name="name" value="<?php echo set_value('name') ?>" placeholder="Full Name">
                    <?php echo form_error('name'),'<small class="text-danger pl-3">','</small>'; ?>
                </div>
                <div class="form-group">
                  <input type="email" class="form-control form-control-user" placeholder="Email Address" name="email" value="<?php echo set_value('email') ?>">
                  <?php echo form_error('email'),'<small class="text-danger pl-3">','</small>'; ?>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" placeholder="Username" name="username" value="<?php echo set_value('username') ?>">
                  <?php echo form_error('username'),'<small class="text-danger pl-3">','</small>'; ?>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" class="form-control form-control-user" name="password" placeholder="Password">
                  </div>
                  <div class="col-sm-6">
                    <input type="password" class="form-control form-control-user" name="password2" placeholder="Repeat Password">
                  </div>
                </div>
                <div class="form-group">
                  <select class="form-control" name="level">
                    <option value="2">Adminstartor</option>
                    <option value="1">Owner</option>
                  </select>
                </div>
                 <?php echo form_error('password'),'<small class="text-danger pl-3">','</small>'; ?>
                 <a href="" class=" btn btn-default">Kembali</a>
                <button type="submit" class="btn btn-primary pull-right">
                  Tambah Akun
                </button> 
              </form>
          </div>
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

      </body>
    </html>