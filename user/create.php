<?php
include "../koneksi.php";

if (isset($_POST['simpan'])) {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role = $_POST['role'];

    $cek = $koneksi->query("SELECT * FROM user WHERE username='$username'");
    if ($cek->num_rows > 0) {
        echo "Username sudah ada";
    } else {
        $koneksi->query("
            INSERT INTO user (username, password, role)
            VALUES ('$username','$password','$role')
        ");
        header("Location: index.php");
    }
}
?>

<h2>Tambah User</h2>
<form method="post">
    <input name="username" placeholder="Username" required><br><br>
    <input type="password" name="password" placeholder="Password" required><br><br>
    <select name="role">
        <option value="admin">Admin</option>
        <option value="siswa">Siswa</option>
    </select><br><br>
    <button name="simpan">Simpan</button>
</form>
