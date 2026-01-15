<?php
session_start();

// 1. CEK LOGIN
if (!isset($_SESSION['id_user'])) {
    header("Location: ../login.php");
    exit();
}

// 2. KONEKSI
require('../koneksi.php');

// --- PROSES CREATE ---
if (isset($_POST['submit'])){
    $nama_prodi = mysqli_real_escape_string($koneksi, $_POST['nama_prodi']);
    $jenjang = mysqli_real_escape_string($koneksi, $_POST['jenjang']);
    $keterangan = mysqli_real_escape_string($koneksi, $_POST['keterangan']);
    
    $sql = "INSERT INTO prodi(nama_prodi, jenjang, keterangan) VALUES ('$nama_prodi', '$jenjang', '$keterangan')";

    $query = $koneksi->query($sql);
    if ($query) {
        header("Location: index.php");
        exit();
    } else {
        echo "Gagal menambah data: " . $koneksi->error;
    }
}

// --- PROSES EDIT ---
if (isset($_POST['update'])) {
    $id = intval($_POST['id']);
    $nama_prodi = mysqli_real_escape_string($koneksi, $_POST['nama_prodi']);
    $jenjang = mysqli_real_escape_string($koneksi, $_POST['jenjang']);
    $keterangan = mysqli_real_escape_string($koneksi, $_POST['keterangan']);

    $sql = "UPDATE prodi 
            SET nama_prodi='$nama_prodi', 
                jenjang='$jenjang', 
                keterangan='$keterangan' 
            WHERE id=$id";

    $query = $koneksi->query($sql);

    if ($query) {
        header("Location: index.php");
        exit();
    } else {
        echo "Maaf, data gagal diubah: " . $koneksi->error;
    }
}

// --- PROSES DELETE ---
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $sql = "DELETE FROM prodi WHERE id=$id";
    $hapus = $koneksi->query($sql);
    
    if($hapus){
        header("Location: index.php");
        exit();
    } else {
        echo "Gagal menghapus data: " . $koneksi->error;
    }
} else {
    // Jika file diakses langsung tanpa aksi, kembalikan ke index
    header("Location: index.php");
    exit();
}
?>