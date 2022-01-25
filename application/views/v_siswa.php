<?php
if ($this->session->userdata('role') != 'Siswa'){
	$this->session->sess_destroy();
   	redirect('siswa');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view("admin/_partials/head.php") ?>
</head>

<body id="page-top">

	<?php $this->load->view("siswa/navbar.php") ?>
	<div id="wrapper">

		<?php $this->load->view("siswa/sidebar.php") ?>

		<div id="content-wrapper">
   	<div class="section-header">
            <h1 style="font-size: 27px; margin-left: 15px; letter-spacing:-0.5px; color:black;">Dashboard Siswa</h1>
    </div>
			<!-- /.container-fluid -->
	<!-- Start Lesson Card -->
    <div class="container">
        <div class="row mt-4 mb-5">
            <div class="col-md-4 mb-2 d-flex justify-content-center" data-aos-duration="1900" data-aos="fade-right">
                <a href="<?= base_url('materi/matematika_x') ?>">
                    <div class="card-kelas">
                        <img src="<?= base_url('assets/') ?>img/matematika.png" class="card-img-top" alt="...">
                    </div>
                </a>
            </div>
            <div class="col-md-4 mb-2 d-flex justify-content-center" data-aos-duration="1900" data-aos="fade-down">
                <a href="<?= base_url('materi/ipa_x') ?>">
                    <div class="card-kelas">
                        <img src="<?= base_url('assets/') ?>img/ipa.png" class="card-img-top" alt="...">
                    </div>
                </a>
            </div>
            <div class="col-md-4 mb-2 d-flex justify-content-center" data-aos-duration="1900" data-aos="fade-left">
                <a href="<?= base_url('materi/indo_x') ?>">
                    <div class="card-kelas">
                        <img src="<?= base_url('assets/') ?>img/Bahasa Indonesia.png" class="card-img-top" alt="...">
                    </div>
                </a>
            </div>
        </div>
    </div>
    <!-- Lesson Card 2 -->
    <div class="container">
        <div class="row mt-4 mb-5">
            <div class="col-md-4 mb-2 d-flex justify-content-center" data-aos-duration="1900" data-aos="fade-right">
                <a href="<?= base_url('materi/inggris_x') ?>">
                    <div class="card-kelas">
                        <img src="<?= base_url('assets/') ?>img/Bahasa Inggris.png" class="card-img-top" alt="...">
                    </div>
                </a>
            </div>
            <div class="col-md-4 mb-2 d-flex justify-content-center" data-aos-duration="1900" data-aos="fade-down">
                <a href="<?= base_url('materi/agama_x') ?>">
                    <div class="card-kelas">
                        <img src="<?= base_url('assets/') ?>img/agama.png" class="card-img-top" alt="...">
                    </div>
                </a>
            </div>
            <div class="col-md-4 mb-2 d-flex justify-content-center" data-aos-duration="1900" data-aos="fade-left">
                <a href="<?= base_url('user') ?>">
                    <div class="card-kelas">
                        <img src="<?= base_url('assets/') ?>img/Kembali.png" class="card-img-top" alt="...">
                    </div>
                </a>
            </div>
        </div>
    </div>
    <!-- End Lesson Card -->
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
