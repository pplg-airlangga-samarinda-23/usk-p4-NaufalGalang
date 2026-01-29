<?php
session_start();
include "koneksi.php";

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = $koneksi->query("SELECT * FROM user WHERE username='$username'");
    $user = $query->fetch_assoc();

    if ($user && password_verify($password, $user['password'])) {
    $_SESSION['login'] = true;
    $_SESSION['id_user'] = $user['id_user']; 
    $_SESSION['role'] = $user['role'];

    if ($user['role'] == 'admin') {
        header("Location: dashboard_admin.php");
    } else {
        header("Location: dashboard_anggota.php");
    }
    exit;
}
}
?>

<form method="post">
    <h2>Login</h2>
    <input type="text" name="username" placeholder="Username" required><br><br>
    <input type="password" name="password" placeholder="Password" required><br><br>
    <button name="login">Login</button>
    <a href="register.php">Register</a>
</form>
