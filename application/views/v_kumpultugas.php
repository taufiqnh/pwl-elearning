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
						<h2>Data Tugas</h2>
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
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                if ($count > 0) {
                    foreach ($ktugas as $kt):
                ?>
                    <tr>
                                                            <td><?=$kt->file;?></td>
                                                            <td><?=$kt->catatan;?></td>
                                                            <td><?=$kt->nama_guru;?></td>
                                                            <td><?=$kt->tgl_kumpul;?></td>
                                                              <?php if ($kt->nilai == 0) { ?>
                                                            <td>Belum Dinilai</td>
                                                            <?php } else { ?>
                                                            <td><?=$kt->nilai;?></td>
                                                            <?php } ?>
                                                            <td>
                                <a onclick="Nilai(<?=$kt->id_ktugas;?>);" style="color: white">
                                                                  <button type="button" name="button" class="btn btn-primary btn-rounded btn-sm" aria-haspopup="true" aria-expanded="true" title="NILAI">
                                              <i class="fa fa-edit"></i>
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


<!-- Modal Nilai -->
<div class="modal fade" id="nilai" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
  <div class="modal-dialog" role="document">
    <form class="form-horizontal" action="<?=base_url('Ktugas/ktugas_ubah')?>" method="post">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title">Nilai</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
          <div class="form-group" id="photo-preview">
                            <div>
                            <span class="help-block"></span>
                            </div>
                        </div>
          <!-- <div class="form-group">
            <label for="exampleInputuname_3" class="col-sm-3 control-label">Nama Siswa</label>
            <div class="col-sm-12">
              <div class="input-group">
                <div class="input-group-addon"><i class="icon-energy"></i></div>
                <input type="hidden" name="id_ktugas" id="id_ktugas">
                <input type="text" class="form-control" name="nama_siswa" id="nama_siswa" autocomplete="off" required="">
              </div>
            </div>
          </div> -->
          <!-- <div class="form-group">
            <label for="exampleInputuname_3" class="col-sm-3 control-label">Kelas</label>
            <div class="col-sm-12">
              <div class="input-group">
                <div class="input-group-addon"><i class="icon-wallet"></i></div>
                <input type="text" class="form-control" name="kelas" id="kelas" autocomplete="off" required="">
              </div>
            </div>
          </div> -->
          <div class="form-group">
            <label for="exampleInputuname_3" class="col-sm-3 control-label">Nilai</label>
            <div class="col-sm-12">
              <div class="input-group">
                <div class="input-group-addon"><i class="icon-wallet"></i></div>
                <input type="hidden" name="id_ktugas" id="id_ktugas">
                <input type="number" class="form-control" name="nilai" id="nilai" autocomplete="off" required="">
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
  var base_url = '<?php echo base_url();?>';
	 function Nilai(id){
        $('#nilai').modal('show');
        $.ajax({
            type  : 'GET',
            url   : '<?=base_url('Ktugas/get_ktugas_id/')?>'+id,
            dataType : 'json',
            success : function(data){
                $('#id_ktugas').val(data.id_ktugas);
                $('#photo-preview div').html('<img src="'+base_url+'assets/k_tugas/'+data.file+'" class="card-img-top  rounded img-responsive">');
            }
        });
    }
</script>