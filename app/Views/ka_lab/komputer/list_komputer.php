<?php echo view('_partials/header') ?>
<?php echo view('_partials/sidebar') ?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <div class="page-sub-header">
                        <h3 class="page-title">Data Komputer </h3>

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

                                    <a href="<?php echo base_url('komputer/create/' . $idlab); ?>"
                                        class="btn btn-outline-primary me-2"><i class="fas fa-plus"></i> Tambah</a>

                                </div>
                            </div>
                        </div>
                        <!-- Untuk menampilkan pesan error saat di hapus (try catch) -->
                        <?php if (session()->getFlashdata('error')): ?>
                        <div class="alert alert-danger">
                            <?php echo session()->getFlashdata('error'); ?>
                        </div>
                        <?php endif; ?>

                        <?php if (session()->getFlashdata('success')): ?>
                        <div class="alert alert-success">
                            <?php echo session()->getFlashdata('success'); ?>
                        </div>
                        <?php endif; ?>
                        <!-- batas view u/ try catch -->
                        <div class="table-responsive">
                            <table
                                class="table border-0 star-student table-hover table-center mb-0 datatable table-striped">
                                <thead class="student-thread" style="background-color: #007bff; color: white;">
                                    <tr>
                                        <th>No</th>
                                        <th>Label Komputer</th>
                                        <th>Lab </th>
                                        <th>Tahun </th>
                                        <th>Kondisi </th>
                                        <th class="text-end">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $counter = 1; // Variabel untuk nomor urut
                                    foreach ($komputer as $key => $row) {
                                        if ($row['kondisi'] === 'RUSAK') {
                                            continue;
                                        }
                                    ?>
                                    <tr>
                                        <td><?php echo $counter++; ?></td>
                                        <td><?php echo $row['label']; ?></td>
                                        <td><?php echo $row['nama_lab']; ?></td>
                                        <td><?php echo $row['tahun']; ?></td>
                                        <td><?php echo $row['kondisi']; ?></td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="<?php echo base_url('komputer/show_komputer/'.$row['id_lab'].'/'. $row['id_pc']); ?>"
                                                    class="btn btn-sm btn-primary">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                                <a href="<?php echo base_url('komputer/edit/'. $row['id_pc'].'/'.$idlab); ?>"
                                                    class="btn btn-sm btn-success">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a href="<?php echo base_url('komputer/delete/' . $row['id_pc'].'/'.$idlab); ?>"
                                                    class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Apakah Anda yakin ?');">
                                                    <i class="fa fa-trash-alt"></i>
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