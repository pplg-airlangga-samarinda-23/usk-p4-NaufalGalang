<?php
session_start();
include '../koneksi.php';

if (!isset($_SESSION['id_user'])) {
    die("User belum login");
}

$id_user = $_SESSION['id_user'];
$id_buku = $_POST['id_buku'];
$tgl_pinjam = date('Y-m-d');

$sql = "INSERT INTO peminjaman (id_user, id_buku, tgl_pinjam)
        VALUES ('$id_user', '$id_buku', '$tgl_pinjam')";

mysqli_query($koneksi, $sql);
