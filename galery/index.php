<?php
$title = "Home - My Gallery";
include_once "layouts/header.php";
require_once "core/func.php";

if ($_SESSION["user"] == false) {
    header("Location: login.php");
}

$query = "SELECT * FROM foto WHERE fotoId";
$result = mysqli_query($conn, $query);

// $fotod = mysqli_query($conn, "SELECT * FROM foto");
// $rows = mysqli_fetch_assoc($fotod);
// dd($rows);

// $fotos = read("SELECT * FROM foto");


?>

<div class="container mt-5">
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="assets/image/10.jpg" class="d-block w-100 " height="500" alt="...">
            </div>
            <div class="carousel-item">
                <img src="assets/image/12.jpg" class="d-block w-100" height="500" alt="...">
            </div>
            <div class="carousel-item">
                <img src="assets/image/8.jpg" class="d-block w-100" height="500" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>

<div class="container mt-5">
    <h1 class="display-5">Epic Picture</h1>
</div>

<div class="grid" data-masonry='{ "itemSelector": ".grid-item", "columnWidth": 200 }'>
    <div class="row mt-2 ms-5 ">
        <?php
        while ($foto = mysqli_fetch_array($result)) {
            ?>
            <div class="col-md-3 mb-3">
                <div class="card">
                     <img src="../assets/image/<?= $foto['lokasi']; ?>" alt="">
                    <div class="card-body">
                        <h5 class="card-title"><?= $foto['judul']; ?></h5>
                        <p class="card-text"><?= $foto['deskripsi']; ?></p>
                        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                            <?php $fotoId = $foto['fotoId'];
                            $sql = mysqli_query($conn, "select * from likefoto where fotoID='$fotoId'");
                            $row = mysqli_num_rows($sql); ?>
                            <a href="likefoto.php?id=<?= $foto['fotoId']; ?>" class="btn btn-danger">Like <?php if ($row > 0) {
                                  echo $row;
                              } ?></a>
                            <a href="foto/detail.php?id=<?= $foto['fotoId']; ?>" class="btn btn-primary ms-1">View</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>

    </div>
</div>

<?php include_once "layouts/footer.php"; ?>