<?php
$host = "localhost";
$user = "root";           // Ganti jika username MySQL kamu bukan 'root'
$password = "";           // Ganti jika ada password MySQL
$database = "pln_monitoring1_survey";

// Buat koneksi
$mysqli = new mysqli($host, $user, $password, $database);

// Cek koneksi
if ($mysqli->connect_errno) {
    die("Koneksi ke database gagal: " . $mysqli->connect_error);
}
?>
