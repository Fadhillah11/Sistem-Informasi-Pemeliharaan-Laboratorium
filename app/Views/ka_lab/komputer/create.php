<?php echo view('_partials/header') ?>
<?php echo view('_partials/sidebar') ?>
<div class="page-wrapper">
    <div class="content container-fluid">

        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Tambah Data Komputer</h1>
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
                            <?php echo form_open_multipart('komputer/store'); ?>
                            <div class="card">
                                <div class="card-body">
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
                                    <div class="row">
                                        <div class="col-12 col-sm-4">
                                            <input class="form-control" type="hidden" placeholder="Isikan Label"
                                                name="lab" value="<?php echo $idlab; ?>">
                                            <div class="form-group local-forms">
                                                <label>Label Komputer <span class="login-danger"></span></label>
                                                <input class="form-control" type="text" placeholder="Isikan Label"
                                                    name="label">
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Tahun <span class="login-danger"></span></label>
                                                <input class="form-control" type="text"
                                                    placeholder="isi tahun pembelian" name="tahun" pattern="\d+"
                                                    title="Hanya boleh diisi angka">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <h5 class="form-title student-info"> <span><a href="javascript:;"><i
                                                            class="feather-more-vertical"></i></a></span>
                                            </h5>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Monitor <span class="login-danger"></span></label>
                                                <input class="form-control" type="text"
                                                    placeholder="Isikan nama komponen" name="monitor" required>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Prosesor <span class="login-danger"></span></label>
                                                <input class="form-control" type="text"
                                                    placeholder="Isikan nama komponen" name="prosesor" required>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>RAM <span class="login-danger"></span></label>
                                                <input class="form-control" type="text"
                                                    placeholder="Isikan nama komponen" name="ram" required>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>operating system <span class="login-danger"></span></label>
                                                <input class="form-control" type="text"
                                                    placeholder="Isikan nama komponen" name="os" required>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Mouse <span class="login-danger"></span></label>
                                                <input class="form-control" type="text"
                                                    placeholder="Isikan nama komponen" name="mouse" required>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Keyboard <span class="login-danger"></span></label>
                                                <input class="form-control" type="text"
                                                    placeholder="Isikan nama komponen" name="keyboard" required>
                                            </div>
                                        </div>
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