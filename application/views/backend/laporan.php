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
            <h1 class="h3 mb-4 text-gray-800">DashBoard</h1>
            <table class="table table-bordered table-condensed" style="font-size:12px;" id="mydata">
                <thead>
                    <tr>
                        <th style="text-align:center;width:40px;">No</th>
                        <th>Laporan</th>
                        <th style="width:100px;text-align:center;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="text-align:center;vertical-align:middle">1</td>
                        <td style="vertical-align:middle;">Laporan Data Tiket Pertanggal</td>
                        <td style="text-align:center;">
                            <a class="btn btn-sm btn-default" href="#lap_jual_pertanggal" data-toggle="modal"><span class="fa fa-print"></span> Print</a>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align:center;vertical-align:middle">2</td>
                        <td style="vertical-align:middle;">Laporan Data Tiket Perbulan</td>
                        <td style="text-align:center;">
                            <a class="btn btn-sm btn-default" href="#lap_jual_perbulan" data-toggle="modal"><span class="fa fa-print"></span> Print</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <!-- /.row -->
    <!-- ============ MODAL ADD =============== -->
    <div class="modal fade" id="lap_jual_pertanggal" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="myModalLabel">Pilih Tanggal</h3>
                </div>
                <form class="form-horizontal" method="post" action="<?php echo base_url('backend/laporan/laportanggal') ?>" target="_blank">
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="control-label col-xs-3" > Dari Tanggal</label>
                            <div class="col-xs-9">
                                <div class='input-group date' id='datepicker' style="width:300px;">
                                    <input type='text' name="mulai" class="form-control datepicker" value="" placeholder="Tanggal..." required/>
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-xs-3" > Sampai Tanggal</label>
                            <div class="col-xs-9">
                                <div class='input-group date' id='datepicker' style="width:300px;">
                                    <input type='text' name="sampai" class="form-control datepicker" value="" placeholder="Tanggal..." required/>
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                        <button class="btn btn-info"><span class="fa fa-print"></span> Cetak</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- ============ MODAL ADD =============== -->
    <div class="modal fade" id="lap_jual_perbulan" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="myModalLabel">Pilih Bulan</h3>
                </div>
                <form class="form-horizontal" method="post" action="<?php echo base_url('backend/laporan/laporbulan') ?>" target="_blank">
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="control-label col-xs-3" >Bulan</label>
                            <div class="col-xs-9">
                                <select name="bln" class="selectpicker show-tick form-control" data-live-search="true" title="Pilih Bulan" data-width="80%" required/>
                                    <option value='' selected disabled>Pilih Bulan</option>
                                <?php foreach ($bulan as $row) { ?>
                                    <option value="<?php echo $row['bulan'] ?>"><?php echo $row['bulan'] ?></option>
                                <?php } ?>
                                                                </select>

                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                        <button class="btn btn-info"><span class="fa fa-print"></span> Cetak</button>
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
<script type="text/javascript">
             $(function(){
                var date = new Date();
                date.setDate(date.getDate());

              $(".datepicker").datepicker({
                  format: 'yyyy-mm-dd',
                  autoclose: true,
              });
             });
            </script>
</body>
</html>
