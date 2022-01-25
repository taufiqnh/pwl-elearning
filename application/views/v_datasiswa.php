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
		<?php if ($this->session->flashdata('pesan') != null): ?>
	      <div class="alert alert-warning"><?= $this->session->flashdata('pesan');?></div>
    	<?php endif ?>
			<div class="container-fluid">

				<!-- DataTables -->
				<div class="card mb-3">
					<div class="card-header">
						<button type="button" class="btn btn-info btn-rounded" data-toggle="modal" data-target="#tambahsiswa" data-whatever="@mdo">Tambah</button>
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
                    	<th>Aksi</th>
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
                                                            <td>
																<a onclick="Edit(<?=$s->id_siswa;?>);" style="color: white">
                                                                	<button type="button" name="button" class="btn btn-primary btn-rounded btn-sm" aria-haspopup="true" aria-expanded="true" title="Edit Siswa">
                    													<i class="fa fa-edit"></i>
                    												</button>
																</a>
																<a href="<?=base_url()?>siswa/siswa_hapus/<?=$s->id_siswa?>" style="color: white" onclick="return confirm('Apakah yakin?')">
	                    											<button type="button" name="button" class="btn btn-danger btn-rounded btn-sm" title="Hapus Siswa">
	                    												<i class="fa fa-trash"></i>
	                    											</button>
																</a>
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

<!-- Modal Tambah Pelanggan -->
<div class="modal fade" id="tambahsiswa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
  <div class="modal-dialog" role="document">
    <form class="form-horizontal" action="<?=base_url('siswa/siswa_tambah')?>" method="post">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title">Tambah Data Siswa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
					<div class="form-group">
						<label for="exampleInputname_32" class="col-sm-5 control-label">Nama Siswa</label>
						<div class="col-sm-12">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-user"></i></div>
								<input type="text" class="form-control" placeholder="Nama Siswa" name="nama_siswa" autocomplete="off" required="">
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="exampleInputpwd_32" class="col-sm-3 control-label">Password</label>
						<div class="col-sm-12">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-user"></i></div>
								<input type="password" class="form-control" placeholder="Password" name="password" autocomplete="off" required="">
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="exampleInput_32" class="col-sm-3 control-label">Email</label>
						<div class="col-sm-12">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-lock"></i></div>
								<input type="text" class="form-control" placeholder="Email" name="email" required="">
							</div>
						</div>
					</div>
	                <!-- <div class="form-group">
						<label for="exampleInputpwd_32" class="col-sm-4 control-label">Upload Foto</label>
						<div class="col-sm-12">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-map"></i></div>
								<input type="file" name="fotosiswa" class="form_control">
							</div>
						</div>
					</div> -->
	                
				</div>
				<div class="modal-footer">
					<div class="form-group mb-0">
						<div class="col-sm-offset-3 col-sm-12">
							<input type="submit" class="btn btn-info btn-rounded" value="Tambah" name="tambah">
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>

<!-- Modal Edit Siswa -->
<div class="modal fade" id="editsiswa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
  <div class="modal-dialog" role="document">
    <form class="form-horizontal" action="<?=base_url('siswa/siswa_ubah')?>" method="post" enctype="multipart/form-data">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title">Edit Siswa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
        			<div class="form-group" id="photo-preview">
                            <div class="col-md-4">
                                
                            <span class="help-block"></span>
                            </div>
                        </div>
        			<div class="form-group">
						<label for="exampleInputpwd_32" class="col-sm-5 control-label">Ubah Foto</label>
						<div class="col-sm-12">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-doc"></i></div>
								<input type="file" name="fotosiswa" class="form_control">
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="exampleInputuname_3" class="col-sm-5 control-label">Nama Siswa</label>
						<div class="col-sm-12">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-user"></i></div>
								<input type="hidden" name="id_siswa" id="id_siswa">
								<input type="hidden" name="foto" id="foto">
								<input type="text" class="form-control" placeholder="Nama Siswa" name="nama_siswa" id="nama_siswa" autocomplete="off" required="">
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="exampleInputpwd_32" class="col-sm-3 control-label">Password</label>
						<div class="col-sm-12">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-user"></i></div>
								<input type="password" class="form-control" placeholder="Password" name="password" id="password" autocomplete="off" required="">
							</div>
						</div>
					</div>
                    <div class="form-group">
						<label for="exampleInputpwd_32" class="col-sm-3 control-label">Email</label>
						<div class="col-sm-12">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon-map"></i></div>
								<input type="text" class="form-control" placeholder="Email" name="email" id="email" autocomplete="off" required="">
							</div>
						</div>
					</div>                    
				</div>
				<div class="modal-footer">
					<div class="form-group mb-0">
						<div class="col-sm-offset-3 col-sm-12">
							<input type="submit" class="btn btn-primary btn-rounded" value="Ubah" name="ubah">
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>


<script>
	var base_url = '<?php echo base_url();?>';
    function Edit(id){
        $('#editsiswa').modal('show');
        $.ajax({
            type  : 'GET',
            url   : '<?=base_url('siswa/get_siswa_id/')?>'+id,
            dataType : 'json',
            success : function(data){
				$('#id_siswa').val(data.id_siswa);
				$('#nama_siswa').val(data.nama_siswa);
                $('#password').val(data.password);
                $('#email').val(data.email);
                $('#foto').val(data.foto);
                $('#photo-preview div').html('<img src="'+base_url+'assets/fotosiswa/'+data.foto+'" class="card-img-top  rounded img-responsive">');
            }
        });
    }
</script>
<script src="<?=base_url()?>asset/vendors/bower_components/sweetalert/dist/sweetalert.min.js"></script>
<script src="<?=base_url()?>asset/dist/js/sweetalert-data.js"></script>