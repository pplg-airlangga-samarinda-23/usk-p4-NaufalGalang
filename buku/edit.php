<?php
include "../koneksi.php";

$id = $_GET['id'];
$buku = $koneksi->query("SELECT * FROM buku WHERE id_buku='$id'")->fetch_assoc();

if (isset($_POST['update'])) {
    $judul = $_POST['judul'];
    $penulis = $_POST['penulis'];
    $stok = $_POST['stok'];
    $status = ($stok > 0) ? 'tersedia' : 'tidak';

    $koneksi->query("
        UPDATE buku SET
        judul='$judul',
        penulis='$penulis',
        stok='$stok',
        status='$status'
        WHERE id_buku='$id'
    ");

    header("Location: index.php");
}
?>

<form method="post">
    <input name="judul" value="<?= $buku['judul'] ?>"><br><br>
    <input name="penulis" value="<?= $buku['penulis'] ?>"><br><br>
    <input type="number" name="stok" value="<?= $buku['stok'] ?>"><br><br>
    <button name="update">Update</button>
</form>
