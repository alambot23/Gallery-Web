<?php
$title = "Create - My Gallery";
include_once "../layouts/header.php";
require_once "../core/func.php";


if (auth() == false) {
    header("Location: index.php");
}


if (isset($_POST["album"])) {
    if (create_album($_POST) > 0) {
        alert("Album has success create");
        page("index.php");
    } else {
        alert("gagal");
    }
}

?>
 

 <div class="row mt-5 justify-content-center">
        <div class="col-md-4">
            <div class="card bg-info">
                <div class="card-header">Create Album</div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="mb-3">
                            <label for="NamaAlbum">Nama Album : </label>
                            <input type="text" required name="NamaAlbum" id="NamaAlbum" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="Deskripsi">Deskripsi : </label>
                            <textarea name="Deskripsi" required class="form-control"></textarea>
                        </div>
                        <a href="index.php" class="btn btn-danger">Kembali</a>
                        <button type="submit" name="album" class="btn btn-success float-end">Create</button>
                    </form>
                </div>
            </div>
        </div>

    </div>

<?php include_once "../layouts/footer.php"; ?>