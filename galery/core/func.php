<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "galeri");

// custome function

function dd($data)
{
    echo "<pre>";
    var_dump($data);
    echo "</pre>";
    die;

}

function alert($msg)
{
    echo "
    <script>alert('$msg');</script>
    ";
}

function login($data)
{

    global $conn;

    $username = $data["username"];
    $password = md5($data["password"]);

    $query = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";

    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    $user = $row;
    $_SESSION["user"] = $user;

    return $_SESSION["user"];
}
function auth()
{
    if (isset($_SESSION["user"])) {
        return true;
    }

    return false;
}

function register($data)
{

    global $conn;
    $username = $data["username"];
    $password = md5($data["password"]);
    $email = $data["email"];
    $fullName = $data["fullName"];
    $alamat = $data["alamat"];

    $query = "INSERT INTO user VALUES(NULL, '$username', '$password', '$email', '$fullName', '$alamat')";

    $result = mysqli_query($conn, $query);


    return mysqli_affected_rows($conn);

}

function page($red)
{
    echo "
    <script>window.location.href = '$red';</script>;
    ";
}



function create_album($data)
{

    global $conn;
    $id = $_SESSION["user"]["userId"];
    $NamaAlbum = $data["NamaAlbum"];
    $deskripsi = $data["Deskripsi"];
    $tanggal = date('Y-m-d');

    $query = "INSERT INTO album VALUES(NULL, '$NamaAlbum', '$deskripsi', '$tanggal', '$id')";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);

}

function read($query)
{

    global $conn;

    $result = mysqli_query($conn, $query);

    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;


}

function komentar($data)
{
    global $conn;

    $fotoId = $data["fotoId"];
    $userId = $data["userId"];
    $komentar = $data["komentar"];
    // dd($komentar);
    $date = date('Y-m-d');


    $query = "INSERT INTO komentar VALUES (NULL, '$fotoId', '$userId', '$komentar', '$date')";
    // dd($query);
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function update_album($data)
{

    global $conn;
    $albumId = $data["albumId"];
    $NamaAlbum = $data["NamaAlbum"];
    $deskripsi = $data["Deskripsi"];

    $query = "UPDATE album SET NamaAlbum = '$NamaAlbum', Deskripsi = '$deskripsi' WHERE albumId = '$albumId'";

    $result = mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);


}

function update_komentar($data)
{
    global $conn;
    $komentarId = $data["komentarId"];
    $komentar = $data["komentar"];

    $query = "UPDATE komentar SET komentar = '$komentar' WHERE komentarId = '$komentarId'";

    $result = mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);

}


// foto

function create_foto($data)
{

    // dd($data);
    global $conn;
    $albumId = $data["gambar"];
    $id = $_SESSION["user"]["userId"];
    $judul = $data["judul"];
    $deskripsi = $data["deskripsi"];
    $tanggal = date('Y-m-d');
    // $lokasi = $data["lokasi"];
    $lokasi = upload();
    // dd($lokasi);

    $query = "INSERT INTO foto VALUES(NULL, '$judul', '$deskripsi', '$tanggal', '$lokasi' ,'$albumId', '$id')";

    // dd($query);
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);

}

function update_foto($data)
{
    global $conn;
    $fotoId = $data["fotoId"];
    $albumId = $data["gambar"];
    $judul = $data["judul"];
    $deskripsi = $data["deskripsi"];


    if ($_FILES["lokasi"]["error"] === 4) {
        $lokasi = $data["lokasi"];
    } else {
        $lokasi = upload();
    }

    // dd($_FILES);

    $query = "UPDATE foto SET judul = '$judul', deskripsi = '$deskripsi', lokasi = '$lokasi', albumId = '$albumId' WHERE fotoId = '$fotoId'";

    // dd($albumId);
    $result = mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);

}


function upload()
{
    $name = $_FILES["lokasi"]["name"];
    $tmp_name = $_FILES["lokasi"]["tmp_name"];
    $error = $_FILES["lokasi"]["error"];
    $size = $_FILES["lokasi"]["size"];

    if ($error === 4) {

        alert("Error");
        return false;
    }

    $ekstensiValid = ["jpg", "png", "jpeg", "gif"];
    $ekstensi = explode('.', $name);
    $ekstensi = strtolower(end($ekstensi));
    if (!in_array($ekstensi, $ekstensiValid)) {
        alert("Error Not Image");
        return false;
    }

    $nama = uniqid() . '.' . $ekstensi;
    move_uploaded_file($tmp_name, "../assets/image/" . $nama);
    return $nama;

}