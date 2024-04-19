<?php
require_once "../core/func.php";


if (auth() == false) {
    header("Location: index.php");
}

$get = $_GET["id"];

$query = "DELETE FROM album WHERE albumId = '$get'";

mysqli_query($conn, $query);

header("Location: index.php");