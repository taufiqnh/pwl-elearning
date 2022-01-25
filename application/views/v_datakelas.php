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
						<button type="button" class="btn btn-info btn-rounded" data-toggle="modal" data-target="#tambahkelas" data-whatever="@mdo">Tambah</button>
					</div>
					<div class="card-body">

						<div class="table-responsive">
							<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
								<thead>
                  <tr>
                    <th>Nama Kelas</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                if ($count > 0) {
                    foreach ($kelas as $k):
                ?>
                    <tr>
                        <td><?=$k->nama_kelas;?></td>
                        <td>
                            <a onclick="Edit(<?=$k->id_kelas;?>);" style="color: white">
                                <button type="button" name="button" class="btn btn-primary btn-rounded btn-sm" aria-haspopup="true" aria-expanded="true" title="Edit kelas">
                                  <i class="fa fa-edit"></i>
                                </button>
                                </a>
                                <a href="<?=base_url()?>kelas/kelas_hapus/<?=$k->id_kelas?>" style="color: white" onclick="return confirm('Apakah yakin?')">
                                    <button type="button" name="button" class="btn btn-danger btn-rounded btn-sm" title="Hapus kelas">
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

<!-- Modal Tambah kelas -->
<div class="modal fade" id="tambahkelas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
  <div class="modal-dialog" role="document">
    <form class="form-horizontal" action="<?=base_url('kelas/kelas_tambah')?>" method="post">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title">Tambah Kelas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="exampleInputuname_3" class="col-sm-5 control-label">Nama Kelas</label>
            <div class="col-sm-12">
              <div class="input-group">
                <div class="input-group-addon"><i class="icon-user"></i></div>
                <input type="text" class="form-control" placeholder="Nama Kelas" name="nama_kelas" autocomplete="off" required="">
              </div>
            </div>
          </div>
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

<!-- Modal Edit kelas -->
<div class="modal fade" id="editkelas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
  <div class="modal-dialog" role="document">
    <form class="form-horizontal" action="<?=base_url('kelas/kelas_ubah')?>" method="post">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title">Edit Kelas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="exampleInputuname_3" class="col-sm-5 control-label">Nama Kelas</label>
            <div class="col-sm-12">
              <div class="input-group">
                <div class="input-group-addon"><i class="icon-user"></i></div>
                <input type="hidden" name="id_kelas" id="id_kelas">
                <input type="text" class="form-control" placeholder="Nama Kelas" name="nama_kelas" id="nama_kelas" autocomplete="off" required="">
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
	function Edit(id){
        $('#editkelas').modal('show');
        $.ajax({
            type  : 'GET',
            url   : '<?=base_url('kelas/get_kelas_id/')?>'+id,
            dataType : 'json',
            success : function(data){
                $('#id_kelas').val(data.id_kelas);
                $('#nama_kelas').val(data.nama_kelas);
            }
        });
    }
</script>