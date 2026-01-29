<?php
include "../koneksi.php";

$id = $_GET['id'];
$user = $koneksi->query("SELECT * FROM user WHERE id='$id'")->fetch_assoc();

if (isset($_POST['update'])) {
    $username = $_POST['username'];
    $role = $_POST['role'];

    $koneksi->query("
        UPDATE user SET 
        username='$username',
        role='$role'
        WHERE id='$id'
    ");

    header("Location: index.php");
}
?>

<h2>Edit User</h2>
<form method="post">
    <input name="username" value="<?= $user['username'] ?>" required><br><br>
    <select name="role">
        <option value="admin" <?= $user['role']=='admin'?'selected':'' ?>>Admin</option>
        <option value="siswa" <?= $user['role']=='siswa'?'selected':'' ?>>Siswa</option>
    </select><br><br>
    <button name="update">Update</button>
</form>
