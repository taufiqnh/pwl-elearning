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
		
			<div class="container-fluid">

				<!-- DataTables -->
				<div class="card mb-3">
					<div class="card-header">
						<h1 style="font-size: 27px; letter-spacing:-0.5px; color:black;">Data Siswa</h1>
					</div>
					<div class="card-body">

					<div class="table-responsive">
						<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
					<thead>
                  	<tr>
                   		<th>Nama Siswa</th>
                    	<th>Password</th>
                    	<th>Email</th>
                    	<th>Foto</th>
                 	</tr>
               		</thead>
                	<tbody>
                                                    <?php
                                                    if ($count > 0) {
                                                        foreach ($siswa as $s):
                                                    ?>
                                                        <tr>
                                                            <td><?=$s->nama_siswa;?></td>
                                                            <td>Terenkripsi</td>
                                                            <td><?=$s->email;?></td>
                                                            <td><img src="<?=base_url()?>assets/fotosiswa/<?=$s->foto;?>" style="max-width:80px;max-height:80px;"></td>
                                                            
                                                        </tr>
                                                    <?php
                                                        endforeach;
                                                    }
                                                    else {
                                                    ?>
                                                            <td colspan="4"><center>Data tidak ditemukan.</center></td>
                                                    <?php
                                                    }
                                                    ?>
                    			</tbody>
                    		</table>
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

<script src="<?=base_url()?>asset/vendors/bower_components/sweetalert/dist/sweetalert.min.js"></script>
<script src="<?=base_url()?>asset/dist/js/sweetalert-data.js"></script>