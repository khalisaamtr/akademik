<?php
session_start();
session_destroy(); // Menghapus semua session
header("Location: login.php"); // Kembali ke halaman login
exit();
?>