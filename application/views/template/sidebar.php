<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
          </ul>
        </form>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
              <img alt="image" src="<?php echo base_url('assets') ?>/assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
              <div class="d-sm-none d-lg-inline-block">Hi, <?php echo $this->session->userdata("nama"); ?></div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
              <a href="<?php echo base_url('admin/data_admin') ?>" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Profile
              </a>
              <div class="dropdown-divider"></div>
              <a href="<?php echo base_url('login/logout'); ?>" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index.html">Titian Foundation</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">TF</a>
          </div>
          <?php if ($this->session->userdata('akses') == 'admin') { ?>
            <ul class="sidebar-menu">
              <li>
                <a class="nav-link" href="<?php echo base_url('admin/dashboard') ?>">
                  <i class="fas fa-fire"></i>
                  <span>Dashboard</span>
                </a>
              </li>
              <!-- <li>
              <a class="nav-link" href="<?php echo base_url('admin/data_admin') ?>">
                <i class="fas fa-user"></i>
                <span>Data Admin</span>
              </a>
            </li> -->
              <!-- <li>
                <a class="nav-link" href="<?php echo base_url('admin/data_siswa') ?>">
                  <i class="fas fa-users"></i>
                  <span>Data Siswa</span>
                </a>
              </li> -->
              <li>
                <a class="nav-link" href="<?php echo base_url('admin/data_kriteria') ?>">
                  <i class="fas fa-th"></i>
                  <span>Data Kriteria</span>
                </a>
              </li>
              <li>
                <a class="nav-link" href="<?php echo base_url('admin/data_periode') ?>">
                  <i class="fas fa-bolt"></i>
                  <span>Data Periode</span>
                </a>
              </li>
              <li>
                <a class="nav-link" href="<?php echo base_url('admin/data_nilai_alternatif') ?>">
                  <i class="fas fa-random"></i>
                  <span>Data Nilai Siswa</span>
                </a>
              </li>
              <!-- <li>
              <a class="nav-link" href="<?php echo base_url('admin/data_rangking') ?>">
                <i class="fas fa-clipboard-list"></i>
                <span>Data Rangking</span>
              </a>
            </li> -->
            </ul>
          <?php } ?>
          <?php if ($this->session->userdata('akses') == 'manajer') { ?>
            <ul class="sidebar-menu">
              <li>
                <a class="nav-link" href="<?php echo base_url('admin/dashboard') ?>">
                  <i class="fas fa-fire"></i>
                  <span>Dashboard</span>
                </a>
              </li>
              <li>
                <a class="nav-link" href="<?php echo base_url('admin/data_admin') ?>">
                  <i class="fas fa-user"></i>
                  <span>Data Admin</span>
                </a>
              </li>
              <!-- <li>
                <a class="nav-link" href="<?php echo base_url('admin/data_siswa') ?>">
                  <i class="fas fa-users"></i>
                  <span>Data Siswa</span>
                </a>
              </li> -->
              <!-- <li>
                <a class="nav-link" href="<?php echo base_url('admin/data_kriteria') ?>">
                  <i class="fas fa-th"></i>
                  <span>Kriteria</span>
                </a>
              </li> -->
              <!-- <li>
                <a class="nav-link" href="<?php echo base_url('admin/data_nilai') ?>">
                  <i class="fas fa-random"></i>
                  <span>Data Nilai Siswa</span>
                </a>
              </li> -->
              <li>
                <a class="nav-link" href="<?php echo base_url('admin/data_rangking') ?>">
                  <i class="fas fa-clipboard-list"></i>
                  <span>Data Rangking</span>
                </a>
              </li>
              <li>
                <a class="nav-link" href="<?php echo base_url('admin/data_rangking/keputusan/'); ?>">
                  <i class="fas fa-clipboard-list"></i>
                  <span>Data Keputusan</span>
                </a>
              </li>
            </ul>
          <?php } ?>
          <?php if ($this->session->userdata('akses') == 'superadmin') { ?>
            <ul class="sidebar-menu">
              <li>
                <a class="nav-link" href="<?php echo base_url('admin/dashboard') ?>">
                  <i class="fas fa-fire"></i>
                  <span>Dashboard</span>
                </a>
              </li>
              <li>
                <a class="nav-link" href="<?php echo base_url('admin/data_admin') ?>">
                  <i class="fas fa-user"></i>
                  <span>Data Admin</span>
                </a>
              </li>
              <!-- <li>
                <a class="nav-link" href="<?php echo base_url('admin/data_siswa') ?>">
                  <i class="fas fa-users"></i>
                  <span>Data Siswa</span>
                </a>
              </li> -->
              <li>
                <a class="nav-link" href="<?php echo base_url('admin/data_kriteria') ?>">
                  <i class="fas fa-th"></i>
                  <span>Data Kriteria</span>
                </a>
              </li>
              <li>
                <a class="nav-link" href="<?php echo base_url('admin/data_periode') ?>">
                  <i class="fas fa-bolt"></i>
                  <span>Data Periode</span>
                </a>
              </li>
              <li>
                <a class="nav-link" href="<?php echo base_url('admin/data_nilai_alternatif') ?>">
                  <i class="fas fa-random"></i>
                  <span>Data Nilai Siswa</span>
                </a>
              </li>
              <li>
                <a class="nav-link" href="<?php echo base_url('admin/data_rangking') ?>">
                  <i class="fas fa-clipboard-list"></i>
                  <span>Data Rangking</span>
                </a>
              </li>
              <li>
                <a class="nav-link" href="<?php echo base_url('admin/data_rangking/keputusan/'); ?>">
                  <i class="fas fa-laptop"></i>
                  <span>Data Keputusan</span>
                </a>
              </li>
            </ul>
          <?php } ?>
        </aside>
      </div>