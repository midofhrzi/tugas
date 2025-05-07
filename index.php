<?php
require 'koneksi.php';

$query = "
    SELECT posts.id, posts.title, posts.content, posts.create_at, users.fullname AS pengarang 
    FROM posts
    JOIN users ON posts.users_id = users.id
"; 
$results = mysqli_query($connect, $query);
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Posts</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>  

<nav class="navbar navbar-dark bg-dark mb-4">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">Navbar</a>
    <div>
      <a class="text-white me-3" href="index.php">Home</a>
      <a class="text-white me-3" href="posts.php">Posts</a>
      <a class="text-white" href="logout.php">Logout</a>
    </div>
  </div>
</nav>

<div class="container">
    <h1 class="mb-3">Posts</h1>
    <a href="tambah.php" class="btn btn-primary mb-3">Tambah Post</a>

    <div class="row">
        <?php
        if (mysqli_num_rows($results) > 0) {
            while ($show = mysqli_fetch_assoc($results)) {
                echo "
                    <div class='col-md-4'>
                        <div class='card mb-4'>
                            <div class='card-body'>
                                <h5 class='card-title'>{$show['title']}</h5>
                                <h6 class='card-subtitle mb-2 text-muted'>Pengarang: {$show['pengarang']}</h6>
                                <p class='card-text'>{$show['content']}</p>
                                <p class='card-text'><small class='text-muted'>Tanggal: {$show['create_at']}</small></p>
                                <a href='detail.php?id={$show['id']}' class='card-link'>Detail</a>
                                <a href='edit.php?id={$show['id']}' class='card-link'>Edit</a>
                                <form action='hapus_proses.php' method='POST' class='d-inline'>
                                    <input type='hidden' name='id' value='{$show['id']}' />
                                    <button type='submit' class='btn btn-danger btn-sm'>Hapus</button>
                                </form>
                            </div>
                        </div>
                    </div>
                ";
            }
        } else {
            echo "<div class='col-12 text-center text-danger'>Data tidak ditemukan.</div>";
        }
        ?>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
