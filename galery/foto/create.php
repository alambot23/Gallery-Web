<?php
$title = "Create - My Gallery";
include_once "../layouts/header.php";
require_once "../core/func.php";


if (auth() == false) {
    header("Location: index.php");
}


if (isset($_POST["foto"])) {
    // dd($_FILES);
    unset($_POST["foto"]);
    // dd($_POST);
    if (create_foto($_POST) > 0) {
        alert("foto has success create");
        page("index.php");
    } else {
        alert("gagal");
    }
}

$id = $_SESSION["user"]["userId"];


$albums = read("SELECT * FROM album WHERE userId = '$id'");
// dd($albums[0]["albumId"]);

?>
 

 <div class="row mt-5 justify-content-center">
        <div class="col-md-4">
            <div class="card bg-info">
                <div class="card-header">Create foto</div>
                <div class="card-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="judul">Nama foto : </label>
                            <input type="text" required name="judul" id="judul" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi">deskripsi : </label>
                            <textarea name="deskripsi" required class="form-control"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="lokasi">Gambar : </label>
                            <input type="file" required class="form-control" name="lokasi" id="lokasi">
                        </div>
                        <div class="mb-3">
                            <label for="">Pilih Album</label>
                            <select name="gambar" id="gambar" class="form-control">
                                <option value="" hidden> Pilih Album</option>
                                <?php foreach ($albums as $album): ?>
                                <option value="<?= $album['albumId']; ?>" class="form-control">"<?= $album['NamaAlbum']; ?>"</option>
                                <?php endforeach; ?>
                            </select>   
                        </div>
                        <a href="index.php" class="btn btn-danger">Kembali</a>
                        <button type="submit" name="foto" class="btn btn-success float-end">Create</button>
                    </form>
                </div>
            </div>
        </div>

    </div>

<?php include_once "../layouts/footer.php"; ?>