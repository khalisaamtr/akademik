<?php 
session_start();
// CEK LOGIN: Jika belum login, tendang ke login root
if (!isset($_SESSION['id_user'])) {
    header("Location: ../login.php");
    exit();
}

require ('../koneksi.php');

// Ambil ID dari URL dan amankan
$id = mysqli_real_escape_string($koneksi, $_GET['id']);
$sql = "SELECT * FROM prodi WHERE id='$id'";
$result = $koneksi->query($sql);
$edit = $result->fetch_assoc();

// Jika data tidak ditemukan
if (!$edit) {
    echo "<script>alert('Data tidak ditemukan!'); window.location='index.php';</script>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Prodi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-3">
        <h1>Detail Program Studi</h1>
        <hr>
        <div class="mb-3">
            <label class="form-label fw-bold">Nama Prodi</label>
            <input type="text" class="form-control" value="<?= $edit['nama_prodi']; ?>" disabled>
        </div>
        <div class="mb-3">
            <label class="form-label fw-bold">Jenjang Pendidikan</label>
            <select class="form-select" disabled>
                <option value="D2" <?= ($edit['jenjang'] == 'D2') ? 'selected' : '' ?>>Diploma 2 (D2)</option>
                <option value="D3" <?= ($edit['jenjang'] == 'D3') ? 'selected' : '' ?>>Diploma 3 (D3)</option>
                <option value="D4" <?= ($edit['jenjang'] == 'D4') ? 'selected' : '' ?>>Diploma 4 (D4)</option>
                <option value="S2" <?= ($edit['jenjang'] == 'S2') ? 'selected' : '' ?>>Magister (S2)</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label fw-bold">Keterangan</label>
            <textarea class="form-control" rows="3" disabled><?= $edit['keterangan']; ?></textarea>
        </div>
        
        <a href="index.php" class="btn btn-primary">Kembali ke Daftar</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>