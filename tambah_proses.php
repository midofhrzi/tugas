<?php
session_start();
require 'koneksi.php'; // Pastikan koneksi database sudah benar

// Cek apakah user sudah login
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php"); // jika tidak login, arahkan ke login
    exit();
}

if (isset($_POST['submit'])) {
    $title = $_POST['title']; // Mengambil judul
    $content = $_POST['content']; // Mengambil konten
    $create_at = $_POST['create_at']; // Mengambil tanggal dari form
    $users_id = $_SESSION['user_id']; // Mendapatkan user_id dari session yang login

    $query = "INSERT INTO posts (title, content, create_at, users_id) VALUES (?, ?, ?, ?)";
    
    if ($stmt = mysqli_prepare($connect, $query)) {
        mysqli_stmt_bind_param($stmt, "sssi", $title, $content, $create_at, $users_id);
        
        if (mysqli_stmt_execute($stmt)) {
            // Jika berhasil, redirect ke halaman utama
            header('Location: index.php');
            exit();
        } else {
            echo "Gagal menambahkan data: " . mysqli_error($connect);
        }
        mysqli_stmt_close($stmt);
    } else {
        echo "Error dalam query: " . mysqli_error($connect);
    }
}
?>
