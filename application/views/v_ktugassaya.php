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
    <?php if ($this->session->flashdata('pesan') != null): ?>
	      <div class="alert alert-warning"><?= $this->session->flashdata('pesan');?></div>
    <?php endif ?>
			<div class="container-fluid">

				<!-- DataTables -->
				<div class="card mb-3">
					<div class="card-header">
						<h2>Data Tugas Saya</h2>
					</div>
					<div class="card-body">

						<div class="table-responsive">
							<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
								<thead>
                  <tr>
                    <th>File</th>
                    <th>Catatan</th>
                    <th>Nama Guru</th>
                    <th>Tgl Kumpul</th>
                    <th>Nilai</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                if ($count > 0) {
                    foreach ($ktugas as $kt):
                ?>
                    <tr>
                                                            <td><img src="<?=base_url()?>assets/k_tugas/<?=$kt->file;?>" style="max-width:80px;max-height:80px;"></td>
                                                            <td><?=$kt->catatan;?></td>
                                                            <td><?=$kt->nama_guru;?></td>
                                                            <td><?=$kt->tgl_kumpul;?></td>
                                                              <?php if ($kt->nilai == 0) { ?>
                                                            <td>Belum Dinilai</td>
                                                            <?php } else { ?>
                                                            <td><?=$kt->nilai;?></td>
                                                            <?php } ?>
                                                            <td>                          
                                                            </td>
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