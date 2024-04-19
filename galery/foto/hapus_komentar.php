<?php
require_once "../core/func.php";


if (auth() == false) {
    header("Location: index.php");
}

$get = $_GET["id"];

$query = "DELETE FROM komentar WHERE komentarId = '$get'";

mysqli_query($conn, $query);

header("Location: index.php");