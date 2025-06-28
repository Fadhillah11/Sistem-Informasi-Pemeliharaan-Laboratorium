<!DOCTYPE html>
<html>

<head>
    <title>Laporan Pemeliharaan dan Perbaikan</title>
    <style>
    body {
        font-family: Arial, sans-serif;
    }

    .kop-surat {
        text-align: center;
        margin-bottom: 20px;
    }

    .kop-surat img {
        float: left;
        width: 80px;
        height: 80px;
    }

    .kop-surat h1,
    .kop-surat h3,
    .kop-surat p {
        margin: 2px 0;
    }

    .garis {
        border: 2px solid black;
        margin-top: 10px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 10px;
    }

    th,
    td {
        border: 1px solid black;
        padding: 8px;
        text-align: left;
    }

    th {
        background-color: #f2f2f2;
        text-align: center;
    }

    .tanda-tangan {
        margin-top: 50px;
        text-align: right;
        /* Menyusun tanda tangan di tengah */
        width: 100%;
        /* Membuat tanda tangan mengambil lebar penuh */
        float: none;
        /* Menghapus float agar tidak melayang */
        clear: both;
        /* Memastikan tanda tangan berada di bawah elemen lainnya */
    }

    .tanda-tangan p {
        margin-bottom: 20px;
        /* Mengurangi jarak bawah antara tanda tangan */
    }
    </style>
    <script type="text/javascript">
    window.onload = function() {
        window.print(); // Ini akan memanggil dialog print otomatis setelah halaman dimuat
    }
    </script>
</head>

<body>
    <div class="kop-surat">
        <img src="<?php echo base_url('themes'); ?>/docs/assets/img/logoo.png" alt="Logo"
            style="width: 130px; height: auto;">
        <div>
            <h3>PEMERINTAH PROVINSI JAWA TENGAH</h3>
            <h3>DINAS PENDIDIKAN DAN KEBUDAYAAN</h3>
            <h1>SEKOLAH MENENGAH KEJURUAN NEGERI 1 BATANG</h1>
            <p>Jl. Ki Mangunsarkoro No.2</p>
            <p>Tel/Fax: (0285) 392031, e-mail: smksatubatang@gmail.com</p>
        </div>
        <div class="garis"></div>
    </div>

    <h2>Laporan Pemeliharaan</h2>
    <p>Periode: <?= $tanggal_awal ?> sampai <?= $tanggal_akhir ?></p>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Lab</th>
                <th>PC</th>
                <th>Nama Petugas</th>
                <th>Hasil</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($pemeliharaan)) : ?>
            <?php $no = 1; foreach ($pemeliharaan as $row) : ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $row['tgl'] ?></td>
                <td><?= $row['nama_lab'] ?></td>
                <td><?= $row['label'] ?></td>
                <td><?= $row['nama'] ?></td>
                <td><?= $row['hasil'] ?></td>
            </tr>
            <?php endforeach; ?>
            <?php else : ?>
            <tr>
                <td colspan="6" style="text-align: center;">Tidak ada data yang sesuai dengan filter.</td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <h2>Laporan Perbaikan</h2>
    <p>Periode: <?= $tanggal_awal ?> sampai <?= $tanggal_akhir ?></p>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal Perbaikan</th>
                <th>Lab</th>
                <th>Label</th>
                <th>Kerusakan</th>
                <th>Petugas</th>
                <th>Daftar Perbaikan</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($perbaikan)) : ?>
            <?php $no = 1; foreach ($perbaikan as $row) : ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $row['tgl_perbaikan'] ?></td>
                <td><?= $row['nama_lab'] ?></td>
                <td><?= $row['label'] ?></td>
                <td><?= $row['kerusakan'] ?></td>
                <td><?= $row['petugas'] ?></td>
                <td><?= $row['daftar_perbaikan'] ?></td>
            </tr>
            <?php endforeach; ?>
            <?php else : ?>
            <tr>
                <td colspan="7" style="text-align: center;">Tidak ada data yang sesuai dengan filter.</td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <div class="tanda-tangan">
        <p>Batang, <?= date('d-m-Y') ?></p>
        <p><b><br></b></p>
        <p>(<?= session()->get('nama') ?>)</p>
    </div>
</body>

</html>