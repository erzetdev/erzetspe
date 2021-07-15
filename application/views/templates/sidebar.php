<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url() ?>">
                <div class="sidebar-brand-icon">
                    <i class="fas fa-book"></i>
                </div>
                <div class="sidebar-brand-text h3 mx-3">SI-AKAD</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item -->
            <!-- <li class="nav-item <?php echo ($this->uri->segment(2) == "dashboard" ? "active" : "") ?>">
                <a class="nav-link" href="<?= base_url('admin/dashboard') ?>">
                    <i class="fas fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li> -->
            <!-- Divider -->
            <!-- <hr class="sidebar-divider">
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fas fa-address-card"></i>
                    <span>Kelas</span></a>
            </li> -->
            <!-- <li class="nav-item <?php echo ($this->uri->segment(2) == "siswa" ? "active" : "") ?>">
                <a class="nav-link" href="<?= base_url('admin/siswa') ?>">
                    <i class="fas fa-user-graduate"></i>
                    <span>Siswa</span></a>
            </li> -->
            <!-- <li class="nav-item <?php echo ($this->uri->segment(2) == "guru" ? "active" : "") ?>">
                <a class="nav-link" href="<?= base_url('admin/guru') ?>">
                    <i class="fas fa-chalkboard-teacher"></i>
                    <span>Guru</span></a>
            </li> -->
            <!-- <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fas fa-address-card"></i>
                    <span>Mapel</span></a>
            </li> -->
            <!-- <li class="nav-item <?php echo ($this->uri->segment(2) == "nilai" || $this->uri->segment(2) == "lihat_nilai" || $this->uri->segment(2) == "input_nilai" ? "active" : "") ?>">
                <a class="nav-link" href="<?= base_url('admin/nilai') ?>">
                    <i class="fas fa-chart-bar"></i>
                    <span>Nila</span></a>
            </li> -->
            <!-- <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fas fa-print"></i>
                    <span>Cetak</span></a>
            </li> -->
            <?php
            $i = 0;
            if (isset($menu)) {
                foreach ($menu as $key => $m) {
            ?>
                    <li class="nav-item  <?php echo ($this->uri->segment(2) == strtolower($m->nama) ? "active" : "") ?>">
                        <a class="nav-link" href="<?= base_url($m->url) ?>">
                            <i class="<?= $m->icon ?>"></i>
                            <span><?= $m->nama ?></span></a>
                    </li>

            <?php

                }
            }
            ?>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('auth/logout') ?>">
                    <i class="fas fa-fw fa-sign-out-alt"></i>
                    <span>Logout</span></a>
            </li>

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->