<?php
session_start();
include 'includes/connection.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $wo = $_POST['wo'];
    $pekerjaan = $_POST['pekerjaan'];
    $tanggal_commissioning = $_POST['tanggal_commissioning'];

    $stmt = $mysqli->prepare("INSERT INTO perluasan_pekerjaan (survey_id, wo, pekerjaan, tanggal_commissioning)
                              VALUES (?, ?, ?, ?)");
    $stmt->bind_param("isss", $survey_id, $wo, $pekerjaan, $tanggal_commissioning);
    $stmt->execute();

    header("Location: input_identitas.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Input Pekerjaan Perluasan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container py-5">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Form Input Pekerjaan Perluasan</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="">
                    <div class="mb-3">
                        <label for="wo" class="form-label">Nomor WO</label>
                        <input type="text" class="form-control" id="wo" name="wo" required>
                    </div>

                    <div class="mb-3">
                        <label for="pekerjaan" class="form-label">Deskripsi Pekerjaan</label>
                        <textarea class="form-control" id="pekerjaan" name="pekerjaan" rows="3" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="tanggal_commissioning" class="form-label">Tanggal Commissioning</label>
                        <input type="date" class="form-control" id="tanggal_commissioning" name="tanggal_commissioning" required>
                    </div>

                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-success">Simpan</button>
                        <button type="submit" class="btn btn-success">Selesai</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
