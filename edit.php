<?php
include 'koneksi.php';

$nim = $_GET['nim'];
$edit = mysqli_query($db, "SELECT * FROM mahasiswa WHERE nim='$nim'");
$data = mysqli_fetch_array($edit);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Data Mahasiswa</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body class="container mt-4">

<h3>Edit Data Mahasiswa</h3>

<form method="POST" action="">
    <div class="mb-3">
        <label>NIM (tidak bisa diubah)</label>
        <input type="text" value="<?= $data['nim']; ?>" class="form-control" disabled>
        <input type="hidden" name="nim" value="<?= $data['nim']; ?>">
    </div>

    <div class="mb-3">
        <label>Nama Mahasiswa</label>
        <input type="text" name="nama_mhs" class="form-control" value="<?= $data['nama_mhs']; ?>">
    </div>

    <div class="mb-3">
        <label>Tanggal Lahir</label>
        <input type="date" name="tgl_lahir" class="form-control" value="<?= $data['tgl_lahir']; ?>">
    </div>

    <div class="mb-3">
        <label>Alamat</label>
        <textarea class="form-control" name="alamat" rows="3"><?= $data['alamat']; ?></textarea>
    </div>

    <button type="submit" name="update" class="btn btn-primary">Update</button>
</form>

</body>
</html>

<?php
if (isset($_POST['update'])) {
    $nama = $_POST['nama_mhs'];
    $tgl = $_POST['tgl_lahir'];
    $alamat = $_POST['alamat'];

    $update = mysqli_query($db, "UPDATE mahasiswa SET 
                                 nama_mhs='$nama',
                                 tgl_lahir='$tgl',
                                 alamat='$alamat'
                                 WHERE nim='$nim'");

    if ($update) {
        header("Location:list.php");
    } else {
        echo "Gagal update data";
    }
}
?>
