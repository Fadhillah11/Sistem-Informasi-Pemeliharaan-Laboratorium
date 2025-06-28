<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Token Reset Password</title>
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h1>Token Reset Password</h1>
        <?php if (session()->getFlashdata('token')): 
            // Ambil token dari flashdata
            $token = session()->getFlashdata('token');
        ?>
        <div class="alert alert-info">
            <strong>Token:</strong> <?= $token; ?>
        </div>
        <!-- Tombol untuk menuju halaman reset password -->
        <a href="<?= base_url('login/resetPassword/' . $token) ?>" class="btn btn-success mt-3">Reset Password</a>
        <?php else: ?>
        <div class="alert alert-warning">
            Token tidak ditemukan.
        </div>
        <?php endif; ?>
        <a href="<?= base_url('login') ?>" class="btn btn-primary mt-3">Kembali ke Login</a>
    </div>
    <script src="https://unpkg.com/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>