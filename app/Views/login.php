<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://unpkg.com/bs-brain@2.0.4/components/logins/login-9/assets/css/login-9.css">
</head>

<body>
    <!-- Login 9 - Bootstrap Brain Component -->
    <section class="bg-primary d-flex align-items-center" style="min-height: 100vh;">
        <div class="container">
            <div class="row gy-4 align-items-center">
                <div class="col-12 col-md-6 col-xl-7">
                    <div class="d-flex justify-content-center text-bg-primary">
                        <div class="col-12 col-xl-9">
                            <h2 class="h1 mb-4 text-center">
                                SISTEM INFORMASI PEMELIHARAAN<br>
                                LABORATORIUM KOMPUTER<br>
                                SMK N 1 BATANG
                            </h2>
                            <div class="text-endx">
                                <svg xmlns="http://www.w3.org/2000/svg" width="550" height="48" fill="currentColor"
                                    class="bi bi-grip-horizontal" viewBox="0 0 550 16">
                                    <rect x="1" y="4" width="550" height="2" />
                                </svg>
                            </div>
                            <p>SMK Negeri 1, Jl. Ki Mangunsarkoro No.2, 03, Dracik Barat, Proyonanggan Sel., Kec.
                                Batang, Kabupaten Batang, Jawa Tengah 51216</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-xl-5">
                    <div class="card border-0 rounded-4 shadow" style="min-height: 500px;">
                        <div class="card-body p-3 p-md-4 p-xl-5 text-center">
                            <img src="<?php echo base_url('themes'); ?>/docs/assets/img/logoo.png" alt="Logo"
                                style="width: 100px; height: auto;">

                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-4">
                                        <h3>Sign in</h3>
                                    </div>
                                </div>
                            </div>

                            <?php if (session()->getFlashdata()): ?>
                            <?php foreach (session()->getFlashdata() as $key => $message): ?>
                            <div class="alert alert-<?= esc($key); ?> alert-dismissible fade show shadow-sm"
                                role="alert"
                                style="font-size: 1rem; font-weight: bold; background-color: <?= $key == 'error' ? '#f8d7da' : ($key == 'success' ? '#d4edda' : '#d1ecf1'); ?>; color: <?= $key == 'error' ? '#721c24' : ($key == 'success' ? '#155724' : '#0c5460'); ?>; border: none; padding: 1rem 1.5rem; border-radius: 8px;">
                                <?= esc($message); ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"
                                    style="color: inherit;"></button>
                            </div>
                            <?php endforeach; ?>
                            <?php endif; ?>

                            <form action="<?php echo base_url('Login/process'); ?>">
                                <div class="row gy-3 overflow-hidden">
                                    <div class="col-12">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" name="username" id="username"
                                                placeholder="Username" required>
                                            <label for="username" class="form-label">Username</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating mb-3">
                                            <input type="password" class="form-control" name="password" id="password"
                                                placeholder="Password" required>
                                            <label for="password" class="form-label">Password</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="d-grid">
                                            <button class="btn btn-primary btn-lg" type="submit">Log in now</button>
                                        </div>
                                    </div>
                                    <div class="col-12 text-center mt-3">
                                        <button type="button" class="btn btn-link" data-bs-toggle="modal"
                                            data-bs-target="#forgotPasswordModal">
                                            Lupa Password?
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal Lupa Password -->
    <!-- Modal Lupa Password -->
    <div class="modal fade" id="forgotPasswordModal" tabindex="-1" aria-labelledby="forgotPasswordLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="forgotPasswordLabel">Lupa Password</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Masukkan username Anda untuk mereset password.</p>
                    <form action="<?= base_url('Login/processForgotPassword'); ?>" method="post">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Kirim Permintaan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- JavaScript Bootstrap -->
    <script src="https://unpkg.com/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>