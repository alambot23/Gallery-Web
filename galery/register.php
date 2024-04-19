<?php
require_once "core/func.php";

if (isset($_POST["register"])) {
    if (register($_POST) > 0) {
        alert("akun berhasil dibuat");
        page("login.php");
    } else {
        alert("registrasi gagal");
    }
}

if (auth()) {
    header("Location: index.php");
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - My Gallery</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
</head>

<body>
    <div class="row mt-5 justify-content-center">
        <div class="col-md-4">
            <div class="card bg-info">
                <div class="card-header">Register</div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="mb-3">
                            <label for="username">Username : </label>
                            <input type="text" name="username" id="username" required class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="password">password : </label>
                            <input type="password" name="password" required id="password" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="email">email : </label>
                            <input type="email" name="email" id="email" required class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="fullName">fullName : </label>
                            <input type="text" name="fullName" id="fullName" required class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="alamat">alamat : </label>
                            <input type="text" name="alamat" id="alamat" required class="form-control">
                        </div>
                        <a href="login.php" class="btn btn-danger">login</a>
                        <button type="submit" name="register" class="btn btn-success float-end">Register</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
</body>

</html>