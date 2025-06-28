<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: #0D6EFD;">
    <a href="<?php echo base_url('/'); ?>" class="brand-link">
        <!-- <img src="<?php echo base_url('themes/dist'); ?>/img/AdminLTELogo.png" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8"> -->
        <span class="brand-text font-weight-light text-center">SIP-LAB</span>
    </a>
    <style>
    /* Tambahkan !important pada aturan CSS */
    .nav-sidebar .nav-link {
        color: #ffffff !important;
        /* Menambahkan warna font default */
    }

    .nav-sidebar .nav-link i {
        color: #ffffff !important;
        /* Menambahkan warna ikon default */
    }

    .nav-sidebar .nav-link.active {
        background-color: #fff !important;
        color: white !important;
    }

    .nav-sidebar .nav-link.active i {
        color: light !important;
    }

    .main-sidebar .nav-sidebar>.nav-item>.nav-link:hover {
        background-color: #fff !important;
        color: #000 !important;
    }

    .main-sidebar .nav-sidebar>.nav-item>.nav-link:hover i {
        color: #000 !important;
    }
    </style>
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info">
                <a href="" class="d-block" style="color: white; font-size: 18px;">Kepala Laboraturium</a>
            </div>
        </div>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="<?php echo base_url('home/index_kalab'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url('lab'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-landmark"></i>
                        <p>Laboratorium</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url('sop'); ?>" class="nav-link">
                        <i class="nav-icon fa-solid fa-clipboard-list"></i>
                        <p>SOP Pemeliharaan</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?php echo base_url('komputer'); ?>" class="nav-link">
                        <i class="nav-icon fas fa fa-desktop"></i>
                        <p>Komputer</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url('komponen'); ?>" class="nav-link">
                        <i style="color:white" class=" nav-icon fa-solid fas fa-screwdriver-wrench"></i>
                        <p>Komponen</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url('komputer/index3'); ?>" class="nav-link">
                        <i class="nav-icon fas fa fa-desktop"></i>
                        <p>Gudang</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url('user'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>Data Pengguna</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url('laporan'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-file-alt"></i>
                        <p>Laporan</p>
                    </a>
                </li>
                <li class="nav-header">ACCOUNT</li>
                <li class="nav-item">
                    <a href="<?php echo base_url('Login/logout'); ?>" class="nav-link"
                        onclick="return confirm('Apakah Anda yakin ingin logout?');">
                        <i class="nav-icon far fa-circle text-danger"></i>
                        <p class="text">Logout</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>