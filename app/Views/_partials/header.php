<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>SIP Online</title>
    <style type="text/css" id="debugbar_dynamic_style"></style>
    <link rel="stylesheet" href="<?php echo base_url('themes/dist'); ?>/css/adminlte.min.css">
    <link rel="stylesheet" href="<?php echo base_url('themes/plugins'); ?>/fontawesome-free/css/all.min.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a type="button" class="btn btn-primary" data-toggle="modal" data-target="#userProfileModal"
                        id="loadProfile">
                        <i class="fa-solid fa-user"></i> <?php echo session()->get('nama'); ?>
                    </a>
                </li>
            </ul>
        </nav>

        <!-- Modal Show Profil -->
        <div class="modal fade" id="userProfileModal" tabindex="-1" aria-labelledby="userProfileModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-info text-white">
                        <h5 class="modal-title" id="userProfileModalLabel">Detail User</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <dl class="row">
                                    <dt class="col-sm-4">Nama</dt>
                                    <dd class="col-sm-8" id="userNama">-</dd>
                                    <dt class="col-sm-4">Jabatan</dt>
                                    <dd class="col-sm-8" id="userJabatan">-</dd>
                                    <dt class="col-sm-4">No HP</dt>
                                    <dd class="col-sm-8" id="userNoHp">-</dd>
                                    <dt class="col-sm-4">Alamat</dt>
                                    <dd class="col-sm-8" id="userAlamat">-</dd>
                                    <dt class="col-sm-4">Jenis Kelamin</dt>
                                    <dd class="col-sm-8" id="userJenisKelamin">-</dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-toggle="modal"
                            data-target="#editProfileModal" data-dismiss="modal" id="editProfileButton">
                            <i class="fas fa-edit"></i> Edit Profil
                        </button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Edit Profil -->
        <div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-info text-white">
                        <h5 class="modal-title" id="editProfileModalLabel">Edit Profil</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="<?php echo base_url('user/update'); ?>" method="post"
                            enctype="multipart/form-data">
                            <div class="row">
                                <input type="hidden" name="id_user" id="editUserId">
                                <input type="hidden" class="form-control" name="username" id="editUserNama">
                                <input type="hidden" class="form-control" name="status" id="editStatus">
                                <input type="hidden" class="form-control" name="jabatan" id="editUserJabatan">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input type="text" class="form-control" name="nama" id="editNama">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>No HP</label>
                                        <input type="text" class="form-control" name="no_tlp" id="editUserNoHp">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <input type="text" class="form-control" name="alamat" id="editUserAlamat">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Jenis Kelamin</label>
                                        <select name="jenis_kelamin" class="form-control" id="editUserJenisKelamin">
                                            <option value="">Pilih Jenis Kelamin</option>
                                            <option value="LAKI-LAKI">Laki-Laki</option>
                                            <option value="PEREMPUAN">Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>



        <!-- jQuery -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.bundle.min.js">
        </script>
        <script>
        // Event listener untuk tombol Show Profile
        $('#loadProfile').on('click', function() {
            $.ajax({
                url: '<?php echo base_url('user/showModalData'); ?>',
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    $('#userNama').text(data.user.nama);
                    $('#userJabatan').text(data.user.jabatan);
                    $('#userNoHp').text(data.user.no_tlp);
                    $('#userAlamat').text(data.user.alamat);
                    $('#userJenisKelamin').text(data.user.jenis_kelamin);
                }
            });
        });

        // Event listener untuk tombol Edit Profil
        $('#editProfileButton').on('click', function() {
            $.ajax({
                url: '<?php echo base_url('user/showModalData'); ?>',
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    // Set data ke form edit
                    $('#editUserId').val(data.user.id_user);
                    $('#editUserNama').val(data.user.username);
                    $('#editNama').val(data.user.nama);
                    $('#editStatus').val(data.user.status);
                    $('#editUserJabatan').val(data.user.jabatan);
                    $('#editUserNoHp').val(data.user.no_tlp);
                    $('#editUserAlamat').val(data.user.alamat);
                    $('#editUserJenisKelamin').val(data.user.jenis_kelamin);
                }
            });
        });
        </script>

    </div>
</body>

</html>