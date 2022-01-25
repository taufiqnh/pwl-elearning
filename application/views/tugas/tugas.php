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
            <div class="container-fluid">

        
        <div class="container">
        <div class="bg-white mx-auto p-4">
            <div class="row" style="color: black; font-family: 'poppins';">
                <div class="col-md-12 mt-1">
                    <h1 class="display-4" style="color: black; font-family:'poppins';">Selamat Mengerjakan Tugas !
                    </h1>
                    <h3>Halo, <?php
                            $data['user'] = $this->db->get_where('siswa', ['email' =>
                            $this->session->userdata('email')])->row_array();
                            echo $data['user']['nama_siswa'];
                            ?></h3>
                        <p><?= $detail->nama_mapel ?> </p>
                        <hr align="left" width="600;">
                        <p class="font-weight-bold mt--5">
                            <?= $detail->deskripsi; ?>

                        </p>
                </div>
            </div>
        </div>
        </div>
                
        <!-- Start PDF View -->
        <div class="container">
        <div class="row">
            <div class="col-md-12 mx-auto mt-4">
                <embed type="application/pdf" src="<?= base_url() . 'assets/tugas/' . $detail->file; ?>" width="1150" height="720"></embed>
            </div>
        </div>
    </div>

    <div class="card-body p-4">
        <h1 class="card-title display-4"><!-- <?= $detail->nama_guru; ?> --> Upload File Jawaban</h1>
    <form method="post" action="<?=base_url('tugas/upload_tugas')?>" enctype="multipart/form-data">
                        <div class="form-group">
                        <label for="exampleInputpwd_32" class="control-label">Upload Jawaban Disini</label>
                        <div>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="icon-doc"></i></div>
                                <input type="file" name="jawaban" class="form_control">
                            </div>
                        </div>
                    </div>
                        <div class="form-group">
                            <div class="input-group">
                                <input type="hidden" class="form-control" name="id_tugas" autocomplete="off" value="<?= $detail->id_tugas; ?>">
                                <input type="hidden" class="form-control" name="id_siswa" autocomplete="off" value="<?= $this->session->userdata('id_siswa') ?>">
                                <input type="hidden" class="form-control" name="nama_guru" autocomplete="off" value="<?= $detail->nama_guru; ?>">
                                <input type="hidden" class="form-control" name="tgl_kumpul" autocomplete="off" value="<?php 
                                date_default_timezone_set("Asia/Jakarta");
                                echo date('Y-m-d  H:i:s') ?>">
                                <input type="text" class="form-control" placeholder="Catatan" name="catatan" autocomplete="off" required="">
                            </div>
                        </div>
                        <div class="form-group">                
                            <button type="submit" class="btn btn-success btn-lg btn-block"> Submit</button>
                        </div>
    </form>
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
