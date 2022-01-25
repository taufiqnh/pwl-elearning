<?php
if ($this->session->userdata('role') != 'Guru'){
	$this->session->sess_destroy();
   	redirect('guru');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view("admin/_partials/head.php") ?>
</head>

<body id="page-top">

	<?php $this->load->view("guru/navbar.php") ?>
	<div id="wrapper">

		<?php $this->load->view("guru/sidebar.php") ?>

		<div id="content-wrapper">
   		<div class="section-header ml-3">
            <h1 style="font-size: 27px; letter-spacing:-0.5px; color:black;">Dashboard Guru</h1>
    	</div>
    	<div class="container">
   		<div class="card">
  			<div class="card-header">
    		Materi
  			</div>
  		<div class="card-body">
    		<h5 class="card-title">Management Materi</h5>
    		<p class="card-text">Anda dapat menambah materi pada fitur ini.
                                                Dalam materi anda dapat memasukan video, dan deskripsi nya. Kontak Administrator jika terjadi masalah
                                                apapun yang terkait upload materi. Terima kasih</p>
    		<a href="<?=base_url('materi/datamateri')?>" class="btn btn-primary">Data Materi</a>
  		</div>
		</div>
		</div>
		<div class="container mt-3">
   		<div class="card">
  			<div class="card-header">
    		Tugas
  			</div>
  		<div class="card-body">
    		<h5 class="card-title">Management Tugas</h5>
    		<p class="card-text">Anda dapat menambah tugas pada fitur ini.
                                                Dalam tugas anda dapat memasukan file tugas, dan deskripsi nya. Kontak Administrator jika terjadi masalah
                                                apapun yang terkait upload tugas. Terima kasih</p>
    		<a href="<?=base_url('tugas/datatugasguru')?>" class="btn btn-primary">Data Tugas</a>
  		</div>
		</div>
		</div>
			<!-- /.container-fluid -->

			<!-- Sticky Footer -->
	<?php $this->load->view("admin/_partials/footer.php") ?>

		</div>
		<!-- /.content-wrapper -->

	</div>
	<!-- /#wrapper -->


	<?php $this->load->view("admin/_partials/scrolltop.php") ?>
	<?php $this->load->view("admin/_partials/modal.php") ?>
	<?php $this->load->view("admin/_partials/js.php") ?>
	
</body>

</html>