<?php
include 'koneksi.php';

$nim = $_GET['nim'];

$hapus = mysqli_query($db, "DELETE FROM mahasiswa WHERE nim='$nim'");

if ($hapus) {
    header("Location: list.php");
} else {
    echo "Gagal menghapus data";
}
?>
