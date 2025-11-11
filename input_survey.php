<?php
session_start();
include 'includes/connection.php'; // ⬅️ gunakan ini, bukan input_survey.php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tanggal_survey = $_POST['tanggal_survey'];
    $jalur = $_POST['jalur'];

    // Upload Foto
    $foto = $_FILES['foto']['name'];
    $tmp = $_FILES['foto']['tmp_name'];
    $folder = "uploads/";
    $path = $folder . date("YmdHis") . "_" . basename($foto);
    move_uploaded_file($tmp, $path);

    // Simpan ke DB
    $stmt = $mysqli->prepare("INSERT INTO hasil_survey (identitas_id, tanggal_survey, foto_survey, jalur) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("isss", $identitas_id, $tanggal_survey, $path, $jalur);
    $stmt->execute();

    $survey_id = $stmt->insert_id;

    if ($jalur == "Perluasan") {
        header("Location: perluasan.php?id=" . $survey_id);
    } else {
        header("Location: langsung.php?id=" . $survey_id);
    }
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Input Hasil Survey</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-success text-white">Input Hasil Survey Lapangan</div>
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="tanggal_survey" class="form-label">Tanggal Survey</label>
                    <input type="date" name="tanggal_survey" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="foto" class="form-label">Upload Foto</label>
                    <input type="file" name="foto" class="form-control" accept="image/*" required>
                </div>
                <div class="mb-3">
                    <label for="jalur" class="form-label">Pilih Jalur</label>
                    <select name="jalur" class="form-select" required>
                        <option value="">-- Pilih Jalur --</option>
                        <option value="Perluasan">Perluasan</option>
                        <option value="Langsung">Langsung</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-success w-100">Lanjutkan</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>
