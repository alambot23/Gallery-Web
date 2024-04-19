<?php
$title = "Foto - My Gallery";
include_once "../layouts/header.php";
require_once "../core/func.php";


if (auth() == false) {
   header("Location: index.php");
}

$user = $_SESSION["user"]["userId"];

$fotos = read("SELECT * FROM foto WHERE userId = '$user'");


?>

<div class="row justify-content-center mt-5 display-3">
    Index of Foto's
</div>

<div class="container mt-5 mb-4">
    <a href="create.php" class="btn btn-success">Create Foto</a>
</div>

<div class="container">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Foto</th>
                <th>Deskripsi</th>
                <th>Tanggal</th>
                <th>Gambar</th>
                <th class="float-end">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach($fotos as $foto): ?>
                <tr>
                   <td><?= $i++; ?></td>
                   <td><?= $foto['judul']; ?></td>
                   <td><?= $foto['deskripsi']; ?></td>
                   <td><?= $foto['tanggal']; ?></td>
                   <td><img src="../assets/image/<?= $foto['lokasi']; ?>" width="100" class="img-thumbnail rounded" alt=""></td>
                    <td class="float-end">
                        <a href="detail.php?id=<?= $foto['fotoId']; ?>" class="btn btn-info">View</a>
                        <a href="edit.php?id=<?= $foto['fotoId']; ?>" class="btn btn-success">Edit</a>
                        <a href="hapus.php?id=<?= $foto['fotoId']; ?>" class="btn btn-danger" onclick="return confirm('are you sure')">Hapus</a>
                    </td>
                </tr>
                <?php endforeach; ?>
        </tbody>
    </table>
</div>



<?php include_once "../layouts/footer.php"; ?>