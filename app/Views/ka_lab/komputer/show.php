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
                                            <td><?php echo $komponen[0]['monitor']; ?></td>
                                        </tr>
                                        <tr>
                                            <th><i class="fas fa-microchip"></i> Prosesor</th>
                                            <td><?php echo $komponen[0]['prosesor']; ?></td>
                                        </tr>
                                        <tr>
                                            <th><i class="fas fa-memory"></i> RAM</th>
                                            <td><?php echo $komponen[0]['ram']; ?></td>
                                        </tr>
                                        <tr>
                                            <th><i class="fas fa-hdd"></i> Sistem Operasi</th>
                                            <td><?php echo $komponen[0]['os']; ?></td>
                                        </tr>
                                        <tr>
                                            <th><i class="fas fa-mouse-pointer"></i> Mouse</th>
                                            <td><?php echo $komponen[0]['mouse']; ?></td>
                                        </tr>
                                        <tr>
                                            <th><i class="fas fa-keyboard"></i> Keyboard</th>
                                            <td><?php echo $komponen[0]['keyboard']; ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>