<?php
    $host="localhost";
    $user="root";
    $pass="";
    $db="mido_try";
    
    $connect= mysqli_connect($host, $user, $pass, $db);

    if (!$connect) {
        die("Koneksi Gagal" . mysqli_connect_error());  
}
?>