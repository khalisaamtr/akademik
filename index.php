<!DOCTYPE html>
<html>
<head>
    <title>Input Data Mahasiswa</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body class="container mt-4">

<h3 class="mb-3">Input Data Mahasiswa</h3>

<form method="POST" action="proses_input.php">


    <div class="mb-3">
        <label>NIM</label>
        <input type="text" name="nim" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Nama Mahasiswa</label>
        <input type="text" name="nama_mhs" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Tanggal Lahir</label>
        <input type="date" name="tgl_lahir" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Alamat</label>
        <textarea class="form-control" name="alamat" rows="3" required></textarea>
    </div>

    <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
    <a href="list.php" class="btn btn-secondary">Lihat Data</a>

</form>

</body>
</html>
