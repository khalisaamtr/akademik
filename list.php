<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>List Data Mahasiswa</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body class="container mt-4">

<h3 class="mb-3">List Data Mahasiswa</h3>

<table class="table table-bordered table-striped">
    <tr class="table-primary">
        <th>No</th>
        <th>NIM</th>
        <th>Nama</th>
        <th>Tgl Lahir</th>
        <th>Alamat</th>
        <th>Aksi</th>
    </tr>

    <?php
    $no = 1;
    $tampil = mysqli_query($db, "SELECT * FROM mahasiswa");
    while ($data = mysqli_fetch_array($tampil)) {
    ?>
    <tr>
        <td><?= $no++; ?></td>
        <td><?= $data['nim']; ?></td>
        <td><?= $data['nama_mhs']; ?></td>
        <td><?= $data['tgl_lahir']; ?></td>
        <td><?= $data['alamat']; ?></td>
        <td>
            <a href="edit.php?nim=<?= $data['nim']; ?>" class="btn btn-warning btn-sm">Edit</a>
            <a href="hapus.php?nim=<?= $data['nim']; ?>" class="btn btn-danger btn-sm">Hapus</a>
        </td>
    </tr>
    <?php } ?>

</table>

<a href="index.php" class="btn btn-primary">Tambah Data</a>

</body>
</html>
