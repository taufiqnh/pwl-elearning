<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view("admin/_partials/head.php") ?>
	<script src="https://cdn.jsdelivr.net/npm/afterglowplayer@1.x"></script>
</head>

<body id="page-top">

	<?php $this->load->view("siswa/navbar.php") ?>
	<div id="wrapper">

		<?php $this->load->view("siswa/sidebar.php") ?>

		<div id="content-wrapper">
			<div class="container-fluid">


		<div class="container">
        <div class="bg-white mx-auto p-4">
            <div class="row" style="color: black; font-family: 'poppins';">
                <div class="col-md-12 mt-1">
                    <h1 class="display-4" style="color: black; font-family:'poppins';">Selamat Belajar !
                    </h1>
                    <h3>Halo, <?php
                            $data['user'] = $this->db->get_where('siswa', ['email' =>
                            $this->session->userdata('email')])->row_array();
                            echo $data['user']['nama_siswa'];
                            ?></h3>
                        <p><?= $detail->nama_mapel ?> - Kelas <?= $detail->kelas ?> Matematika </p>
                        <hr align="left" width="600;">
                        <p style="line-height: 3px;">Kita akan mempelajari tentang</p>
                        <p class="font-weight-bold mt--5">
                            <?= $detail->deskripsi; ?>

                        </p>
                </div>
            </div>
        </div>
    	</div>
				
		<!-- Start Video Player -->
    	<div class="container">
        <div class="row">
            <div class="col-md-12 mx-auto mt-auto mb-4">
                <video class="afterglow" autoplay id="myvideo" width="1280" height="720">
                    <source type="video/mp4" autoplay src="<?= base_url() . 'assets/materi/' . $detail->video; ?>" />
                </video>
            </div>
        </div>
    	</div>	

    	<!-- <div class="card mx-3 mb-4">
  			<div class="card-header">
    		TUGAS
  			</div>
  		<div class="card-body">
    		<h5 class="card-title">Special title treatment</h5>
    		
    		<p class="font-weight-bold mt--5">
    			
            </p>

    		<a href="#" class="btn btn-primary">Upload Tugas Anda</a>
  		</div>
		</div> -->

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
