<?php
session_start();
// CEK LOGIN: Jika user belum login, arahkan kembali ke halaman login di root
if (!isset($_SESSION['id_user'])) {
    header("Location: ../login.php");
    exit();
}
// Panggil koneksi dari folder root
require('../koneksi.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Prodi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-3">
        <h1>Create Prodi</h1>
        <form method="post" action="gbproses.php">
            <div class="mb-3">
                <label for="nama_prodi" class="form-label">Nama Prodi</label>
                <input type="text" name="nama_prodi" class="form-control" id="nama_prodi" required>
            </div>
            <div class="mb-3">
                <label for="jenjang" class="form-label fw-semibold">Jenjang Pendidikan</label>
                <select name="jenjang" id="jenjang" class="form-select" required>
                    <option value="" disabled selected>-- Pilih Jenjang --</option>
                    <option value="D2">Diploma 2 (D2)</option>
                    <option value="D3">Diploma 3 (D3)</option>
                    <option value="D4">Diploma 4 (D4)</option>
                    <option value="S2">Magister (S2)</option>
                </select>
                <div class="form-text">Pilih jenjang sesuai program studi</div>
            </div>
            <div class="mb-3">
                <label for="keterangan" class="form-label">Keterangan</label>
                <textarea class="form-control" name="keterangan" id="keterangan"></textarea>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            <a href="index.php" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>