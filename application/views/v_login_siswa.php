<?php
if ($this->session->userdata('login') == TRUE){
   redirect('siswa/dashboard');
}
?>
<title>Selamat Datang!</title>
<link href="<?=base_url('assets/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet" id="bootstrap-css">
<link href="<?=base_url('assets/bootstrap/css/css.css') ?>" rel="stylesheet" id="bootstrap-css">
<script src="<?=base_url('assets/bootstrap/js/bootstrap.min.js') ?>"></script>
<script src="<?=base_url('assets/bootstrap/js/jquery.min.js') ?>"></script>
<link rel="icon" type="image/png" href="<?=base_url()?>assets/logo.png">

<!------ Include the above in your HEAD tag ---------->

<div class="sidenav">
         <div class="login-main-text">
         </div>
      </div>
      <div class="main">
         <div class="col-md-5 col-sm-12">
            <div class="login-form">
               <form action="<?=base_url('siswa/siswa_login')?>" method="post">
                  <h1>Login Siswa</h1>
                  <div class="form-group">
                     <label>Email</label>
                     <input name ="email" type="text" class="form-control" placeholder="Email">
                  </div>
                  <div class="form-group">
                     <label>Password</label>
                     <input name ="password" type="password" class="form-control" placeholder="Password">
                  </div>
                  <button type="submit" class="btn btn-black">Login</button>
                  <!-- <a class="btn btn-secondary" href="<?=base_url('Pelanggan/register')?>">Daftar</a> -->
               </form>
               <?php if ($this->session->flashdata('pesan') != null): ?>
				   <div class="alert alert-warning"><?= $this->session->flashdata('pesan');?></div>
				   <?php endif ?>
            </div>
         </div>
      </div>