<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'] ?? null;
    $email = $_POST['email'] ?? null;
    $age = $_POST['age'] ?? null;
    $gender = $_POST['gender'] ?? null;
    $file = $_FILES['file'] ?? null;

    $errors = [];

    if (strlen($name) < 3) {
        $errors[] = "Nama harus minimal 3 karakter.";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Email tidak valid.";
    }

    if (!is_numeric($age) || $age <= 0) {
        $errors[] = "Umur harus angka positif.";
    }

    if ($file['error'] !== UPLOAD_ERR_OK) {
        $errors[] = "File tidak berhasil diunggah.";
    } else {
        if ($file['size'] > 1024 * 1024) {
            $errors[] = "Ukuran file maksimal 1 MB.";
        }

        $allowedTypes = ['text/plain'];
        $fileType = mime_content_type($file['tmp_name']);
        if (!in_array($fileType, $allowedTypes)) {
            $errors[] = "Hanya file teks (.txt) yang diperbolehkan.";
        }
    }

    $_SESSION['form_data'] = [
        'name' => $name,
        'email' => $email,
        'age' => $age,
        'gender' => $gender
    ];

    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        header("Location: form.php");
        exit;
    }

    $uploadDir = "uploads/";
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0755, true);
    }

    $filePath = $uploadDir . basename($file['name']);
    if (move_uploaded_file($file['tmp_name'], $filePath)) {
        $fileContent = file_get_contents($filePath);
        $_SESSION['data'] = [
            'name' => $name,
            'email' => $email,
            'age' => $age,
            'gender' => $gender,
            'filePath' => $filePath,
            'fileContent' => $fileContent
        ];
        header("Location: result.php");
        exit;
    } else {
        $_SESSION['errors'] = ["Gagal menyimpan file."];
        header("Location: form.php");
        exit;
    }
}
?>
