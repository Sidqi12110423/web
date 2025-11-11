<?php
include 'includes/connection.php';
session_start();

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $no_hp = $_POST['no_hp'];
    $idpel = $_POST['idpel'];
    $no_rangka = $_POST['no_rangka'];
    $unit = $_SESSION['unit'];

    $stmt = $mysqli->prepare("INSERT INTO identitas (nama, alamat, no_hp, idpel, no_rangka, unit) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $nama, $alamat, $no_hp, $idpel, $no_rangka, $unit);
    $stmt->execute();

    header("Location: input_survey.php"); // redirect ke halaman selanjutnya
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Input Identitas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4 text-center">Form Input Identitas</h2>
        <form action="" method="POST">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea class="form-control" id="alamat" name="alamat" rows="2" required></textarea>
            </div>
            <div class="mb-3">
                <label for="no_hp" class="form-label">No HP</label>
                <input type="text" class="form-control" id="no_hp" name="no_hp" required>
            </div>
            <div class="mb-3">
                <label for="idpel" class="form-label">IDPEL Eksisting</label>
                <input type="text" class="form-control" id="idpel" name="idpel" required>
            </div>
            <div class="mb-3">
                <label for="no_rangka" class="form-label">No Rangka (Opsional)</label>
                <input type="text" class="form-control" id="no_rangka" name="no_rangka">
            </div>
            <button type="submit" name="submit" class="btn btn-primary w-100">Lanjut</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
