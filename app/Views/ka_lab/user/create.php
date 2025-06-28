<?php echo view('_partials/header') ?>
<?php echo view('_partials/sidebar') ?>
<div class="page-wrapper">
    <div class="content container-fluid">

        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Tambah User</h1>
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
                            <?php echo form_open_multipart('user/store'); ?>
                            <div class="card">
                                <div class="card-body">
                                    <?php
                                // if (!empty($inputs)){
                                //   $inputs = session()->getFlashdata('inputs');
                                //}
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
                                            <h5 class="form-title student-info">Informasi User <span><a
                                                        href="javascript:;"><i
                                                            class="feather-more-vertical"></i></a></span>
                                            </h5>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Username <span class="login-danger"></span></label>
                                                <input class="form-control" type="text" placeholder="Isikan username"
                                                    name="username"
                                                    value="<?php  //echo $inputs['username']; }
                                                                                                                                            ?>">
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Password <span class="login-danger"></span></label>
                                                <input class="form-control" type="text" placeholder="Isikan password"
                                                    name="password"
                                                    value="<?php  //echo $inputs['password']; }
                                                                                                                                            ?>">
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Nama <span class="login-danger"></span></label>
                                                <input class="form-control" type="text" placeholder="Isikan nama"
                                                    name="nama"
                                                    value="<?php  //echo $inputs['nama']; }
                                                                                                                                        ?>">
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Jabatan <span class="login-danger"></span></label>
                                                <select name="jabatan" class="form-control select">
                                                    <option value="">Pilih jabatan</option>
                                                    <option <?php //echo $inputs['jabatan'] == "KALAB" ? "selected" : ""; 
                                                        ?> value="KALAB">Kepala LAB</option>
                                                    <option <?php //echo $inputs['jabatan'] == "KAPRO" ? "selected" : ""; 
                                                        ?> value="KAPRO">Kepala Program Keahlian</option>
                                                    <option <?php //echo $inputs['jabatan'] == "PETUGAS" ? "selected" : ""; 
                                                        ?> value="PETUGAS">Petugas</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>No HP</label>
                                                <input class="form-control" type="text" placeholder="Isikan No HP"
                                                    name="no_tlp" pattern="\d*" title="Hanya boleh angka"
                                                    value="<?php //echo $inputs['no_tlp']; ?>">
                                            </div>
                                        </div>

                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Alamat </label>
                                                <input class="form-control" type="text" placeholder="Isikan alamat "
                                                    name="alamat"
                                                    value="<?php  //echo $inputs['alamat']; }
                                                                                                                                    ?>">
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group">
                                                <label for="">Jenis Kelamin</label>
                                                <select name="jenis_kelamin" id="" class="form-control">
                                                    <option value="">Pilih Jenis Kelamin</option>
                                                    <option <?php //echo $inputs['jenis_kelamin'] == "LAKI-LAKI" ? "selected" : ""; 
                                                ?> value="LAKI-LAKI">LAKI-LAKI</option>
                                                    <option <?php //echo $inputs['jenis_kelamin'] == "PEREMPUAN" ? "selected" : ""; 
                                                ?> value="PEREMPUAN">PEREMPUAN</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group">
                                                <label for="">Status</label>
                                                <select name="status" id="" class="form-control">
                                                    <option value="">Pilih Jenis Status</option>
                                                    <option <?php //echo $inputs['status'] == "active" ? "selected" : ""; 
                                                ?> value="active">active</option>
                                                    <option <?php //echo $inputs['status'] == "inactive" ? "selected" : ""; 
                                                ?> value="inactive">inactive</option>
                                                </select>
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