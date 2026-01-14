<!-- 
<?php
# cara 1
    $db = mysqli_connect('localhost','root','','db_akademik');
?> -->

<?php
# cara 2
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $db_name = 'db_akademik';
   
    // open connection
    $koneksi = new mysqli($host, $user, $password, $db_name);
?>
