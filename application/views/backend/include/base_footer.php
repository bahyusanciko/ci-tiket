<footer class="sticky-footer bg-white">
	<div class="container my-auto">
		<div class="copyright text-center my-auto">
			<span>Copyright &copy; Your Website 2019</span>
		</div>
	</div>
</footer>
</div>
<!-- End of Content Wrapper -->
</div>
<!-- End of Page Wrapper -->
<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
<i class="fas fa-angle-up"></i>
</a>
<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
	<div class="modal-header">
		<h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
		<button class="close" type="button" data-dismiss="modal" aria-label="Close">
		<span aria-hidden="true">×</span>
		</button>
	</div>
	<div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
	<div class="modal-footer">
		<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
		<a class="btn btn-primary" href="<?php echo base_url('backend/login/logout') ?>">Logout</a>
	</div>
</div>
</div>
</div>
<div class="preloader">
			<div class="loading">
				<img src="<?php echo base_url('assets/frontend/img/preloader.gif') ?>" width="80">
				<p>Harap Tunggu</p>
			</div>
		</div>
<?php echo "<script>".$this->session->flashdata('message')."</script>"?>