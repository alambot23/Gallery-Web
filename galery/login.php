<?php 
require_once "core/func.php";


if (isset($_POST["login"])) {
    if (login($_POST) > 0 ){
        alert("Welcom");
        header("Location: index.php ");
    } else {
        alert ("Login Gagal");
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
    <title>Login - My Gallery</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
</head>

<body>
    <div class="row mt-5 justify-content-center">
        <div class="col-md-4">
            <div class="card bg-danger">
                <div class="card-header">Login</div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="mb-3">
                            <label for="username">Username : </label>
                            <input type="text" required name="username" id="username" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="password">password : </label>
                            <input type="password" required name="password" id="password" class="form-control">
                        </div>
                         <a href="register.php" class="btn btn-info">register</a>
                        <button type="submit" name="login" class="btn btn-success float-end">Login</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
</body>

</html>