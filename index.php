<?php
session_start();
include "koneksi_akademik.php";

if (!isset($_SESSION['status']) || $_SESSION['status'] != "login") {
    header("Location: login.php?pesan=Silakan Login Terlebih Dahulu");
    exit();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Mahasiswa | SIAKAD</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f4f6fb;
        }
        .navbar {
            background: linear-gradient(90deg, #4e54c8, #8f94fb);
        }
        .card {
            border: none;
            border-radius: 16px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.05);
        }
        .table thead {
            background-color: #f1f3f9;
        }
        .badge-prodi {
            background-color: #e8f0ff;
            color: #2b4eff;
            font-weight: 500;
        }
        .btn-icon {
            width: 36px;
            height: 36px;
            padding: 0;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }
    </style>
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark shadow-sm mb-4">
    <div class="container">
        <a class="navbar-brand fw-bold" href="#">
            <i class="bi bi-mortarboard-fill me-2"></i>SIAKAD
        </a>

        <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#nav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="nav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="index.php">
                        <i class="bi bi-people-fill me-1"></i> Mahasiswa
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="view_prodi.php">
                        <i class="bi bi-journal-bookmark-fill me-1"></i> Program Studi
                    </a>
                </li>
            </ul>

            <div class="dropdown">
                <a class="nav-link dropdown-toggle text-white fw-semibold" href="#" data-bs-toggle="dropdown">
                    <i class="bi bi-person-circle me-1"></i>
                    <?= htmlspecialchars($_SESSION['nama']); ?>
                </a>
                <ul class="dropdown-menu dropdown-menu-end shadow">
                    <li>
                        <a class="dropdown-item" href="edit_profil.php">
                            <i class="bi bi-gear me-2"></i>Edit Profil
                        </a>
                    </li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <a class="dropdown-item text-danger" href="logout.php">
                            <i class="bi bi-box-arrow-right me-2"></i>Logout
                        </a>
                    </li>
                </ul>
            </div>

        </div>
    </div>
</nav>

<div class="container">

    <!-- ALERT -->
    <?php if (isset($_GET['pesan'])): ?>
        <div class="alert alert-success alert-dismissible fade show shadow-sm">
            <i class="bi bi-check-circle-fill me-2"></i>
            <?= htmlspecialchars($_GET['pesan']); ?>
            <button class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <!-- CARD -->
    <div class="card">
        <div class="card-header bg-white d-flex justify-content-between align-items-center py-3 px-4">
            <h5 class="mb-0 fw-bold">Daftar Mahasiswa</h5>
            <a href="create_mahasiswa.php" class="btn btn-primary btn-sm">
                <i class="bi bi-plus-lg"></i> Tambah
            </a>
        </div>

        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table align-middle mb-0">
                    <thead>
                        <tr>
                            <th width="60">No</th>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Program Studi</th>
                            <th>Alamat</th>
                            <th width="120" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $sql = "SELECT m.*, p.nama_prodi, p.jenjang 
                                FROM mahasiswa m 
                                LEFT JOIN prodi p ON m.prodi_id = p.id 
                                ORDER BY m.nim ASC";
                        $tampil = $db->query($sql);

                        while ($data = $tampil->fetch_assoc()):
                        ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td class="fw-semibold"><?= $data['nim']; ?></td>
                            <td><?= htmlspecialchars($data['nama_mahasiswa']); ?></td>
                            <td>
                                <?php if ($data['nama_prodi']): ?>
                                    <span class="badge badge-prodi">
                                        <?= $data['jenjang']; ?> <?= $data['nama_prodi']; ?>
                                    </span>
                                <?php else: ?>
                                    <span class="text-muted">-</span>
                                <?php endif; ?>
                            </td>
                            <td><?= htmlspecialchars($data['alamat']); ?></td>
                            <td class="text-center">
                                <a href="edit_mahasiswa.php?nim=<?= $data['nim']; ?>"
                                   class="btn btn-warning btn-icon text-white"
                                   title="Edit">
                                    <i class="bi bi-pencil-fill"></i>
                                </a>
                                <a href="delete_mahasiswa.php?nim=<?= $data['nim']; ?>"
                                   class="btn btn-danger btn-icon"
                                   title="Hapus"
                                   onclick="return confirm('Hapus data ini?')">
                                    <i class="bi bi-trash-fill"></i>
                                </a>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
