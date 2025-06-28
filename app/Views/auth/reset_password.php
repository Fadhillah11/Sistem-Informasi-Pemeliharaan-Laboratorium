<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h1>Reset Password</h1>

        <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger">
            <?= session()->getFlashdata('error'); ?>
        </div>
        <?php endif; ?>

        <form action="<?= base_url('login/processResetPassword'); ?>" method="post">
            <input type="hidden" name="token" value="<?= esc($token); ?>" />

            <div class="mb-3">
                <label for="new_password" class="form-label">Password Baru</label>
                <input type="password" class="form-control" id="new_password" name="new_password" required>
            </div>

            <div class="mb-3">
                <label for="confirm_password" class="form-label">Konfirmasi Password Baru</label>
                <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
            </div>

            <!-- Validasi password dan konfirmasi -->
            <div class="mb-3">
                <span id="password_error" class="text-danger" style="display:none;">Password dan konfirmasi password
                    tidak cocok!</span>
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-success" id="submit_btn">Reset Password</button>
            </div>
        </form>
    </div>

    <script src="https://unpkg.com/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
    // Validasi konfirmasi password di sisi client
    document.querySelector('form').addEventListener('submit', function(event) {
        var newPassword = document.getElementById('new_password').value;
        var confirmPassword = document.getElementById('confirm_password').value;

        if (newPassword !== confirmPassword) {
            event.preventDefault(); // Mencegah form disubmit
            document.getElementById('password_error').style.display = 'block';
        }
    });
    </script>
</body>

</html>