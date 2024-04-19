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
    if (update_foto($_POST) > 0) {
        alert("foto has success Update");
        page("index.php");
    } else {
        alert("gagal");
    }
}

$id = $_GET["id"];
$fotos = read("SELECT * FROM foto WHERE fotoId = '$id'")[0];

// dd($fotos["albumId"]);

$albums = read("SELECT * FROM album");

?>
 

 <div class="row mt-5 justify-content-center">
        <div class="col-md-4">
            <div class="card bg-info">
                <div class="card-header">Edit foto</div>
                <div class="card-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="fotoId" value="<?= $fotos['fotoId']; ?>">
                        <input type="hidden" name="lokasi" value="<?= $fotos['lokasi']; ?>">
                        <!-- <input type="hidden" name="albumId" value=""> -->
                        <div class="mb-3">
                            <label for="judul">Nama foto : </label>
                            <input type="text" required name="judul" id="judul" class="form-control" value="<?= $fotos['judul']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi">deskripsi : </label>
                            <textarea name="deskripsi" required class="form-control"><?= $fotos['deskripsi']; ?></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="lokasi">Gambar : </label>
                            <input type="file" class="form-control" required name="lokasi" id="lokasi">
                        </div>
                        <div class="mb-3">
                            <label for="">Pilih Album</label>
                            <select name="gambar"required id="gambar" class="form-control">
                                <option value="" hidden> Pilih Album</option>
                                <?php foreach ($albums as $album): ?>
                                <option required value="<?= $fotos['albumId']; ?>" class="form-control">"<?= $album['NamaAlbum']; ?>"</option>
                                <?php endforeach; ?>
                            </select>   
                        </div>
                        <a href="index.php" class="btn btn-danger">Kembali</a>
                        <button type="submit" name="foto" class="btn btn-success float-end">Update</button>
                    </form>
                </div>
            </div>
        </div>

    </div>

<?php include_once "../layouts/footer.php"; ?>