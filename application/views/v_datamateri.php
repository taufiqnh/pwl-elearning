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
						<button type="button" class="btn btn-info btn-rounded" data-toggle="modal" data-target="#tambahmateri" data-whatever="@mdo">Tambah</button>
					</div>
					<div class="card-body">

						<div class="table-responsive">
							<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
								<thead>
                  <tr>
                    <th>Nama Guru</th>
                    <th>Nama Mapel</th>
                    <th>Video</th>
                    <th>Deskripsi</th>
                    <th>Kelas</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                if ($count > 0) {
                    foreach ($materi as $m):
                ?>
                    <tr>
                                                            <td><?=$m->nama_guru;?></td>
                                                            <td><?=$m->nama_mapel;?></td>
                                                            <td><?=$m->video;?></td>
                                                            <td><?=$m->deskripsi;?></td>
                                                            <td><?=$m->kelas;?></td>
                                                            <td>
                                <a onclick="Edit(<?=$m->id_materi;?>);" style="color: white">
                                                                  <button type="button" name="button" class="btn btn-primary btn-rounded btn-sm" aria-haspopup="true" aria-expanded="true" title="Edit Materi">
                                              <i class="fa fa-edit"></i>
                                            </button>
                                </a>
                                <a href="<?=base_url()?>materi/materi_hapus/<?=$m->id_materi?>" style="color: white" onclick="return confirm('Apakah yakin?')">
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

<!-- Modal Tambah Materi -->
<div class="modal fade" id="tambahmateri" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
  <div class="modal-dialog" role="document">
    <form class="form-horizontal" action="<?=base_url('materi/upload_materi')?>" method="post" enctype="multipart/form-data">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title">Tambah Materi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="exampleInputpwd_32" class="col-sm-5 control-label">Nama Guru</label>
            <div class="col-sm-12">
              <div class="input-group">
                <div class="input-group-addon"><i class="icon-energy"></i></div>
                <input type="hidden" class="form-control" value="<?= $this->session->userdata('nama_guru') ?>" name="nama_guru" autocomplete="off" required="">
                <input type="text" disabled="true" class="form-control" value="<?= $this->session->userdata('nama_guru') ?>" name="nama_guru" autocomplete="off" required="">
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="exampleInputpwd_32" class="col-sm-4 control-label">Mata Pelajaran</label>
            <div class="col-sm-12">
              <div class="input-group">
                <div class="input-group-addon"><i class="icon-wallet"></i></div>
                <input type="hidden" class="form-control" value="<?= $this->session->userdata('nama_mapel') ?>" name="nama_mapel" required="">
                <input type="text" disabled="true" class="form-control" value="<?= $this->session->userdata('nama_mapel') ?>" name="nama_mapel" required="">
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="exampleInputpwd_32" class="col-sm-3 control-label">Video</label>
            <div class="col-sm-12">
              <div class="input-group">
                <div class="input-group-addon"><i class="icon-doc"></i></div>
                <input type="file" name="video" class="form_control">
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="exampleInputpwd_32" class="col-sm-3 control-label">Deskripsi</label>
            <div class="col-sm-12">
              <div class="input-group">
                <div class="input-group-addon"><i class="icon-wallet"></i></div>
                <textarea class="form-control" rows="5" placeholder="Deskripsi" name="deskripsi" required=""></textarea>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="exampleInput_32" class="col-sm-5 control-label">Kelas</label>
            <div class="col-sm-12">
              <div class="input-group">
                 <select class="selectpicker form-control" data-style="form-control btn-default" name="kelas" required="">
                  <option>--Pilih--</option>        
                  <option value="7">7</option>
                  <option value="8">8</option>
                  <option value="9">9</option>
                  </select>
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

<!-- Modal Edit Materi -->
<div class="modal fade" id="editmateri" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
  <div class="modal-dialog" role="document">
    <form class="form-horizontal" action="<?=base_url('materi/materi_ubah')?>" method="post" enctype="multipart/form-data">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title">Edit Materi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="exampleInputuname_3" class="col-sm-5 control-label">Nama Guru</label>
            <div class="col-sm-12">
              <div class="input-group">
                <div class="input-group-addon"><i class="icon-energy"></i></div>
                <input type="hidden" name="id_materi" id="id_materi">
                <input type="hidden" name="vid" id="vid">
                <input type="text" disabled="true" class="form-control" value="<?= $this->session->userdata('nama_guru') ?>" name="nama_guru" autocomplete="off" required="">
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="exampleInputuname_3" class="col-sm-4 control-label">Mata Pelajaran</label>
            <div class="col-sm-12">
              <div class="input-group">
                <div class="input-group-addon"><i class="icon-wallet"></i></div>
                <input type="text" disabled="true" class="form-control" value="<?= $this->session->userdata('nama_mapel') ?>" name="nama_mapel" required="">
              </div>
            </div>
          </div> 
          <div class="form-group" id="video-preview">
              <div class="ml-3">
                  <span class="help-block"></span>
              </div>
          </div>
          <div class="form-group">
            <label for="exampleInputuname_3" class="col-sm-3 control-label">Ubah Video</label>
            <div class="col-sm-12">
              <div class="input-group">
                <div class="input-group-addon"><i class="icon-doc"></i></div>
                <input type="file" name="video" id="video" class="form_control">
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="exampleInputuname_3" class="col-sm-3 control-label">Deskripsi</label>
            <div class="col-sm-12">
              <div class="input-group">
                <div class="input-group-addon"><i class="icon-wallet"></i></div>
                <textarea class="form-control" rows="5" placeholder="Deskripsi" name="deskripsi" id="deskripsi" required=""></textarea>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="exampleInputuname_3" class="col-sm-5 control-label">Kelas</label>
            <div class="col-sm-12">
              <div class="input-group">
                 <select class="selectpicker form-control" data-style="form-control btn-default" name="kelas" id="kelas" required="">
                  <option>--Pilih--</option>        
                  <option value="7">7</option>
                  <option value="8">8</option>
                  <option value="9">9</option>
                  </select>
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
        $('#editmateri').modal('show');
        $.ajax({
            type  : 'GET',
            url   : '<?=base_url('materi/get_materi_id/')?>'+id,
            dataType : 'json',
            success : function(data){
                $('#id_materi').val(data.id_materi);
                $('#vid').val(data.video);
                $('#video-preview div').html('<b>Video : </b>'+data.video);
                $('#deskripsi').val(data.deskripsi);
                $('#kelas').val(data.kelas).change();
            }
        });
    }
</script>
<script src="<?=base_url()?>asset/vendors/bower_components/sweetalert/dist/sweetalert.min.js"></script>
<script src="<?=base_url()?>asset/dist/js/sweetalert-data.js"></script>