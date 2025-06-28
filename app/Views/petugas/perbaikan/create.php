<?php echo view('petugas/_partials/header'); ?>
<?php echo view('petugas/_partials/sidebar'); ?>

<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <!-- Kolom Detail Perbaikan -->
            <div class="col-md-6">
                <div class="card shadow-sm border border-light h-100">
                    <div class="card-header bg-primary text-white">
                        <h5 class="card-title">
                            Detail Kerusakan
                        </h5>
                    </div>
                    <div class="card-body">
                        <br>
                        <?php if (session()->getFlashdata('error_message')): ?>
                        <div class="alert alert-danger">
                            <?php echo session()->getFlashdata('error_message'); ?>
                        </div>
                        <?php endif; ?>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tbody>

                                    <tr>
                                        <th><i></i> Label Komputer</th>
                                        <td><?php echo $pemeliharaan[0]['label']; ?></td>
                                    </tr>
                                    <tr>
                                        <th> Kondisi </th>
                                        <td><?php echo $pemeliharaan[0]['hasil']; ?></td>
                                    </tr>
                                    <tr>
                                        <th> Kerusakan </th>
                                        <td><?php echo $pemeliharaan[0]['kerusakan']; ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Kolom Formulir Data -->
            <div class="col-md-6">
                <div class="card h-100">
                    <div class="card-header bg-primary text-white">
                        <h5 class="card-title">Detail Perbaikan</h5>
                    </div>
                    <div class="card-body">
                        <?php echo form_open_multipart('perbaikan/store'); ?>
                        <?php
                            $errors = session()->getFlashdata('errors');
                            if (!empty($errors)) { ?>
                        <div class="alert alert-danger" role="alert">
                            Whoops! Ada kesalahan saat input data, yaitu:
                            <ul>
                                <?php foreach ($errors as $error) : ?>
                                <li><?= esc($error) ?></li>
                                <?php endforeach ?>
                            </ul>
                        </div>
                        <?php } ?>
                        <input type="hidden" name="id_pemeliharaan"
                            value="<?php echo $pemeliharaan[0]['id_pemeliharaan']; ?>">
                        <input type="hidden" name="id_pc" value="<?php echo $pemeliharaan[0]['pc']; ?>">
                        <div class="form-group">
                            <label>Apakah Komputer Masih Bisa Diperbaiki?</label><br>
                            <label><input type="radio" name="kondisi" value="NORMAL" /> YA</label><br>
                            <label><input type="radio" name="kondisi" value="RUSAK" /> TIDAK</label>
                        </div>
                        <div class="form-group local-forms">
                            <label>Keterangan</label>
                            <input class="form-control" type="text" placeholder="Isikan kerusakan"
                                name="daftar_perbaikan">
                        </div>
                        <div class="student-submit">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>