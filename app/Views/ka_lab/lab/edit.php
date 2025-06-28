<?php echo view('_partials/header') ?>
<?php echo view('_partials/sidebar') ?>
<div class="page-wrapper">
    <div class="content container-fluid">

        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Edit Data Lab</h1>
                        </div>
                        <div class="col-sm-6">
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="card comman-shadow">
                        <div class="card-body">
                            <?php echo form_open_multipart('lab/update'); ?>
                            <div class="card">
                                <div class="card-body">
                                    <?php
        // Menampilkan pesan error jika ada
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
                                    <div class="row">
                                        <div class="col-12">
                                            <h5 class="form-title student-info">Informasi Laboraturium <span><a
                                                        href="javascript:;"><i
                                                            class="feather-more-vertical"></i></a></span></h5>
                                        </div>

                                        <!-- Input hidden untuk ID lab -->
                                        <input class="form-control" type="hidden" name="id_lab"
                                            value="<?php echo $user['id_lab']; ?>">

                                        <!-- Input untuk Nama Laboratorium -->
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Nama Laboratorium <span class="login-danger"></span></label>
                                                <input class="form-control" type="text" name="nama_lab"
                                                    value="<?php echo $user['nama_lab']; ?>">
                                            </div>
                                        </div>

                                        <!-- Dropdown untuk KAPRO -->
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>KAPRO<span class="login-danger">*</span></label>
                                                <select class="form-control select" name="kapro">
                                                    <?php foreach ($nama as $key => $row) { ?>
                                                    <option value="<?= $row['id_user']; ?>"
                                                        <?php if ($row['id_user'] == $user['kapro']) { echo 'selected'; } ?>>
                                                        <?= $row['nama']; ?>
                                                    </option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>

                                        <!-- Tombol Submit -->
                                        <div class="col-12">
                                            <div class="student-submit">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <?php echo form_close(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>