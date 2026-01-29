<?php
session_start();
include "../koneksi.php";

if (!isset($_SESSION['id_user'])) {
    die("ID user tidak ditemukan. Silakan login terlebih dahulu.");
}

if ($_SESSION['role'] != 'siswa') {
    die("Halaman ini hanya untuk siswa.");
}

$buku = $koneksi->query("SELECT * FROM buku WHERE status='tersedia' AND stok > 0");
?>

<h2>Form Pinjam Buku</h2>

<form method="post" action="proses-pinjam.php">
    <select name="id_buku" required>
        <option value="">-- Pilih Buku --</option>
        <?php while ($b = $buku->fetch_assoc()) { ?>
            <option value="<?= $b['id_buku'] ?>">
                <?= $b['judul'] ?> (stok: <?= $b['stok'] ?>)
            </option>
        <?php } ?>
    </select>
    <br><br>
    <button type="submit">Pinjam</button>
</form>

<br>
<a href="../dashboard_anggota.php">Kembali</a>
