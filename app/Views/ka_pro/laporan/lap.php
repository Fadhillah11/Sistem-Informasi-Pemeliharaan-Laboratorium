<?php echo view('ka_pro/_partials/header') ?>
<?php echo view('ka_pro/_partials/sidebar') ?>

<div class="container">
    <!-- Form Filter -->
    <form method="get" action="<?= site_url('laporan/index_kapro') ?>" class="filter-form">
        <div class="row">
            <!-- Kolom Lab -->
            <div class="col-12 col-md-6 col-lg-3 mb-3">
                <div class="form-group">
                    <label for="lab">Lab</label>
                    <select class="form-control" name="lab" id="lab">
                        <option value="">Semua</option>
                        <?php foreach ($lab as $key => $row) { ?>
                        <option value="<?= $row['id_lab']; ?>">
                            <?= $row['nama_lab']; ?>
                        </option>
                        <?php } ?>
                    </select>
                </div>
            </div>

            <!-- Kolom Hasil -->
            <div class="col-12 col-md-6 col-lg-3 mb-3">
                <div class="form-group">
                    <label for="hasil">Hasil</label>
                    <select class="form-control" name="hasil" id="hasil">
                        <option value="">Semua</option>
                        <option value="NORMAL" <?= set_select('hasil', 'NORMAL') ?>>NORMAL</option>
                        <option value="PERBAIKAN" <?= set_select('hasil', 'PERBAIKAN') ?>>PERBAIKAN</option>
                        <option value="TIDAK DAPAT DIPERBAIKI" <?= set_select('hasil', 'TIDAK DAPAT DIPERBAIKI') ?>>
                            TIDAK DAPAT DIPERBAIKI</option>
                    </select>
                </div>
            </div>

            <!-- Kolom Tanggal Awal -->
            <div class="col-12 col-md-6 col-lg-3 mb-3">
                <div class="form-group">
                    <label for="tanggal_awal">Tanggal Awal</label>
                    <input type="date" name="tanggal_awal" id="tanggal_awal" class="form-control"
                        value="<?= set_value('tanggal_awal') ?>">
                </div>
            </div>

            <!-- Kolom Tanggal Akhir -->
            <div class="col-12 col-md-6 col-lg-3 mb-3">
                <div class="form-group">
                    <label for="tanggal_akhir">Tanggal Akhir</label>
                    <input type="date" name="tanggal_akhir" id="tanggal_akhir" class="form-control"
                        value="<?= set_value('tanggal_akhir') ?>">
                </div>
            </div>
        </div>

        <!-- Tombol Cari dan Cetak -->
        <div class="row">
            <div class="col-12 text-center">
                <button type="submit" class="btn btn-primary">Cari</button>
                <button type="button" class="btn btn-secondary ml-2" onclick="cetakLaporan()">Cetak Laporan</button>
            </div>
        </div>
    </form>

    <!-- Tombol Cetak -->
    <!-- <div class="mt-3">
        <button class="btn btn-secondary" onclick="cetakLaporan()">
            Cetak Laporan
        </button>
    </div> -->

    <script>
    function cetakLaporan() {
        // Ambil query string dari URL saat ini
        const queryString = window.location.search;
        const url = `<?= base_url('PdfController/cetakPdf') ?>${queryString}`;
        window.open(url, '_blank'); // Buka laporan PDF dalam tab baru
    }
    </script>

    <!-- Tabel Pemeliharaan -->
    <div class="table-container mt-4">
        <h3>Laporan Pemeliharaan</h3>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Lab</th>
                    <th>Label Komputer</th>
                    <th>Petugas</th>
                    <th>Hasil</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pemeliharaan as $key => $p): ?>
                <tr>
                    <td><?= $key + 1 ?></td>
                    <td><?= $p['tgl'] ?></td>
                    <td><?= $p['nama_lab'] ?></td>
                    <td><?= $p['label'] ?></td>
                    <td><?= $p['nama'] ?></td>
                    <td><?= $p['hasil'] ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div>
        <h3>Lap Perbaikan</h3>
        <table class="table table-striped table-bordered">
            <tr>
                <th>No</th>
                <th>Tanggal Perbaikan</th>
                <th>Lab</th>
                <th>Label</th>
                <th>Kerusakan</th>
                <th>Petugas</th>
                <th>Daftar Perbaikan</th>

            </tr>
            <?php foreach ($perbaikan as $key => $p): ?>
            <tr>
                <td><?= $key + 1 ?></td>
                <td><?= $p['tgl_perbaikan'] ?></td>
                <td><?= $p['nama_lab'] ?></td>
                <td><?= $p['label'] ?></td>
                <td><?= $p['kerusakan'] ?></td>
                <td><?= $p['petugas'] ?></td>
                <td><?= $p['daftar_perbaikan'] ?></td>
            </tr>
            <?php endforeach; ?>
        </table>

    </div>
</div>

<style>
/* Sidebar Styling */
#sidebar {
    position: fixed;
    width: 250px;
    /* Atur lebar sidebar */
    height: 100%;
    background-color: #007bff;
    color: white;
    padding-top: 20px;
}

/* Global Styles */
.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
    margin-left: 260px;
    /* Geser konten ke kanan sesuai dengan lebar sidebar */
}

/* Form Styling */
.filter-form {
    display: flex;
    flex-direction: column;
}

.form-row {
    display: flex;
    gap: 20px;
}

.form-row .form-group {
    flex: 1;
}

.filter-form .form-group {
    margin-bottom: 15px;
}

.form-control {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 14px;
}

.btn-primary {
    background-color: #007bff;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
}

.btn-primary:hover {
    background-color: #0056b3;
}

/* Table Styling */
.table-container {
    margin-top: 20px;
    overflow-x: auto;
}

table {
    width: 100%;
    border-collapse: collapse;
}

th,
td {
    padding: 12px;
    text-align: left;
}

th {
    background-color: #f4f4f4;
}

tr:hover {
    background-color: #f1f1f1;
}

.table-striped tbody tr:nth-child(odd) {
    background-color: #f9f9f9;
}

.table-bordered {
    border: 1px solid #ddd;
}

.table-bordered th,
.table-bordered td {
    border: 1px solid #ddd;
}
</style>