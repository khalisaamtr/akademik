<?php
require 'koneksi.php';

if (isset($_POST['delete_account'])) {
    $id = $_POST['id_user'];

    if (!empty($id)) {
        // Query untuk menghapus data dari tabel users
        $query = "DELETE FROM users WHERE id_user = '$id'";
        
        if ($koneksi->query($query)) {
            echo "<script>alert('Akun Anda telah berhasil dihapus secara permanen.'); window.location='register.php';</script>";
        } else {
            echo "Gagal menghapus akun: " . $koneksi->error;
        }
    } else {
        echo "<script>alert('Sesi sudah habis, tidak bisa menghapus akun.'); window.location='login.php';</script>";
    }
} else {
    header("Location: login.php");
}
?>