<?php 
    require ('../koneksi.php');
    $query = "SELECT mahasiswa.*, prodi.nama_prodi 
              FROM mahasiswa 
              JOIN prodi ON mahasiswa.prodi_id = prodi.id";
    $sql = $koneksi->query($query);
    $no = 1;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Data Mahasiswa</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Akademik</a>

            <button class="navbar-toggler" type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarTogglerDemo01"
            aria-controls="navbarTogglerDemo01"
            aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <a class="nav-link active" href="../index.php">Home</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="index.php">Mahasiswa</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="../prodi/index.php">Prodi</a>
                </li>
            </ul>
            </div>
        </div>
        </nav>
    <div class="container mt-4">
        <div class="d-flex align-items-center justify-content-between mb-3">
            <h1 class="m-0">List Data Mahasiswa</h1>
            <a href="create.php" class="fs-3 text-primary">
                <i class="bi bi-plus-square"></i>
            </a>
        </div>
     
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                <th scope="col">NO</th>
                <th scope="col">NIM</th>
                <th scope="col">Nama</th>
                <th scope="col">Tanggal Lahir</th>
                <th scope="col">Alamat</th>
                <th scope="col">Prodi</th>
                <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($sql as $row): ?>
                <tr>
                <td><?= $no++; ?></td>
                <td><?= $row['nim']; ?></td>
                <td><?= $row['nama_mhs']; ?></td>
                <td><?= $row['tgl_lahir']; ?></td>
                <td><?= $row['alamat']; ?></td>
                <td><?= $row['nama_prodi']; ?></td>
                <td>
                    <a href="gbproses.php?nim=<?= $row['nim']; ?>"
                    class="btn btn-danger btn-sm"
                    onclick="return confirm('Yakin ingin menghapus data?');">
                    Hapus
                    </a>

                    <a href="edit.php?nim=<?= $row['nim']; ?>"
                    class="btn btn-warning btn-sm">
                    Edit
                    </a>

                    <a href="view.php?nim=<?= $row['nim']; ?>"
                    class="btn btn-success btn-sm">
                    View
                    </a>
                </td>

                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>