<?php
session_start();
include 'includes/connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $no_register = $_POST['no_register'];
    $tanggal_bayar = $_POST['tanggal_bayar'];
    $tanggal_pasang = $_POST['tanggal_pasang'];
    $tanggal_integrasi = $_POST['tanggal_integrasi'];

    $stmt = $mysqli->prepare("INSERT INTO langsung_pekerjaan (survey_id, no_register, tanggal_bayar, tanggal_pasang, tanggal_integrasi)
                              VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("issss", $survey_id, $no_register, $tanggal_bayar, $tanggal_pasang, $tanggal_integrasi);
    $stmt->execute();

    header("Location: input_identitas.php"); 
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Input Data Jalur Langsung</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container py-5">
    <div class="card shadow-sm">
        <div class="card-header bg-success text-white">
            <h4 class="mb-0">Form Input Jalur Langsung</h4>
        </div>
        <div class="card-body">
            <form method="POST">
                <div class="mb-3">
                    <label for="no_register" class="form-label">No Register</label>
                    <input type="text" name="no_register" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="tanggal_bayar" class="form-label">Tanggal Bayar</label>
                    <input type="date" name="tanggal_bayar" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="tanggal_pasang" class="form-label">Tanggal Pasang</label>
                    <input type="date" name="tanggal_pasang" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="tanggal_integrasi" class="form-label">Tanggal Integrasi</label>
                    <input type="date" name="tanggal_integrasi" class="form-control" required>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="dashboard.php" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
