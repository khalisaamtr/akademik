<?php
// Pengaturan Database
$host = 'localhost';
$user = 'root';
$password = '';
$db_name = 'db_akademik'; // Nama database kamu

// Membuka koneksi menggunakan metode Object-Oriented
$koneksi = new mysqli($host, $user, $password, $db_name);

// Cek apakah koneksi berhasil
if ($koneksi->connect_error) {
    // Jika gagal, tampilkan pesan error dan hentikan program
    die("Koneksi ke database gagal: " . $koneksi->connect_error);
}
?>