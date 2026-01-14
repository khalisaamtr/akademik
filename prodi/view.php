<?php 
require ('../koneksi.php');
$sql = "SELECT * FROM prodi where id=$_GET[id]";
$result = $koneksi->query($sql);
$edit = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Prodi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-3">
      <h1>View Prodi</h1>
 <form method="post" action="gbproses.php">
        <input type="hidden" name="id" value="<?= $edit['id']; ?>">
          <div class="mb-3">
            <label for="nama_prodi" class="form-label">Nama Prodi</label>
            <input type="text" name="nama_prodi" value="<?= $edit['nama_prodi']; ?>" class="form-control" id="nama_prodi" disabled>
          </div>
          <div class="mb-3">
            <label for="jenjang" class="form-label fw-semibold">
                Jenjang Pendidikan
            </label>

            <select name="jenjang" id="jenjang" class="form-select" disabled>
                <option value="">-- Pilih Jenjang --</option>

                <option value="D2" <?= ($edit['jenjang'] == 'D2') ? 'selected' : '' ?>>
                    Diploma 2 (D2)
                </option>

                <option value="D3" <?= ($edit['jenjang'] == 'D3') ? 'selected' : '' ?>>
                    Diploma 3 (D3)
                </option>

                <option value="D4" <?= ($edit['jenjang'] == 'D4') ? 'selected' : '' ?>>
                    Diploma 4 (D4)
                </option>

                <option value="S2" <?= ($edit['jenjang'] == 'S2') ? 'selected' : '' ?>>
                    Magister (S2)
                </option>
            </select>

            <div class="form-text">
                Pilih jenjang sesuai program studi
            </div>
        </div>

          <div class="mb-3">
            <label for="keterangan" class="form-label">Keterangan</label>
            <textarea class="form-control" disabled name="keterangan" id="keterangan"><?= $edit['keterangan']; ?></textarea>
          </div>
        
        <a href="index.php" class="btn btn-primary">Kembali</a>
    </form>
</div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>