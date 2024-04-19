<?php
$title = "Update - My Gallery";
include_once "../layouts/header.php";
require_once "../core/func.php";


if (auth() == false) {
    header("Location: index.php");
}


if (isset($_POST["foto"])) {
    unset($_POST["foto"]);
    // dd($_POST);
    if (update_komentar($_POST) > 0) {
        alert("komentar has update has success Update");
        page("index.php");
    } else {
       alert("Komunitas merlarang");
    }
}

$id = $_GET["id"];
$fotos = read("SELECT * FROM komentar WHERE komentarId = '$id'")[0];

?>
 

 <div class="row mt-5 justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Update Komentar</div>
                <div class="card-body">
                    <form action="" method="post" >
                        <input type="hidden" name="komentarId" value="<?= $fotos['komentarId']; ?>">
                        <div class="mb-3">
                            <label for="komentar">Komentar : </label>
                            <textarea required name="komentar" class="form-control"><?= $fotos['komentar']; ?></textarea>
                        </div>
                        <a href="index.php" class="btn btn-danger">Kembali</a>
                        <button type="submit" name="foto" class="btn btn-success float-end">Update</button>
                    </form>
                </div>
            </div>
        </div>

    </div>

<?php include_once "../layouts/footer.php"; ?>