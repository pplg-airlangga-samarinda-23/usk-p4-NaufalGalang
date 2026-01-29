<?php
include "../koneksi.php";

$id = $_GET['id'];       // id peminjaman
$id_buku = $_GET['buku'];

// Update peminjaman
$koneksi->query("
    UPDATE peminjaman 
    SET status='kembali', tgl_kembali=CURDATE() 
    WHERE id='$id'
");

// Tambah stok buku
$koneksi->query("
    UPDATE buku 
    SET stok = stok + 1, status='tersedia' 
    WHERE id_buku='$id_buku'
");

header("Location: index.php");
