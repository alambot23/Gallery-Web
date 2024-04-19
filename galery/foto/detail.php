<?php
$title = "Detail     - My Gallery";
include_once "../layouts/header.php";
require_once "../core/func.php";


if (auth() == false) {
    header("Location: index.php");
}

$userId = $_SESSION["user"]["userId"];
$nama = $_SESSION["user"]["username"];
$get = $_GET["id"];


if (isset($_POST["submit"])) {
    unset($_POST["submit"]);
    // dd($_POST);
    if (komentar($_POST) > 0) {
        alert("komentar berhasil ditambahkan harap Refresh dengan cara menekan Enter Pada URL");
    } else {
        alert("gagal");
    }
}



$query = "SELECT * FROM foto WHERE fotoId = '$get'";
$result = mysqli_query($conn, $query);
$fotos = mysqli_fetch_assoc($result);

$komens = read("SELECT * FROM komentar INNER JOIN user ON komentar.userId = user.userId WHERE fotoId = '$get'");


?>
<div class="container mt-5">
    <a href="index.php" class="btn btn-danger"><--Back </a>
</div>
<div class="container">
    <div class="row mt-4">
        <div class="col-md-4">
            <img src="../assets/image/<?= $fotos['lokasi']; ?>" alt="img" class="img-fluid rounded ">
        </div>
        <div class="col-md-4 ms-5">
            <h2><?= $fotos['judul']; ?></h2>
            <hr>
            <blockquote class="blockquote">
                <p><?= $fotos['deskripsi']; ?></p>
            </blockquote>
            <hr>
            <figcaption class="blockquote-footer mt-2">
                Upload : <cite title="Source Title"><?= $fotos['tanggal']; ?></cite>
            </figcaption>
        </div>
    </div>
</div>

<hr>
<?php foreach ($komens as $komen): ?>
    <div class="container">

        <p><?= $komen["username"]; ?> </p>
        <blockquote class="blockquote">
            <p>"<?= $komen['komentar']; ?>"</p>
        </blockquote>
        <cite title="Source Title"><?= $komen['tanggal']; ?></cite>
        <?php if($komen['userId'] == $_SESSION["user"]["userId"]): ?>
        <a href="hapus_komentar.php?id=<?= $komen['komentarId']; ?>" class="btn btn-outline-danger float-end ms-1" onclick="return confirm('yakin ingin menghapus komentar?')">Delete</a>
        <a href="edit_komentar.php?id=<?= $komen['komentarId']; ?>" class="btn btn-outline-info float-end ms-1">Update</a>
        <?php endif; ?>
      
        <hr>

    </div>
<?php endforeach; ?>

<div class="container">
    <blockquote class="blockquote">
        <p>Komentar : </p>
    </blockquote>
</div>
<div class="container mt-1">
    <form action="" method="post">
        <input type="hidden" name="userId" value="<?= $userId; ?>">
        <input type="hidden" name="fotoId" value="<?= $get; ?>">
        <textarea name="komentar" id="komentar" cols="5" rows="5" class="form-control mb-3" required
            placeholder="Leave Your Comment"></textarea>
        <button type="submit" name="submit" class="btn btn-primary float-end mb-5">komentar</button>
    </form>

</div>

<?php include_once "../layouts/footer.php"; ?>