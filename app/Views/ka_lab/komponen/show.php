<?php echo view('_partials/header') ?>
<?php echo view('_partials/sidebar') ?>
<div class="content-wrapper">

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card shadow-sm border border-light">
                        <div class="card-header bg-primary text-white">
                            <h5 class="card-title"><i class="fas fa-desktop"></i> Detail Komponen Komputer</h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <th><i class="fas fa-tv"></i> Monitor</th>
                                            <td><?php echo $komponen['monitor']; ?></td>
                                        </tr>
                                        <tr>
                                            <th><i class="fas fa-microchip"></i> Prosesor</th>
                                            <td><?php echo $komponen['prosesor']; ?></td>
                                        </tr>
                                        <tr>
                                            <th><i class="fas fa-memory"></i> RAM</th>
                                            <td><?php echo $komponen['ram']; ?></td>
                                        </tr>
                                        <tr>
                                            <th><i class="fas fa-hdd"></i> Sistem Operasi</th>
                                            <td><?php echo $komponen['os']; ?></td>
                                        </tr>
                                        <tr>
                                            <th><i class="fas fa-mouse-pointer"></i> Mouse</th>
                                            <td><?php echo $komponen['mouse']; ?></td>
                                        </tr>
                                        <tr>
                                            <th><i class="fas fa-keyboard"></i> Keyboard</th>
                                            <td><?php echo $komponen['keyboard']; ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer text-muted">
                            Terakhir diperbarui: <?php echo date('Y-m-d'); ?>
                            <a href="<?php echo base_url('komponen/edit/' . $komponen['id_komponen']); ?>"
                                class="btn  btn-success float-right ml-2">
                                <i class="fa fa-edit"></i> Edit
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>