<?php
require('../koneksi.php');

$query = "SELECT id, nama_prodi FROM prodi";
$result = mysqli_query($koneksi, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-3">
    <h1>Create Mahasiswa</h1>

    <form method="post" action="gbproses.php">

        <div class="mb-3">
            <label class="form-label">Nim</label>
            <input type="text" name="nim" class="form-control" required>
        </div>
        
        <div class="mb-3">
            <label class="form-label">Nama</label>
            <input type="text" name="nama_mhs" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Tanggal Lahir</label>
            <input type="date" name="tgl_lahir" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Alamat</label>
            <textarea class="form-control" name="alamat" required></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Program Studi</label>
            <select class="form-select" name="prodi_id" required>
                <option value="">-- Pilih Prodi --</option>

                <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                    <option value="<?= $row['id']; ?>">
                        <?= $row['nama_prodi']; ?>
                    </option>
                <?php endwhile; ?>

            </select>
        </div>

        <button type="submit" class="btn btn-primary" name="submit">
            Submit
        </button>

    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
