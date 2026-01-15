<?php
session_start();
include "koneksi_akademik.php";

if ($_SESSION['status'] != "login") {
    header("Location: login.php?pesan=Belum Login");
    exit();
}

$id = $_SESSION['id_user'];
$stmt = $db->prepare("SELECT * FROM pengguna WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$data = $stmt->get_result()->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Profil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8fafc;
        }
        .card {
            border: none;
            border-radius: 16px;
        }
        .btn-primary {
            background: linear-gradient(90deg, #2563eb, #7c3aed);
            border: none;
        }
        .btn-primary:hover {
            opacity: 0.9;
        }
        .form-label {
            font-weight: 500;
        }
    </style>
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark shadow-sm"
     style="background: linear-gradient(90deg, #2563eb, #7c3aed);">
    <div class="container">
        <a class="navbar-brand fw-bold" href="index.php">SIAKAD</a>

        <div class="dropdown">
            <a class="nav-link dropdown-toggle text-white fw-semibold" href="#" role="button" data-bs-toggle="dropdown">
                <i class="bi bi-person-circle me-1"></i> <?= htmlspecialchars($_SESSION['nama']); ?>
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
                <li>
                    <a class="dropdown-item text-danger" href="logout.php">
                        <i class="bi bi-box-arrow-right me-2"></i> Logout
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- CONTENT -->
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow-sm">
                <div class="card-body p-4">

                    <h5 class="fw-bold mb-4">
                        <i class="bi bi-gear me-2"></i>Edit Profil
                    </h5>

                    <?php if(isset($_GET['pesan'])): ?>
                        <div class="alert alert-success">
                            <i class="bi bi-check-circle me-1"></i>
                            <?= htmlspecialchars($_GET['pesan']); ?>
                        </div>
                    <?php endif; ?>

                    <form action="update_profil.php" method="POST">
                        <input type="hidden" name="id" value="<?= $data['id']; ?>">

                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control bg-light" value="<?= $data['email']; ?>" readonly>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" name="nama_lengkap"
                                   value="<?= htmlspecialchars($data['nama_lengkap']); ?>" required>
                        </div>

                        <hr>
                        <p class="text-muted small mb-3">
                            Kosongkan password jika tidak ingin menggantinya
                        </p>

                        <div class="mb-4">
                            <label class="form-label">Password Baru</label>
                            <input type="password" class="form-control" name="password_baru" placeholder="••••••••">
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="index.php" class="btn btn-outline-secondary">
                                <i class="bi bi-arrow-left"></i> Kembali
                            </a>
                            <button type="submit" name="update_profil" class="btn btn-primary">
                                <i class="bi bi-save"></i> Simpan
                            </button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
