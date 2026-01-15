<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Akun | SIAKAD</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <style>
        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #4e54c8, #8f94fb);
            display: flex;
            align-items: center;
        }
        .register-card {
            border-radius: 18px;
            border: none;
            box-shadow: 0 20px 40px rgba(0,0,0,0.15);
        }
        .register-icon {
            font-size: 3rem;
            color: #4e54c8;
        }
    </style>
</head>

<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5 col-lg-4">
            <div class="card register-card">

                <div class="text-center pt-4">
                    <div class="register-icon mb-2">
                        <i class="bi bi-person-plus-fill"></i>
                    </div>
                    <h4 class="fw-bold mb-0">DAFTAR AKUN</h4>
                    <small class="text-muted">Sistem Informasi Akademik</small>
                </div>

                <div class="card-body p-4">

                    <?php if(isset($_GET['pesan'])): ?>
                        <div class="alert alert-warning text-center small">
                            <i class="bi bi-exclamation-circle-fill me-1"></i>
                            <?= htmlspecialchars($_GET['pesan']); ?>
                        </div>
                    <?php endif; ?>

                    <form action="proses_register.php" method="POST">
                        
                        <div class="mb-3">
                            <label class="form-label">Nama Lengkap</label>
                            <input type="text" name="nama_lengkap" class="form-control form-control-lg" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control form-control-lg" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control form-control-lg" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Konfirmasi Password</label>
                            <input type="password" name="konfirmasi_password" class="form-control form-control-lg" required>
                        </div>

                        <button type="submit" name="register" class="btn btn-primary w-100 py-2 fw-semibold">
                            <i class="bi bi-check-circle-fill me-1"></i> Daftar
                        </button>

                        <div class="text-center mt-3 small">
                            Sudah punya akun?
                            <a href="login.php" class="fw-semibold text-decoration-none">
                                Login di sini
                            </a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
