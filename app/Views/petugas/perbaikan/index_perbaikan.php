<?php echo view('petugas/_partials/header'); ?>
<?php echo view('petugas/_partials/sidebar'); ?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <div class="page-sub-header">
                        <h3 class="page-title">Data Perbaikan</h3>

                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card card-table comman-shadow">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table
                                class="table border-0 star-student table-hover table-center mb-0 datatable table-striped">
                                <thead class="student-thread" style="background-color: #007bff; color: white;">
                                    <tr>
                                        <th>No</th>
                                        <th>Label Komputer</th>
                                        <th>Petugas </th>
                                        <th>Hasil Pemeliharaan</th>
                                        <th class="text-end">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($pemeliharaan as $key => $row) { ?>
                                    <tr>
                                        <td><?php echo $key + 1; ?></td>
                                        <td><?php echo $row['label']; ?></td>
                                        <td><?php echo $row['nama']; ?></td>
                                        <td><?php echo $row['hasil']; ?></td>
                                        <td>
                                            <div class="btn-group">

                                                <a href="<?php echo base_url('perbaikan/create/'. $row['id_pemeliharaan']); ?>"
                                                    class="btn btn-sm btn-success">Perbaiki
                                                </a>

                                            </div>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>