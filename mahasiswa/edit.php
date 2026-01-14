<?php
require('../koneksi.php');

/* ===== VALIDASI PARAMETER ===== */
if (!isset($_GET['nim'])) {
    header("Location: index.php");
    exit;
}

$nim = mysqli_real_escape_string($koneksi, $_GET['nim']);

/* ===== QUERY DATA MAHASISWA ===== */
$sql_mhs = "SELECT * FROM mahasiswa WHERE nim = '$nim'";
$q_mhs = mysqli_query($koneksi, $sql_mhs);
$edit = mysqli_fetch_assoc($q_mhs);

if (!$edit) {
    echo "Data mahasiswa tidak ditemukan";
    exit;
}

/* ===== QUERY DATA PRODI ===== */
$sql_prodi = "SELECT * FROM prodi";
$q_prodi = mysqli_query($koneksi, $sql_prodi);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">
    <h2>Edit Mahasiswa</h2>

    <form method="post" action="gbproses.php">

        <!-- kirim NIM sebagai identifier -->
        <input type="hidden" name="nim" value="<?= $edit['nim']; ?>">

        <div class="mb-3">
            <label class="form-label">Nama Mahasiswa</label>
            <input type="text" name="nama_mhs"
                   value="<?= $edit['nama_mhs']; ?>"
                   class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Tanggal Lahir</label>
            <input type="date" name="tgl_lahir"
                   value="<?= $edit['tgl_lahir']; ?>"
                   class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Alamat</label>
            <textarea name="alamat"
                      class="form-control"
                      required><?= $edit['alamat']; ?></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Program Studi</label>
            <select class="form-select" name="prodi_id" required>
                <option value="">-- Pilih Prodi --</option>

                <?php while ($row = mysqli_fetch_assoc($q_prodi)) : ?>
                    <option value="<?= $row['id']; ?>"
                        <?= ($row['id'] == $edit['prodi_id']) ? 'selected' : ''; ?>>
                        <?= $row['nama_prodi']; ?>
                    </option>
                <?php endwhile; ?>

            </select>
        </div>

        <button type="submit" name="update" class="btn btn-primary">
            Update
        </button>

        <a href="index.php" class="btn btn-secondary">
            Kembali
        </a>

    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
