<?php
session_start();
    //masukan file cinnection.php
require 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === "POST"){
    //ambil nilai input fullname
    $fullname = htmlspecialchars($_POST['fullname']);
    //ambil nilai input email 
    $email = htmlspecialchars($_POST['email']);
    //ambil nilai input password
    $password = htmlspecialchars($_POST['password']);
    //ambil nilai input password_confirm
    $password_confirm = htmlspecialchars($_POST['password_confirm']);

    //variabel penampung error validasi

    $error = [];

    //mengecekan input fullname tidak boleh kosong
    if (empty($fullname)) {
        $error['fullname'] = "fullname is required";
    }

    //pengcekan input email tidak  boleh kosong
    if (empty($email)) {
        $error['email'] = "email is required";
    }
    //pengcekan input password tidak boleh kosong
    if (empty($password)) {
        $error['password'] = "password is required";
    }
    //pengcekan input password_confirm tidak boleh kosong
    if (empty($password_confirm)) {
        $error['password_confirm'] = "password_confirm is required";
    }

    //pengcekan input password dan password_confirm sama
    if ($password !== $password_confirm){
        $error['password_confirm'] = "password and confirm password do not match";
    }

    if (!empty($error)) {
        $_SESSION['error'] = $error;
        $_SESSION['old'] = [
            "fullname" => $fullname,
            "email" => $email,
        ];
        echo "<meta http-equiv='refresh' content='1;url=index.php'>";
        exit();
    }



   
    if (empty($error)) {
        $hash_password = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO users(fullname, email, password) VALUES ('$fullname','$email','$hash_password')";


        if (mysqli_query($connect, $query)) {
            echo "<meta http-equiv='refresh' content='1;url=login.php'>";
        }else{
            echo "error: " . mysqli_error($con);
        }



    }







}