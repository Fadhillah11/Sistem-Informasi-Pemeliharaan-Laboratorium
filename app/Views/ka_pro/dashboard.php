<?php echo view('ka_pro/_partials/header'); ?>
<?php echo view('ka_pro/_partials/sidebar'); ?>

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
                <div class="col-lg-4 col-md-6 mb-4">
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
                </div>

                <!-- Sales Card -->
                <div class="col-lg-4 col-md-6 mb-4">
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
                </div>

                <!-- Products Card -->
                <div class="col-lg-4 col-md-6 mb-4">
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
                </div>
            </div>
        </div>
    </div>
</div>

<?php echo view('ka_pro/_partials/footer'); ?>