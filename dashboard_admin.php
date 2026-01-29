<?php
session_start();
if ($_SESSION['role'] != 'admin') {
    header("Location: login.php");
}
?>

<h2>Dashboard Admin</h2>
<a href="buku/index.php">Data Buku</a> |
<a href="peminjaman/index.php">Peminjaman</a> |
<a href="user/index.php">Tambah User</a> |
<a href="logout.php">Logout</a>
