<?php
include "../koneksi.php";

$id = $_GET['id'];
$koneksi->query("DELETE FROM buku WHERE id_buku='$id'");

header("Location: index.php");
