<?php 
require ('../koneksi.php');
$sql = "SELECT mahasiswa.*, prodi.nama_prodi
        FROM mahasiswa
        Join prodi ON mahasiswa.prodi_id = prodi.id
        WHERE mahasiswa.nim = '$_GET[nim]'";
$result = $koneksi->query($sql);
$edit = $result->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-3">
      <h1>View Mahasiswa</h1>
    <form method="post" action="gbproses.php">

  <div class="mb-3">
    <label for="nim" class="form-label">Nim</label>
    <input type="text" name="nim" class="form-control" id="nim" disabled value="<?= $edit['nim']; ?>">
  </div>
  <div class="mb-3">
    <label for="nama_mhs" class="form-label">Nama</label>
    <input type="text" name="nama_mhs" class="form-control" id="nama_mhs" disabled value="<?= $edit['nama_mhs']; ?>">
  </div>
  <div class="mb-3">
    <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
    <input type="date" name="tgl_lahir" class="form-control" id="tgl_lahir" disabled value="<?=  $edit['tgl_lahir']; ?>">
  </div>
  <div class="mb-3">
    <label for="alamat" class="form-label">Alamat</label>
    <textarea class="form-control" name="alamat"  id="alamat" disabled><?= $edit['alamat']; ?></textarea>
  </div>
   <div class="mb-3">
        <label for="nama_prodi" class="form-label">Prodi</label>
         <input type="text" name="nama_prodi" value="<?= $edit['nama_prodi']; ?>" disabled class="form-control" id="nama_prodi">
    </div>
    <a href="index.php" class="btn btn-primary">Kembali</a>
</form>
</div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>