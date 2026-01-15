<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login - <?= $pengaturan['nama'] ?? 'Admin Panel'; ?></title>
    <link rel="stylesheet" href="<?= base_url()?>/aset_dashboard_2/vendors/feather/feather.css">
    <link rel="stylesheet" href="<?= base_url()?>/aset_dashboard_2/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="<?= base_url()?>/aset_dashboard_2/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="<?= base_url()?>/aset_dashboard_2/css/style.css">
    <link rel="shortcut icon" href="<?= base_url()?>/aset_dashboard_2/images/favicon.png" />
    <style>
        .login-section {
            min-height: 100vh;
            background: #fff;
        }
        .login-image {
            background-size: cover;
            background-position: center;
            position: relative;
            min-height: 100vh;
        }
        .login-image::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0,0,0,0.5); /* Dark overlay */
        }
        .login-content {
            position: relative;
            z-index: 1;
            color: #fff;
            padding: 3rem;
        }
        .auth-form-light {
            background: #ffffff;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 4rem !important;
        }
        .brand-logo img {
            width: 80px;
            margin-bottom: 1.5rem;
        }
        .form-control {
            border-radius: 8px;
            padding: 1.5rem 1rem;
            border: 1px solid #e1e1e1;
            background: #f9f9f9;
        }
        .form-control:focus {
            background: #fff;
            border-color: #4B49AC;
            box-shadow: 0 0 0 3px rgba(75, 73, 172, 0.1);
        }
        .auth-form-btn {
            padding: 1rem;
            border-radius: 8px;
            font-weight: 600;
            letter-spacing: 0.5px;
        }
        @media (max-width: 768px) {
            .login-image { display: none; }
            .auth-form-light { padding: 2rem !important; }
        }
    </style>
</head>
<body>
    <div class="container-fluid p-0">
        <div class="row m-0">
            <!-- Left Side: Image -->
            <?php 
                $bgImage = !empty($pengaturan['hero_bg']) ? base_url('uploads/' . $pengaturan['hero_bg']) : base_url('homepage/img/hero-bg.jpg');
            ?>
            <div class="col-lg-7 p-0 login-image d-flex align-items-center justify-content-center" style="background-image: url('<?= $bgImage; ?>');">
                <div class="login-content text-center">
                    <h1 class="display-4 font-weight-bold mb-3">Selamat Datang</h1>
                    <p class="lead"><?= $pengaturan['nama'] ?? 'Sistem Informasi Pesantren'; ?></p>
                    <p class="mt-4 font-weight-light text-white-50">Silakan login untuk mengelola sistem.</p>
                </div>
            </div>

            <!-- Right Side: Form -->
            <div class="col-lg-5 p-0">
                <div class="auth-form-light text-left">
                    <div class="brand-logo">
                        <?php if (!empty($pengaturan['logo_web'])) : ?>
                            <img src="<?= base_url('uploads/' . $pengaturan['logo_web']); ?>" alt="logo">
                        <?php else : ?>
                            <img src="<?= base_url()?>/homepage/img/logo.png" alt="logo">
                        <?php endif; ?>
                    </div>
                    
                    <h3 class="font-weight-bold text-dark">Login Admin</h3>
                    <h6 class="font-weight-light text-muted mb-4">Masuk untuk melanjutkan.</h6>

                    <?php if (session()->getFlashdata('error')) : ?>
                        <div class="alert alert-danger border-0 shadow-sm rounded-lg">
                            <i class="ti-alert mr-2"></i> <?= session()->getFlashdata('error') ?>
                        </div>
                    <?php endif; ?>

                    <?php if (session()->getFlashdata('success')) : ?>
                        <div class="alert alert-success border-0 shadow-sm rounded-lg">
                            <i class="ti-check mr-2"></i> <?= session()->getFlashdata('success') ?>
                        </div>
                    <?php endif; ?>

                    <form action="<?= base_url('/login/auth') ?>" method="post" class="pt-3">
                        <div class="form-group mb-4">
                            <label class="font-weight-bold text-small text-muted mb-2">Username</label>
                            <input type="text" class="form-control form-control-lg" name="username" placeholder="Masukkan username Anda" required>
                        </div>
                        <div class="form-group mb-4">
                            <label class="font-weight-bold text-small text-muted mb-2">Password</label>
                            <input type="password" class="form-control form-control-lg" name="password" placeholder="Masukkan password Anda" required>
                        </div>
                        <div class="mt-4 d-grid gap-2">
                            <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn shadow-sm">
                                MASUK <i class="ti-arrow-right ml-2"></i>
                            </button>
                        </div>
                        <div class="text-center mt-4 font-weight-light">
                            Lupa Password? <a href="#" class="text-primary font-weight-bold">Hubungi Administrator</a>
                        </div>
                    </form>
                    
                    <div class="mt-auto text-center text-muted small pt-5">
                        &copy; <?= date('Y'); ?> <?= $pengaturan['nama'] ?? 'Pesantren'; ?>. All rights reserved.
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="<?= base_url()?>/aset_dashboard_2/vendors/js/vendor.bundle.base.js"></script>
    <script src="<?= base_url()?>/aset_dashboard_2/js/off-canvas.js"></script>
    <script src="<?= base_url()?>/aset_dashboard_2/js/template.js"></script>
</body>
</html>