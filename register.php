<?php
include "koneksi.php";

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role = $_POST['role'];

    // Cek username sudah ada atau belum
    $cek = $koneksi->query("SELECT * FROM user WHERE username='$username'");

    if ($cek->num_rows > 0) {
        echo "<p style='color:red'>Username sudah digunakan</p>";
    } else {
        $koneksi->query("
            INSERT INTO user (username, password, role)
            VALUES ('$username','$password','$role')
        ");
        echo "<p style='color:green'>Register berhasil</p>";
    }
}
?>

<form method="post">
    <h2>Register</h2>
    <input type="text" name="username" placeholder="Username" required><br><br>
    <input type="password" name="password" placeholder="Password" required><br><br>
    <select name="role">
        <option value="admin">Admin</option>
        <option value="siswa">Siswa</option>
    </select><br><br>
    <button name="register">Register</button>
      <a href="logout.php">kembali ke halaman login</a>
</form>
