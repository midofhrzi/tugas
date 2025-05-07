<?php
    require 'koneksi.php';
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $id=$_POST['id'];

    $query="DELETE FROM users WHERE id=$id";

    if (mysqli_query($connect, $query)) {

    echo"<meta http-equiv='refresh' content='1;url=index.php'>";
    }else {

    echo mysqli_error($connect);
    echo"<meta http-equiv='refresh' content='5;url=index.php'>";
    }
}
mysqli_close($connect);
?>