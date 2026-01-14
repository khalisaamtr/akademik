<?php
    include ("../koneksi.php");
?>


<?php
// create 
if (isset($_POST['submit'])){
    $nim = $_POST['nim'];
    $nama_mhs = $_POST['nama_mhs'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $alamat = $_POST['alamat'];
    $prodi_id = $_POST['prodi_id'];
    $sql = "INSERT INTO mahasiswa(nim,nama_mhs,tgl_lahir,alamat, prodi_id) VALUES ('$nim','$nama_mhs','$tgl_lahir','$alamat','$prodi_id')";

    $query = $koneksi->query($sql);
    header("Location: index.php");
    exit();
}
?>

<?php 
// edit

if (isset($_POST['update'])) {
    // Ambil data dari POST, bukan GET
    $nim = intval($_POST['nim']);
    $nama_mhs = $_POST['nama_mhs'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $alamat = $_POST['alamat'];
    $prodi_id = $_POST['prodi_id'];

    $sql = "UPDATE mahasiswa 
            SET nama_mhs='$nama_mhs', 
                tgl_lahir='$tgl_lahir', 
                alamat='$alamat',
                prodi_id='$prodi_id'
            WHERE nim=$nim";

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
    $sql = "DELETE FROM mahasiswa where nim=$_GET[nim]";
    $hapus = $koneksi->query($sql);
    if($hapus){
        header("Location: index.php");
        exit();
    }else{
        echo "Gagal menghapus data";
    }
?>


