<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view("admin/_partials/head.php") ?>
    <script src="https://cdn.jsdelivr.net/npm/afterglowplayer@1.x"></script>
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
                        
                </div>
                <?php if ($this->session->flashdata('pesan') != null): ?>
                    <div class="alert alert-warning"><?= $this->session->flashdata('pesan');?></div>
                <?php endif ?>
            </div>
        </div>
        </div>
                
        <div class="card mb-3 mx-4">
                    <div class="card-header">
                        <h2>Daftar Tugas</h2>
                    </div>
                    <div class="card-body">


            <div class="container">
            <div class="row mt-4">
            <?php foreach ($tugas as $t) { ?>
                <div class="col-md-6 mb-4" data-aos="fade-right" data-aos-duration="1200">
                    <div class="card">
                        <div class="card-body p-4">
                            <h3 class="card-title">Nama Guru : <?= $t->nama_guru; ?></h3>
                            <h4>Mata Pelajaran : <?= $t->nama_mapel; ?></h4>
                            <p class=" card-text">
                                <?= substr($t->deskripsi, 0, 100); ?>&nbsp;.&nbsp;.&nbsp;.&nbsp;.&nbsp;.&nbsp;.&nbsp;.&nbsp;.
                            </p>
                            <h5>Deadline : 
                                <?= $t->deadline; ?>
                            </h5>
                            <a href="<?php echo site_url('tugas/tugas/' . $t->id_tugas); ?>"class="btn btn-primary">Lihat Tugas !</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
          </div>
          </div>

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
