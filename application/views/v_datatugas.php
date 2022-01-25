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
    <?php if ($this->session->flashdata('pesan') != null): ?>
	      <div class="alert alert-warning"><?= $this->session->flashdata('pesan');?></div>
    <?php endif ?>
			<div class="container-fluid">

				<!-- DataTables -->
				<div class="card mb-3">
					<div class="card-header">
						<button type="button" class="btn btn-info btn-rounded" data-toggle="modal" data-target="#tambahtarif" data-whatever="@mdo">Tambah</button>
					</div>
					<div class="card-body">

						<div class="table-responsive">
							<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
								<thead>
                  <tr>
                    <th>Deskripsi</th>
                    <th>File</th>
                    <th>Deadline</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                if ($count > 0) {
                    foreach ($tugas as $t):
                ?>
                    <tr>
                                                            <td><?=$t->deskripsi;?></td>
                                                            <td><?=$t->file;?></td>
                                                            <td><?=$t->deadline;?></td>
                                                            <td>
                                <a onclick="Edit(<?=$t->id_tugas;?>);" style="color: white">
                                                                  <button type="button" name="button" class="btn btn-primary btn-rounded btn-sm" aria-haspopup="true" aria-expanded="true" title="Edit Tugas">
                                              <i class="fa fa-edit"></i>
                                            </button>
                                </a>
                                <a href="<?=base_url()?>tugas/tugas_hapus/<?=$t->id_tugas?>" style="color: white" onclick="return confirm('Apakah yakin?')">
                                            <button type="button" name="button" class="btn btn-danger btn-rounded btn-sm" title="Hapus Materi">
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

<!-- Modal Tambah Tugas -->
<div class="modal fade" id="tambahtarif" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
  <div class="modal-dialog" role="document">
    <form class="form-horizontal" action="<?=base_url('Tugas/upload_tugas_guru')?>" method="post" enctype="multipart/form-data">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title">Tambah Tugas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
          
          <div class="form-group">
            <label for="exampleInputpwd_32" class="col-sm-3 control-label">File</label>
            <div class="col-sm-12">
              <div class="input-group">
                <div class="input-group-addon"><i class="icon-doc"></i></div>
                <input type="file" name="file_tugas" class="form_control">
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="exampleInputpwd_32" class="col-sm-3 control-label">Deskripsi</label>
            <div class="col-sm-12">
              <div class="input-group">
                <div class="input-group-addon"><i class="icon-wallet"></i></div>
                <input type="hidden" class="form-control" value="<?= $this->session->userdata('nama_guru') ?>" name="nama_guru" required="">
                <input type="hidden" class="form-control" value="<?= $this->session->userdata('nama_mapel') ?>" name="nama_mapel" required="">
                <input type="text" class="form-control" placeholder="Deskripsi" name="deskripsi" required="">
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="exampleInputpwd_32" class="col-sm-3 control-label">Deadline</label>
            <div class="col-sm-12">
              <div class="input-group">
                <div class="input-group-addon"><i class="icon-wallet"></i></div>
                <input type="date" class="form-control" name="deadline" required="">
              </div>
            </div>
          </div>

        </div>
        <div class="modal-footer">
          <div class="form-group mb-0">
            <div class="col-sm-offset-3 col-sm-9">
              <input type="submit" class="btn btn-info btn-rounded" value="Tambah" name="tambah">
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>

<!-- Modal Edit Tugas -->
<div class="modal fade" id="edittugas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
  <div class="modal-dialog" role="document">
    <form class="form-horizontal" action="<?=base_url('Tugas/tugas_ubah')?>" method="post" enctype="multipart/form-data">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title">Edit Tugas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
          <div class="form-group" id="tugas-preview">
              <div class="ml-3">
                  <span class="help-block"></span>
              </div>
          </div>
          <div class="form-group">
            <label for="exampleInputpwd_32" class="col-sm-3 control-label">Ubah File</label>
            <div class="col-sm-12">
              <div class="input-group">
                <div class="input-group-addon"><i class="icon-doc"></i></div>
                <input type="file" name="file_tugas" id="file_tugas" class="form_control">
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="exampleInputuname_3" class="col-sm-3 control-label">Deskripsi</label>
            <div class="col-sm-12">
              <div class="input-group">
                <div class="input-group-addon"><i class="icon-energy"></i></div>
                <input type="hidden" name="id_tugas" id="id_tugas">
                <input type="text" class="form-control" placeholder="Deskripsi" name="deskripsi" id="deskripsi" autocomplete="off" required="">
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="exampleInputuname_3" class="col-sm-3 control-label">Deadline</label>
            <div class="col-sm-12">
              <div class="input-group">
                <div class="input-group-addon"><i class="icon-wallet"></i></div>
                <input type="date" class="form-control" placeholder="Deadline" name="deadline" id="deadline" autocomplete="off" required="">
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <div class="form-group mb-0">
            <div class="col-sm-offset-3 col-sm-9">
              <input type="submit" class="btn btn-primary btn-rounded" value="Ubah" name="ubah">
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>

<script>
	 function Edit(id){
        $('#edittugas').modal('show');
        $.ajax({
            type  : 'GET',
            url   : '<?=base_url('tugas/get_tugas_id/')?>'+id,
            dataType : 'json',
            success : function(data){
                $('#id_tugas').val(data.id_tugas);
                $('#tugas-preview div').html('<b>File : </b>'+data.file);
                $('#deskripsi').val(data.deskripsi);
                $('#deadline').val(data.deadline);
            }
        });
    }
</script>