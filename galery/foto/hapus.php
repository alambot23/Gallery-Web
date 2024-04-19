<?php
require_once "../core/func.php";


if (auth() == false) {
    header("Location: index.php");
}

$get = $_GET["id"];

$result = read( "SELECT * FROM foto WHERE fotoId = '$get'")[0];

$query = "DELETE FROM foto WHERE fotoId = '$get'";
unlink("../assets/image/" . $row["lokasi"]);

mysqli_query($conn, $query);

mysqli_affected_rows($conn);


header("Location: index.php");