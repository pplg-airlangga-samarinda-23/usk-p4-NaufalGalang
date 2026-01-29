<?php
session_start();
if ($_SESSION['role'] != 'siswa') {
    header("Location: login.php");
}
?>

<h2>Dashboard Siswa</h2>
<a href="peminjaman/form-pinjam.php">Pinjam Buku</a> |
<a href="logout.php">Logout</a>
