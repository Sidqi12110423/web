<?php
session_start();
include 'connection.php';

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $unit = $_POST['unit'];

    $query = "SELECT * FROM users WHERE username='$username' AND password='$password' AND unit='$unit'";
    $result = $mysqli->query($query);

    if ($result->num_rows > 0) {
        $_SESSION['username'] = $username;
        $_SESSION['unit'] = $unit;
        header("Location: dashboard.php");
        exit;
    } else {
        $error = "Login gagal. Periksa kembali data Anda.";
    }
}
?>

<!-- HTML Login Form -->
<form method="post">
    Username: <input type="text" name="username" required><br>
    Password: <input type="password" name="password" required><br>
    Pilih Unit:
    <select name="unit">
        <option value="UP3">UP3</option>
        <option value="Cipayung Teknik">Cipayung (53811) Teknik</option>
        <option value="Cipayung Pp">Cipayung (53811) Pp</option>
        <!-- Tambahkan lainnya sesuai daftar -->
    </select><br>
    <button type="submit" name="login">Login</button>
</form>

<?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>

