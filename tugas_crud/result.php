<?php
session_start();
$data = $_SESSION['data'] ?? null;

if (!$data) {
    echo "<script>alert('Data tidak ditemukan.'); window.history.back();</script>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Pendaftaran</title>
    <link rel="stylesheet" href="assets/global.css">
    <link rel="stylesheet" href="assets/result.css">
    <link rel="icon" href="assets/icons/favicon.png" type="image/png"/>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
    />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
    <style>
        table {
            width: 100%;
            margin: 20px auto;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 10px;
            border: 1px solid #ddd;
        }

        th {
            background-color: #f4f4f4;
        }

        .btn-container {
            text-align: center;
            margin-top: 20px;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <nav>
        <label class="logo">
            <span class="logo-text">Farhan Apri Kesuma</span>
            <img src="assets/icons/favicon.png" alt="Logo" class="web-logo" />
        </label>
    </nav>

    <div class="content">
        <h1>Hasil Pendaftaran</h1>
        <table>
            <tr>
                <th>Nama</th>
                <td><?= htmlspecialchars($data['name']) ?></td>
            </tr>
            <tr>
                <th>Email</th>
                <td><?= htmlspecialchars($data['email']) ?></td>
            </tr>
            <tr>
                <th>Umur</th>
                <td><?= htmlspecialchars($data['age']) ?></td>
            </tr>
            <tr>
                <th>Jenis Kelamin</th>
                <td><?= htmlspecialchars($data['gender']) ?></td>
            </tr>
            <tr>
                <th>Isi Dokumen</th>
                <td><pre><?= htmlspecialchars($data['fileContent']) ?></pre></td>
            </tr>
        </table>

        <div class="btn-container">
            <a href="list.php" class="btn">Lihat Daftar Registrasi</a>
        </div>
    </div>

    <footer>
        <p>&copy; 2024 Farhan Apri Kesuma</p>
    </footer>
</body>
</html>
