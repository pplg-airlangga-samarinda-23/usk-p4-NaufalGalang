<?php
session_start();
include "../koneksi.php";

if ($_SESSION['role'] != 'admin') {
    header("Location: ../login.php");
}

$data = $koneksi->query("SELECT * FROM user ORDER BY id DESC");
?>

<h2>Manajemen User</h2>
<a href="create.php">Tambah User</a><br><br>

<table border="1" cellpadding="5">
<tr>
    <th>No</th>
    <th>Username</th>
    <th>Role</th>
    <th>Aksi</th>
</tr>

<?php $no=1; while ($u = $data->fetch_assoc()) { ?>
<tr>
    <td><?= $no++ ?></td>
    <td><?= $u['username'] ?></td>
    <td><?= $u['role'] ?></td>
    <td>
        <a href="edit.php?id=<?= $u['id'] ?>">Edit</a> |
        <a href="delete.php?id=<?= $u['id'] ?>"
           onclick="return confirm('Hapus user ini?')">Hapus</a>
    </td>
</tr>
<?php } ?>
</table>

<br>
<a href="../dashboard_admin.php">Kembali</a>
