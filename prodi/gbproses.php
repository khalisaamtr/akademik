<?php
    include ("../koneksi.php");
?>


<?php
// create 
if (isset($_POST['submit'])){
    $nama_prodi = $_POST['nama_prodi'];
    $jenjang = $_POST['jenjang'];
    $keterangan = $_POST['keterangan'];
    $sql = "INSERT INTO prodi(nama_prodi,jenjang,keterangan) VALUES ('$nama_prodi','$jenjang','$keterangan')";

    $query = $koneksi->query($sql);
    header("Location: index.php");
    exit();
}
?>

<?php 
// edit

if (isset($_POST['update'])) {
    // Ambil data dari POST, bukan GET
    $id = intval($_POST['id']);
    $nama_prodi = $_POST['nama_prodi'];
    $jenjang = $_POST['jenjang'];
    $keterangan = $_POST['keterangan'];

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
?>

<?php 
    $sql = "DELETE FROM prodi where id=$_GET[id]";
    $hapus = $koneksi->query($sql);
    if($hapus){
        header("Location: index.php");
        exit();
    }else{
        echo "Gagal menghapus data";
    }
?>


