<?php echo view('petugas/_partials/header') ?>
<?php echo view('petugas/_partials/sidebar') ?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <div class="page-sub-header">
                        <h3 class="page-title">Data Laboratorium</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card card-table comman-shadow">
                    <div class="card-body">
                        <div class="row">
                            <?php foreach ($lab as $key => $row) { ?>
                            <div class="col-md-3 mb-1">
                                <div class="card h-100 text-center">
                                    <div class="card-body">
                                        <!-- Gambar Lab -->
                                        <img src="<?php echo base_url('themes'); ?>/docs/assets/img/komputer.png"
                                            class="img-fluid mb-1" alt="Lab <?php echo $key + 1; ?>"
                                            style="width: 75%; height: 150px; object-fit: cover;">
                                        <p class="card-text" style="font-size:30px">
                                            <strong> <?php echo $row['nama_lab']; ?> </strong>
                                        </p>
                                        <a href="<?php echo base_url('komputer/index2_petugas/'. $row['id_lab']); ?>"
                                            class="btn btn-primary">Pilih</a>
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
</div>