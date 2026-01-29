<?php
include "../koneksi.php";

if (isset($_POST['simpan'])) {
    $judul = $_POST['judul'];
    $penulis = $_POST['penulis'];
    $stok = $_POST['stok'];

    $status = ($stok > 0) ? 'tersedia' : 'tidak';

    $koneksi->query("
        INSERT INTO buku 
        VALUES (NULL,'$judul','$penulis','$stok','$status',NOW())
    ");

    header("Location: index.php");
}
?>

<form method="post">
    <input name="judul" placeholder="Judul" required><br><br>
    <input name="penulis" placeholder="Penulis" required><br><br>
    <input type="number" name="stok" min="0" placeholder="Stok" required><br><br>
    <button name="simpan">Simpan</button>
</form>
