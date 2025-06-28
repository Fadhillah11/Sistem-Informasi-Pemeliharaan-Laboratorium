<?php echo view('_partials/header') ?>
<?php echo view('_partials/sidebar') ?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <div class="page-sub-header">
                        <h3 class="page-title">Data User </h3>

                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card card-table comman-shadow">
                    <div class="card-body">

                        <div class="page-header">
                            <div class="row align-items-center">

                                <div class="col-auto text-end float-end ms-auto download-grp">

                                    <a href="<?php echo base_url('user/create'); ?>"
                                        class="btn btn-outline-primary me-2"><i class="fas fa-plus"></i> Tambah</a>

                                </div>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table
                                class="table border-0 star-student table-hover table-center mb-0 datatable table-striped">
                                <thead class="student-thread" style="background-color: #007bff; color: white;">
                                    <tr>
                                        <th>No</th>
                                        <th>Username</th>
                                        <th>Nama</th>
                                        <th>Jabatan</th>
                                        <th>No HP</th>
                                        <th>Alamat</th>
                                        <th>Jenis kelamin</th>
                                        <th>Status</th>
                                        <th class="text-end">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($user as $key => $row) { ?>
                                    <tr>
                                        <td><?php echo $key + 1; ?></td>
                                        <td><?php echo $row['username']; ?></td>
                                        <td><?php echo $row['nama']; ?></td>
                                        <td><?php echo $row['jabatan']; ?></td>
                                        <td><?php echo $row['no_tlp']; ?></td>
                                        <td><?php echo $row['alamat']; ?></td>
                                        <td><?php echo $row['jenis_kelamin']; ?></td>
                                        <td><?php echo $row['status']; ?></td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="<?php echo base_url('user/edit/'. $row['id_user']); ?>"
                                                    class="btn btn-sm btn-success">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <!-- <a href="<?php echo base_url('user/delete/' . $row['id_user']); ?>"
                                                    class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Apakah Anda yakin ?');">
                                                    <i class="fa fa-trash-alt"></i>
                                                </a> -->
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