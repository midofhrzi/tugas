<?php
    //aktifkan session
session_start();
    //ambil nilai session error
$error=$_SESSION['error']??[];
    //ambil nilai session old untuk ditampilkan padaa input
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
  </head>
  <body>
<div class="container";>
    <div class="row justify-content-center">
        <div class="col-4">

        <div class="card">
        <div class="card-body">
            <h3>Create new account</h3>
            <form action="register_proses.php" method="POST" class="mt-3">

            <div class="mb-3">  
                <label for="fullname" class="form-label">Fullname</label>
                <input type="text" name="fullname" class="form-control" value="<?= $old['fullname'] ?? '' ?>">
                        <?php if (isset($error['fullname'])): ?>
                        <small class="text-danger"><?= $error['fullname'] ?></small>
                        <?php endif; ?>
            </div>
            <div class="mb-3">  
                <label for="email" class="form-label">Email</label>
                <input type="text" name="email" class="form-control" value="<?= $old['email'] ?? '' ?>">
                        <?php if (isset($error['email'])): ?>
                        <small class="text-danger"><?= $error['email'] ?></small>
                        <?php endif; ?>
            </div>
            <div class="mb-3">  
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control">
                        <?php if (isset($error['password'])): ?>
                        <small class="text-danger"><?= $error['password'] ?></small>
                        <?php endif; ?>
            </div>
            <div class="mb-3">  
                <label for="password_confirm" class="form-label">Password Confirm</label>
                <input type="text" name="password_confirm" class="form-control">
                        <?php if (isset($error['password_confirm'])): ?>
                        <small class="text-danger"><?= $error['password_confirm'] ?></small>
                        <?php endif; ?>
            </div>

            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary">Register</button>
            </div>

            </form>
            <p class="text-center mt-3"> 
                have an account? 
                <a href="login.php" class="text-decoration-none fw-bold">login</a>
            </p>
        </div>
        </div>

        </div>
    </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
  </body>
</html>