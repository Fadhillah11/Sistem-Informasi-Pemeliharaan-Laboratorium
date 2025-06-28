<?php echo view('petugas/_partials/header'); ?>
<?php echo view('petugas/_partials/sidebar'); ?>
<div class="content-wrapper">
    <?php if (session()->getFlashdata('error_message')): ?>
    <div class="alert alert-danger">
        <?= session()->getFlashdata('error_message'); ?>
    </div>
    <?php endif; ?>

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <div class="page-sub-header">
                        <h3 class="page-title">Data SOP Pemeliharaan</h3>
                    </div>
                </div>
            </div>
        </div>

        <!-- Form starts -->
        <form method="post" action="<?php echo base_url('pemeliharaan/store'); ?>" id="pemeliharaanForm">
            <!-- Tambahkan id untuk form -->
            <div class="row">
                <div class="col-sm-12">
                    <input type="hidden" name="pc" value="<?php echo $idpc; ?>">
                    <input type="hidden" name="lab" value="<?php echo $idlab; ?>">
                    <div class="card card-table comman-shadow">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table
                                    class="table border-0 star-student table-hover table-center mb-0 datatable table-striped">
                                    <thead class="student-thread" style="background-color:#a0a7ad; color: white;">
                                        <tr>
                                            <th>Nama SOP</th>
                                            <th class="text-end"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($sop as $key => $row) { ?>
                                        <tr>
                                            <td><?php echo $row['nama_sop']; ?></td>
                                            <td>
                                                <div class="btn-group">
                                                    <!-- Tambahkan class sop-checkbox -->
                                                    <input type="checkbox" name="sop[]"
                                                        value="<?php echo $row['id_sop']; ?>" class="sop-checkbox">
                                                </div>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                <br>
                                <table
                                    class="table border-0 star-student table-hover table-center mb-0 datatable table-striped">
                                    <thead class="student-thread" style="background-color:#a0a7ad; color: white;">
                                        <tr>
                                            <th>Hasil Pemeliharaan</th>
                                            <th class="text-end"></th>
                                        </tr>
                                    </thead>
                                </table>
                                <div class="col-12 col-sm-12">
                                    <div class="form-group">
                                        <select name="hasil" class="form-control">
                                            <option value="NORMAL">NORMAL</option>
                                            <option value="PERBAIKAN">PERBAIKAN</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12">
                                    <div class="form-group local-forms">
                                        <label>kerusakan <span class="login-danger"></span></label>
                                        <input class="form-control" type="text" placeholder="Isikan data kerusakan"
                                            name="kerusakan">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-11" style="text-align: right;">
                    <div class="student-submit">
                        <!-- Tambahkan id untuk tombol -->
                        <button type="submit" class="btn btn-primary" id="submitButton" disabled>Submit</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Tambahkan script JavaScript -->
<script>
// JavaScript to handle checkbox validation
document.addEventListener('DOMContentLoaded', function() {
    const checkboxes = document.querySelectorAll(
        '.sop-checkbox'); // Ambil semua checkbox dengan class sop-checkbox
    const submitButton = document.getElementById('submitButton'); // Ambil tombol submit berdasarkan id

    function checkAllChecked() {
        // Cek apakah semua checkbox dicentang
        const allChecked = Array.from(checkboxes).every(checkbox => checkbox.checked);
        submitButton.disabled = !allChecked; // Aktifkan tombol jika semua checkbox dicentang
    }

    // Tambahkan event listener untuk setiap checkbox
    checkboxes.forEach(checkbox => {
        checkbox.addEventListener('change', checkAllChecked);
    });

    // Lakukan pengecekan awal saat halaman dimuat
    checkAllChecked();
});
</script>