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
			<div class="container-fluid">

				<!-- DataTables -->
				<div class="card mb-3">
					<div class="card-header">
						<h2>Materi Matematika</h2>
					</div>
					<div class="card-body">


            <div class="container">
            <div class="row mt-4">
            <?php foreach ($materi as $u) { ?>
                <div class="col-md-6 mb-4" data-aos="fade-right" data-aos-duration="1200">
                    <div class="card">
                        <div class="card-body p-4">
                            <h3 class="card-title">Nama Guru : <?= $u->nama_guru; ?></h3>
                            <p class=" card-text">
                                <?= substr($u->deskripsi, 0, 100); ?>&nbsp;.&nbsp;.&nbsp;.&nbsp;.&nbsp;.&nbsp;.&nbsp;.&nbsp;.
                            </p>
                            <a href="<?php echo site_url('materi/belajar/' . $u->id_materi); ?>"class="btn btn-primary">Pelajari
                                Sekarang !</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
          </div>
          </div>

					</div>
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
