<!-- Sidebar -->
<ul class="sidebar navbar-nav">
    <li class="nav-item <?php echo $this->uri->segment(2) == '' ? 'active': '' ?>">
        <a class="nav-link" href="<?=base_url('siswa'); ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>
    <li class="nav-item <?php echo $this->uri->segment(2) == '' ? 'active': '' ?>">
        <a class="nav-link" href="<?=base_url('tugas/datatugas')?>">
            <i class="fas fa-fw fa-book"></i>
            <span>Daftar Tugas</span>
        </a>
    </li>
    <li class="nav-item <?php echo $this->uri->segment(2) == '' ? 'active': '' ?>">
        <a class="nav-link" href="<?=base_url('ktugas/dataktugas')?>">
            <i class="fas fa-fw fa-list"></i>
            <span>Tugas Saya</span>
        </a>
    </li>
</ul>
