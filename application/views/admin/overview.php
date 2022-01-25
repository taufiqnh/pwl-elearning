<?php
if ($this->session->userdata('role') != 'Admin'){
	$this->session->sess_destroy();
   	redirect('admin');
}
if(isset($_SESSION['pesan'])){
    unset($_SESSION['pesan']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view("admin/_partials/head.php") ?>
</head>
<body id="page-top">

<?php $this->load->view("admin/_partials/navbar.php") ?>

<div id="wrapper">

	<?php $this->load->view("admin/_partials/sidebar.php") ?>

	<div id="content-wrapper">

		<div class="container-fluid">

        <!-- 
        karena ini halaman overview (home), kita matikan partial breadcrumb.
        Jika anda ingin mengampilkan breadcrumb di halaman overview,
        silahkan hilangkan komentar (//) di tag PHP di bawah.
        -->
		<?php //$this->load->view("admin/_partials/breadcrumb.php") ?>
		<div class="section-header">
            <h1 style="font-size: 27px; letter-spacing:-0.5px; color:black;">Dashboard Admin</h1>
        </div>
		<!-- Icon Cards-->
		<div class="row">
			<div class="col-xl-3 col-sm-6 mb-3">
			<div class="card text-white bg-primary o-hidden h-100">
				<div class="card-body">
				<div class="card-body-icon">
					<i class="fas fa-fw fa-user"></i>
				</div>
				<div class="mr-5">Admin</div>
				</div>
				<a class="card-footer text-white clearfix small z-1" href="<?=base_url('Transaksi/verifikasi')?>">
				<span class="float-left"><?php echo '<span style="color: white; font-size: 20px;"> '. $this->db->count_all('admin') . '</span>'; ?></span>
				<span class="float-right">
					<i class="fas fa-angle-right"></i>
				</span>
				</a>
			</div>
			</div>
			<div class="col-xl-3 col-sm-6 mb-3">
			<div class="card text-white bg-warning o-hidden h-100">
				<div class="card-body">
				<div class="card-body-icon">
					<i class="fas fa-fw fa-list"></i>
				</div>
				<div class="mr-5">Siswa</div>
				</div>
				<a class="card-footer text-white clearfix small z-1" href="<?=base_url('siswa/datasiswa')?>">
				<span class="float-left"><?php echo '<span style="color: white; font-size: 20px;"> '. $this->db->count_all('siswa') . '</span>'; ?></span>
				<span class="float-right">
					<i class="fas fa-angle-right"></i>
				</span>
				</a>
			</div>
			</div>
			<div class="col-xl-3 col-sm-6 mb-3">
			<div class="card text-white bg-success o-hidden h-100">
				<div class="card-body">
				<div class="card-body-icon">
					<i class="fas fa-fw fa-users"></i>
				</div>
				<div class="mr-5">Guru</div>
				</div>
				<a class="card-footer text-white clearfix small z-1" href="<?=base_url('guru/dataguru')?>">
				<span class="float-left"><?php echo '<span style="color: white; font-size: 20px;"> '. $this->db->count_all('Guru') . '</span>'; ?></span>
				<span class="float-right">
					<i class="fas fa-angle-right"></i>
				</span>
				</a>
			</div>
			</div>
			<div class="col-xl-3 col-sm-6 mb-3">
			<div class="card text-white bg-danger o-hidden h-100">
				<div class="card-body">
				<div class="card-body-icon">
					<i class="fas fa-fw fa-home"></i>
				</div>
				<div class="mr-5">Kelas</div>
				</div>
				<a class="card-footer text-white clearfix small z-1" href="#">
				<span class="float-left">1</span>
				<span class="float-right">
					<i class="fas fa-angle-right"></i>
				</span>
				</a>
			</div>
			</div>
		</div>

		<!-- Area Chart Example-->
		<!-- <div class="card mb-3">
			<div class="card-header">
			<i class="fas fa-chart-area"></i>
			Data Pelanggan</div>
			<div class="card-body">
			<div class="table-wrap">
                            						<div class="table-responsive">
                            							<table class="table table-hover table-striped" id="datable_1">
                            								<thead>
                            									<tr>
                            										<th>Nama Pelanggan</th>
                                                                    <th>Nomor Meter</th>
                                                                    <th>Daya</th>
                            									</tr>
                            								</thead>
                            								<tbody>
                                                            <?php
                                                            if ($count > 0) {
                                                                foreach ($pelanggan as $p):
                                                            ?>
                                                                <tr>
                                                                    <td>
        																<a href="<?=base_url()?>Transaksi/transaksidetail/<?=$p->id_pelanggan?>" style="color:rgb(43, 151, 221)">
        																	<?=$p->nama_pelanggan;?>
        																</a>
        															</td>
                                                                    <td><?=$p->nomor_kwh;?></td>
                                                                    <td><?=$p->daya;?> Watt</td>
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
                                                <div class="pull-right">
                                                    <a href="<?=base_url('Pelanggan/datapelanggan')?>">
                                                        <button type="button" name="button" class="btn btn-info btn-rounded">Detail</button>
                                                    </a>
                                                </div>
			</div>
		</div>

		</div> -->
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
