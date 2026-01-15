<?php 
session_start();
// CEK LOGIN: Jika belum login, tendang ke halaman login di root
if (!isset($_SESSION['id_user'])) {
    header("Location: ../login.php");
    exit();
}

require ('../koneksi.php');

// Validasi jika ID tidak ada di URL
if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit();
}

$id = mysqli_real_escape_string($koneksi, $_GET['id']);
$sql = "SELECT * FROM prodi WHERE id = '$id'";
$result = $koneksi->query($sql);
$edit = $result->fetch_assoc();

if (!$edit) {
    echo "Data prodi tidak ditemukan";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Prodi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-3">
        <h1>Edit Prodi</h1>
        <form method="post" action="gbproses.php">
            <input type="hidden" name="id" value="<?= $edit['id']; ?>">
            
            <div class="mb-3">
                <label for="nama_prodi" class="form-label">Nama Prodi</label>
                <input type="text" name="nama_prodi" value="<?= $edit['nama_prodi']; ?>" class="form-control" id="nama_prodi" required>
            </div>
            
            <div class="mb-3">
                <label for="jenjang" class="form-label fw-semibold">Jenjang Pendidikan</label>
                <select name="jenjang" id="jenjang" class="form-select" required>
                    <option value="">-- Pilih Jenjang --</option>
                    <option value="D2" <?= ($edit['jenjang'] == 'D2') ? 'selected' : '' ?>>Diploma 2 (D2)</option>
                    <option value="D3" <?= ($edit['jenjang'] == 'D3') ? 'selected' : '' ?>>Diploma 3 (D3)</option>
                    <option value="D4" <?= ($edit['jenjang'] == 'D4') ? 'selected' : '' ?>>Diploma 4 (D4)</option>
                    <option value="S2" <?= ($edit['jenjang'] == 'S2') ? 'selected' : '' ?>>Magister (S2)</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="keterangan" class="form-label">Keterangan</label>
                <textarea class="form-control" name="keterangan" id="keterangan"><?= $edit['keterangan']; ?></textarea>
            </div>
            
            <button type="submit" class="btn btn-primary" name="update">Update</button>
            <a href="index.php" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>