<?php
include 'koneksi.php';

if (isset($_POST['submit'])) {

    $nim = $_POST['nim'];
    $nama = $_POST['nama_mhs'];
    $tgl  = $_POST['tgl_lahir'];
    $alamat = $_POST['alamat'];

    $sql = mysqli_query($db, 
        "INSERT INTO mahasiswa (nim, nama_mhs, tgl_lahir, alamat)
         VALUES ('$nim', '$nama', '$tgl', '$alamat')"
    );

    if ($sql) {
        header("Location: list.php");
        exit;
    } else {
        echo "Gagal menyimpan data: " . mysqli_error($db);
    }
}
?>
