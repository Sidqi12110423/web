<?php
session_start();
include 'includes/connection.php';

$error = '';

if (isset($_POST['login'])) {
    $unit = $_POST['unit'];
    $password = $_POST['password'];

    $stmt = $mysqli->prepare("SELECT * FROM users WHERE unit = ? AND password = ?");
    $stmt->bind_param("ss", $unit, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $_SESSION['unit'] = $unit;
        header("Location: input_identitas.php");
        exit();
    } else {
        $error = "Unit atau Password salah!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Monitoring Survey PLN</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: #f1f1f1; }
        .login-box {
            max-width: 400px;
            margin: 80px auto;
            padding: 30px;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0px 0px 10px #ccc;
        }
    </style>
</head>
<body>

<div class="login-box">
    <h4 class="text-center text-white bg-primary p-2 rounded">Login Monitoring Survey PLN</h4>

    <?php if ($error): ?>
        <div class="alert alert-danger"><?= $error ?></div>
    <?php endif; ?>

    <form method="post">
        <div class="mb-3">
            <label class="form-label">Pilih Unit</label>
            <select name="unit" class="form-select" required>
                <option value="">-- Pilih Unit --</option>
                <option value="Up3">Up3</option>
                <option value="Cipayung(53811) Teknik">Cipayung(53811) Teknik</option>
                <option value="Cipayung(53811) Pp">Cipayung(53811) Pp</option>
                <option value="Bogor Timur(53821) Teknik">Bogor Timur(53821) Teknik</option>
                <option value="Bogor Timur(53821) Pp">Bogor Timur(53821) Pp</option>
                <option value="Bogor Kota(53831) Teknik">Bogor Kota(53831) Teknik</option>
                <option value="Bogor Kota(53831) Pp">Bogor Kota(53831) Pp</option>
                <option value="Bogor Barat(53841) Teknik">Bogor Barat(53841) Teknik</option>
                <option value="Bogor Barat(53841) Pp">Bogor Barat(53841) Pp</option>
                <option value="Leuwiliang(53851) Teknik">Leuwiliang(53851) Teknik</option>
                <option value="Leuwiliang(53851) Pp">Leuwiliang(53851) Pp</option>
                <option value="Jasinga(53853) Teknik">Jasinga(53853) Teknik</option>
                <option value="Jasinga(53853) Pp">Jasinga(53853) Pp</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <button name="login" class="btn btn-primary w-100">Masuk</button>
    </form>

    <div class="text-center mt-3">
        <small>© 2025 PLN UP3 Bogor</small>
    </div>
</div>

</body>
</html>
