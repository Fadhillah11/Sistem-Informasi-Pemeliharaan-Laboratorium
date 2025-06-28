<?php echo view('_partials/header'); ?>
<?php echo view('_partials/sidebar'); ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-4">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Dashboard</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- Revenue Card -->
                <a href="<?php echo base_url('user'); ?>" class="col-lg-4 col-md-6 mb-4 text-decoration-none">
                    <div class="card bg-primary shadow h-100 py-3 text-white">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-4">
                                    <i class="nav-icon fas fa-user fa-3x"></i>
                                </div>
                                <div class="col-8 text-right">
                                    <h6 class="text-uppercase font-weight-bold">Jumlah Pengguna</h6>
                                    <h3><?php echo $jumlahUser; ?> Pengguna</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>

                <!-- Sales Card -->
                <a href="<?php echo base_url('lab'); ?>" class="col-lg-4 col-md-6 mb-4 text-decoration-none">
                    <div class="card bg-success shadow h-100 py-3 text-white">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-4">
                                    <i class="fas fa-building fa-3x"></i>
                                </div>
                                <div class="col-8 text-right">
                                    <h6 class="text-uppercase font-weight-bold">Jumlah Laboratorium</h6>
                                    <h3><?php echo $jumlahLab; ?> Laboratorium</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>

                <!-- Products Card -->
                <a href="<?php echo base_url('komputer'); ?>" class="col-lg-4 col-md-6 mb-4 text-decoration-none">
                    <div class="card bg-info shadow h-100 py-3 text-white">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-4">
                                    <i class="fas fa-desktop fa-3x"></i>
                                </div>
                                <div class="col-8 text-right">
                                    <h6 class="text-uppercase font-weight-bold">Jumlah Komputer</h6>
                                    <h3><?php echo $jumlahKomputer; ?> Komputer</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>

</div>
</div>
</div>
</div>

<?php echo view('_partials/footer'); ?>