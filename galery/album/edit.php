<?php
$title = "Create - My Gallery";
include_once "../layouts/header.php";
require_once "../core/func.php";


if (auth() == false) {
    header("Location: index.php");
}

$user = $_GET["id"];
$albums = read("SELECT * FROM album WHERE albumId = '$user'")[0];
// dd($albums);

if (isset($_POST["album"])) {
    if (update_album($_POST) > 0) {
        alert("Album has success update");
        page("index.php");
    } else {
        alert("gagal");
    }
}

?>


<div class="row mt-5 justify-content-center">
    <div class="col-md-4">
        <div class="card bg-primary">
            <div class="card-header">Update Album</div>
            <div class="card-body">
                <form action="" method="post">
                    <input type="hidden" name="albumId" value="<?= $albums['albumId']; ?>">
                    <div class="mb-3">
                        <label for="NamaAlbum">Nama Album : </label>
                        <input type="text" name="NamaAlbum" id="NamaAlbum" value="<?= $albums['NamaAlbum']; ?>" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="Deskripsi">Deskripsi : </label>
                        <textarea name="Deskripsi" class="form-control"><?= $albums['Deskripsi']; ?></textarea>
                    </div>
                    <a href="index.php" class="btn btn-danger">Kembali</a>
                    <button type="submit" name="album" class="btn btn-success float-end">Update</button>
                </form>
            </div>
        </div>
    </div>

</div>

<?php include_once "../layouts/footer.php"; ?>