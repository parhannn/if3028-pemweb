<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "tugas_crud";

$conn = new mysqli($host, $username, $password);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$sql_create_db = "CREATE DATABASE IF NOT EXISTS $database";
if ($conn->query($sql_create_db) === TRUE) {
    echo "Database '$database' berhasil dibuat atau sudah ada.<br>";
} else {
    die("Gagal membuat database: " . $conn->error);
}

$conn->select_db($database);

$sql = "
CREATE TABLE IF NOT EXISTS registrations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL,
    age INT NOT NULL,
    gender ENUM('Laki-Laki', 'Perempuan') NOT NULL,
    file_path VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
";

if ($conn->query($sql) === TRUE) {
    echo "Tabel 'registrations' berhasil dibuat!";
} else {
    echo "Error membuat tabel: " . $conn->error;
}

$conn->close();
echo "Migrasi selesai!";
?>

<!-- 
Cara Menggunakan
1. Simpan File: Simpan skrip di atas dalam file dengan nama, misalnya, migration.php

2. Edit Konfigurasi Database: Ganti nilai $host, $username, $password, dan $database dengan konfigurasi MySQL Anda

3. Jalankan Skrip:
    - Letakkan file di folder server web Anda (misalnya, htdocs untuk XAMPP)
    - Akses melalui browser: http://localhost/tugas_crud/migration.php

4. Verifikasi:
    - Setelah eksekusi, periksa database Anda untuk memastikan tabel registrations berhasil dibuat.
-->