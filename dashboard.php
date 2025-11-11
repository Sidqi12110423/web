<?php echo 'Form Identitas'; ?>
<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit;
}
?>

<h2>Form Identitas Survey Lapangan</h2>
<form method="POST" action="submit_identitas.php">
    Nama: <input type="text" name="nama" required><br>
    Alamat: <textarea name="alamat" required></textarea><br>
    No HP: <input type="text" name="no_hp" required><br>
    IDPEL Eksisting: <input type="text" name="idpel" required><br>
    No Rangka (opsional): <input type="text" name="no_rangka"><br>
    <button type="submit" name="submit">Kirim</button>
</form>
