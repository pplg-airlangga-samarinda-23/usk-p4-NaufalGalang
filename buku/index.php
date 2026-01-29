<?php
session_start();
include "../koneksi.php";

if ($_SESSION['role'] != 'admin') {
    header("Location: ../login.php");
}

$data = $koneksi->query("SELECT * FROM buku ORDER BY id_buku DESC");
?>

<h2>Data Buku</h2>
<a href="create.php">Tambah Buku</a>
<br><br>

<table border="1" cellpadding="5">
<tr>
    <th>No</th>
    <th>Judul</th>
    <th>Penulis</th>
    <th>Stok</th>
    <th>Status</th>
    <th>Aksi</th>
</tr>

<?php $no=1; while ($b = $data->fetch_assoc()) { ?>
<tr>
    <td><?= $no++ ?></td>
    <td><?= $b['judul'] ?></td>
    <td><?= $b['penulis'] ?></td>
    <td><?= $b['stok'] ?></td>
    <td><?= $b['status'] ?></td>
    <td>
        <a href="edit.php?id=<?= $b['id_buku'] ?>">Edit</a> |
        <a href="delete.php?id=<?= $b['id_buku'] ?>" 
           onclick="return confirm('Hapus buku ini?')">Hapus</a>
    </td>
</tr>
<?php } ?>
</table>

<br>
<a href="../dashboard_admin.php">Kembali ke Dashboard</a>
