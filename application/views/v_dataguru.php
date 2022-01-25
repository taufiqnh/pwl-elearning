
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
						<button type="button" class="btn btn-info btn-rounded" data-toggle="modal" data-target="#tambahguru" data-whatever="@mdo">Tambah</button>
					</div>
					<div class="card-body">

						<div class="table-responsive">
							<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
								<thead>
                  <tr>
                    <th>NIP</th>
                    <th>Nama Guru</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Nama Mapel</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                if ($count > 0) {
                    foreach ($guru as $g):
                ?>
                    <tr>
                        <td><?=$g->nip;?></td>
                        <td><?=$g->nama_guru;?></td>
                        <td><?=$g->email;?></td>
                        <td>Terenkripsi</td>
                        <td><?=$g->nama_mapel;?></td>
                        <td>
                            <a onclick="Edit(<?=$g->id_guru;?>);" style="color: white">
                                <button type="button" name="button" class="btn btn-primary btn-rounded btn-sm" aria-haspopup="true" aria-expanded="true" title="Edit Guru">
                                  <i class="fa fa-edit"></i>
                                </button>
                                </a>
                                <a href="<?=base_url()?>guru/guru_hapus/<?=$g->id_guru?>" style="color: white" onclick="return confirm('Apakah yakin?')">
                                    <button type="button" name="button" class="btn btn-danger btn-rounded btn-sm" title="Hapus Guru">
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

<!-- Modal Tambah Guru -->
<div class="modal fade" id="tambahguru" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
  <div class="modal-dialog" role="document">
    <form class="form-horizontal" action="<?=base_url('guru/guru_tambah')?>" method="post">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title">Tambah Guru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="exampleInput_32" class="col-sm-5 control-label">NIP</label>
            <div class="col-sm-12">
              <div class="input-group">
                <div class="input-group-addon"><i class="icon-user"></i></div>
                <input type="text" class="form-control" placeholder="NIP" name="nip" autocomplete="off" required="">
              </div>
            </div>
          </div>

          <div class="form-group">
            <label for="exampleInput_32" class="col-sm-5 control-label">Nama Guru</label>
            <div class="col-sm-12">
              <div class="input-group">
                <div class="input-group-addon"><i class="icon-user"></i></div>
                <input type="text" class="form-control" placeholder="Nama Guru" name="nama_guru" autocomplete="off" required="">
              </div>
            </div>
          </div>

          <div class="form-group">
            <label for="exampleInput_32exampleInput_32" class="col-sm-5 control-label">Email</label>
            <div class="col-sm-12">
              <div class="input-group">
                <div class="input-group-addon"><i class="icon-user"></i></div>
                <input type="text" class="form-control" placeholder="Email" name="email" autocomplete="off" required="">
              </div>
            </div>
          </div>

          <div class="form-group">
            <label for="exampleInputpwd_32" class="col-sm-5 control-label">Password</label>
            <div class="col-sm-12">
              <div class="input-group">
                <div class="input-group-addon"><i class="icon-user"></i></div>
                <input type="password" class="form-control" placeholder="Password" name="password" autocomplete="off" required="">
              </div>
            </div>
          </div>

          <div class="form-group">
            <label for="exampleInput_32" class="col-sm-5 control-label">Nama Mapel</label>
            <div class="col-sm-12">
              <div class="input-group">
                 <select class="selectpicker form-control" data-style="form-control btn-default" name="nama_mapel" required="">
                  <option>--Pilih--</option>        
                  <option value="Matematika">Matematika</option>
                  <option value="IPA">IPA</option>
                  <option value="Bahasa Inggris">Bahasa Inggris</option>
                  <option value="Bahasa Indonesia">Bahasa Indonesia</option>
                  <option value="Pendidikan Agama Islam">Pendidikan Agama Islam</option>
                  </select>
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

<!-- Modal Edit Guru -->
<div class="modal fade" id="editguru" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
  <div class="modal-dialog" role="document">
    <form class="form-horizontal" action="<?=base_url('guru/guru_ubah')?>" method="post">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title">Edit Guru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="exampleInput_32" class="col-sm-5 control-label">NIP</label>
            <div class="col-sm-12">
              <div class="input-group">
                <div class="input-group-addon"><i class="icon-user"></i></div>
                <input type="hidden" name="id_guru" id="id_guru">
                <input type="text" class="form-control" placeholder="NIP" name="nip" id="nip" autocomplete="off" required="">
              </div>
            </div>
          </div>

          <div class="form-group">
            <label for="exampleInput_32" class="col-sm-5 control-label">Nama Guru</label>
            <div class="col-sm-12">
              <div class="input-group">
                <div class="input-group-addon"><i class="icon-user"></i></div>
                <input type="text" class="form-control" placeholder="Nama Guru" name="nama_guru" id="nama_guru" autocomplete="off" required="">
              </div>
            </div>
          </div>

          <div class="form-group">
            <label for="exampleInput_32" class="col-sm-5 control-label">Email</label>
            <div class="col-sm-12">
              <div class="input-group">
                <div class="input-group-addon"><i class="icon-user"></i></div>
                <input type="text" class="form-control" placeholder="Email" name="email" id="email" autocomplete="off" required="">
              </div>
            </div>
          </div>

          <div class="form-group">
            <label for="exampleInputpwd_32" class="col-sm-5 control-label">Password</label>
            <div class="col-sm-12">
              <div class="input-group">
                <div class="input-group-addon"><i class="icon-user"></i></div>
                <input type="password" class="form-control" placeholder="Password" name="password" id="password" autocomplete="off" required="">
              </div>
            </div>
          </div>

          <div class="form-group">
            <label for="exampleInput_32" class="col-sm-5 control-label">Nama Mapel</label>
            <div class="col-sm-12">
              <div class="input-group">
                <select class="selectpicker form-control" data-style="form-control btn-default" name="nama_mapel" id="nama_mapel" required="">
                  <option>--Pilih--</option>        
                  <option value="Matematika">Matematika</option>
                  <option value="IPA">IPA</option>
                  <option value="Bahasa Inggris">Bahasa Inggris</option>
                  <option value="Bahasa Indonesia">Bahasa Indonesia</option>
                  <option value="Pendidikan Agama Islam">Pendidikan Agama Islam</option>
                </select>
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
        $('#editguru').modal('show');
        $.ajax({
            type  : 'GET',
            url   : '<?=base_url('guru/get_guru_id/')?>'+id,
            dataType : 'json',
            success : function(data){
                $('#id_guru').val(data.id_guru);
                $('#nip').val(data.nip);
                $('#nama_guru').val(data.nama_guru);
                $('#email').val(data.email);
                $('#password').val(data.password);
                $('#nama_mapel').val(data.nama_mapel).change();
            }
        });
    }
</script>
<script src="<?=base_url()?>asset/vendors/bower_components/sweetalert/dist/sweetalert.min.js"></script>
<script src="<?=base_url()?>asset/dist/js/sweetalert-data.js"></script>