<?php 
session_start();
// CEK LOGIN: Jika belum login, tendang ke halaman login di root
if (!isset($_SESSION['id_user'])) {
    header("Location: ../login.php");
    exit();
}

require ('../koneksi.php');

$query = "SELECT * FROM prodi";
$sql = $koneksi->query($query);
$no = 1;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Data Prodi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Akademik</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="../index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../mahasiswa/index.php">Mahasiswa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="index.php">Prodi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-info" href="../profil/edit_profil.php">Edit Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-danger" href="../logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <div class="d-flex align-items-center justify-content-between mb-3">
            <h1 class="m-0">List Data Prodi</h1>
            <a href="create.php" class="fs-3 text-primary">
                <i class="bi bi-plus-square"></i>
            </a>
        </div>
     
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">NO</th>
                    <th scope="col">Nama Prodi</th>
                    <th scope="col">Jenjang</th>
                    <th scope="col">Keterangan</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($sql as $row): ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $row['nama_prodi']; ?></td>
                    <td><?= $row['jenjang']; ?></td>
                    <td><?= $row['keterangan']; ?></td>
                    <td>
                        <a href="view.php?id=<?= $row['id']; ?>" class="btn btn-success btn-sm">View</a>
                        <a href="edit.php?id=<?= $row['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="gbproses.php?id=<?= $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data?');">Hapus</a>
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>