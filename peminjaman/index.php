<?php
session_start();
include "../koneksi.php";

if ($_SESSION['role'] != 'admin') {
    header("Location: ../login.php");
}

$data = $koneksi->query("
    SELECT p.*, u.username, b.judul 
    FROM peminjaman p
    JOIN user u ON p.id_user = u.id
    JOIN buku b ON p.id_buku = b.id_buku
    ORDER BY p.id DESC
");
?>

<h2>Data Peminjaman</h2>

<table border="1" cellpadding="5">
<tr>
    <th>User</th>
    <th>Buku</th>
    <th>Tgl Pinjam</th>
    <th>Tgl Kembali</th>
    <th>Status</th>
    <th>Aksi</th>
</tr>

<?php while ($p = $data->fetch_assoc()) { ?>
<tr>
    <td><?= $p['username'] ?></td>
    <td><?= $p['judul'] ?></td>
    <td><?= $p['tgl_pinjam'] ?></td>
    <td><?= $p['tgl_kembali'] ?? '-' ?></td>
    <td><?= $p['status'] ?></td>
    <td>
        <?php if ($p['status'] == 'pinjam') { ?>
            <a href="proses-kembali.php?id=<?= $p['id'] ?>&buku=<?= $p['id_buku'] ?>">
                Kembalikan
            </a>
        <?php } else { ?>
            ✔
        <?php } ?>
    </td>
</tr>
<?php } ?>
</table>

<br>
<a href="../dashboard_admin.php">Kembali</a>
