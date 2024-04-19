<?php 

require_once "core/func.php";

if (auth() == false) {
    header("Location: login.php");
}

$get = $_GET["id"];
$user = $_SESSION["user"]["userId"];
$like = mysqli_query($conn, "SELECT * FROM likefoto WHERE fotoId = '$get' AND userId = '$user'");
$row = mysqli_fetch_assoc($like);
$rows = $row["likeId"];
$date = date('Y-m-d');

if (empty($row) == false ) {
    $query = "DELETE FROM likefoto WHERE likeId = '$rows'";
    mysqli_query($conn, $query);
    mysqli_affected_rows($conn);
}else {
    $query = "INSERT INTO likefoto VALUES (NULL, '$get', '$user', '$date')";
    mysqli_query($conn, $query);
    mysqli_affected_rows($conn);
}

header ("Location: index.php");