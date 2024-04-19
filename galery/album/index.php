<?php
$title = "Album - My Gallery";
include_once "../layouts/header.php";
require_once "../core/func.php";


if (auth() == false) {
    header("Location: index.php");
}

$user = $_SESSION["user"]["userId"];


$albums = read("SELECT * FROM album WHERE userId = '$user'");

?>
<div class="row justify-content-center mt-5 display-3">
    Index of Album
</div>
<div class="container mt-5 mb-4">
    <a href="create.php" class="btn btn-success">Create Album</a>
</div>

<div class="container">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Album</th>
                <th>Deskripsi</th>
                <th class="float-end">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($albums as $album): ?>
                <tr>
                    <td><?= $i++; ?></td>
                    <td><?= $album['NamaAlbum']; ?></td>
                    <td><?= $album['Deskripsi']; ?></td>
                    <td class="float-end">
                        <a href="edit.php?id=<?= $album['albumId']; ?>" class="btn btn-info">Edit</a>
                        <a href="hapus.php?id=<?= $album['albumId']; ?>" class="btn btn-danger"
                            onclick="return confirm('are you sure')">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>



<?php include_once "../layouts/footer.php"; ?>