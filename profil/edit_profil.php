<?php
session_start();
// PERBAIKAN: Gunakan ../ karena file koneksi ada tepat 1 tingkat di atas folder profil
require '../koneksi.php';

// Pastikan sudah login
if (!isset($_SESSION['id_user'])) {
    // PERBAIKAN: Gunakan ../ karena login.php ada di folder utama AKADEMIK
    header("Location: ../login.php");
    exit();
}

$id_user = $_SESSION['id_user'];

// Ambil data user yang sedang login
$query = $koneksi->query("SELECT * FROM users WHERE id_user = '$id_user'");
$data = $query->fetch_assoc();

// Proses Update
if (isset($_POST['update'])) {
    $nama_baru = mysqli_real_escape_string($koneksi, $_POST['nama_lengkap']);
    $user_baru = mysqli_real_escape_string($koneksi, $_POST['username']);

    $sql = "UPDATE users SET nama_lengkap = '$nama_baru', username = '$user_baru' WHERE id_user = '$id_user'";
    
    if ($koneksi->query($sql)) {
        $_SESSION['nama_lengkap'] = $nama_baru; 
        // PERBAIKAN: Arahkan kembali ke dashboard utama di root
        echo "<script>alert('Profil berhasil diperbarui!'); window.location='../index.php';</script>";
    } else {
        echo "Gagal memperbarui: " . $koneksi->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profil - Sistem Akademik</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        body { font-family: 'Poppins', sans-serif; background-color: #f4f7f6; }
        .card-profile { border-radius: 15px; border: none; }
        .profile-header {
            background: linear-gradient(45deg, #007bff, #00d2ff);
            height: 100px;
            border-radius: 15px 15px 0 0;
        }
        .profile-icon {
            font-size: 60px;
            background-color: white; color: #007bff;
            width: 100px; height: 100px;
            display: flex; align-items: center; justify-content: center;
            border-radius: 50%; margin: -50px auto 10px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
  <div class="container">
    <a class="navbar-brand fw-bold" href="../index.php">🎓 AKADEMIK</a>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="../index.php">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="../mahasiswa/index.php">Mahasiswa</a></li>
        <li class="nav-item"><a class="nav-link" href="../prodi/index.php">Prodi</a></li>
        <li class="nav-item"><a class="nav-link text-info fw-bold active" href="edit_profil.php">Edit Profile</a></li>
        <li class="nav-item"><a class="nav-link text-danger" href="../logout.php">Logout</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <div class="card card-profile shadow-lg">
                <div class="profile-header"></div>
                <div class="profile-icon"><i class="bi bi-person-circle"></i></div>
                <div class="card-body p-4 text-center">
                    <h4 class="fw-bold mb-4">Pengaturan Profil</h4>
                    <form method="POST">
                        <div class="mb-3 text-start">
                            <label class="form-label fw-semibold">Username</label>
                            <input type="text" name="username" class="form-control" value="<?= htmlspecialchars($data['username'] ?? ''); ?>" required>
                        </div>
                        <div class="mb-3 text-start">
                            <label class="form-label fw-semibold">Nama Lengkap</label>
                            <input type="text" name="nama_lengkap" class="form-control" value="<?= htmlspecialchars($data['nama_lengkap'] ?? ''); ?>" required>
                        </div>
                        <div class="d-grid gap-2 mt-4">
                            <button type="submit" name="update" class="btn btn-primary shadow-sm">Simpan Perubahan</button>
                            <a href="../index.php" class="btn btn-light border">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>