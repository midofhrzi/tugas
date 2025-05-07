<?php

    require 'koneksi.php';

    if($_SERVER['REQUEST_METHOD'] == "POST"){

    $id= $_POST['id'];
    $judul= $_POST['judul'];
    $pengarang= $_POST['pengarang'];
    $tanggal= $_POST['tanggal'];
    
    

    $query="UPDATE users SET judul='$judul',pengarang='$pengarang',tanggal='$tanggal' WHERE id= $id ";
        // var_dump(
            // $query
        // );
        // die();
    if (mysqli_query($connect, $query)) {

        echo"<meta http-equiv='refresh' content='1;url=index.php'>";
    }else{

    echo mysqli_error($connect);
    echo"<meta http-equiv='refresh' content='5;url=edit.php?id=$id'>";
    }
}
mysqli_close($connect);
?>  