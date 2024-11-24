<?php
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'account';

$conn = new mysqli($host, $username, $password);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql_create_db = "CREATE DATABASE IF NOT EXISTS $dbname";
if ($conn->query($sql_create_db) === TRUE) {
    echo "Database '$dbname' berhasil dibuat atau sudah ada.<br>";
} else {
    die("Gagal membuat database: " . $conn->error);
}

$conn->select_db($dbname);

$sql_create_table = "
CREATE TABLE IF NOT EXISTS table_account (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    nim VARCHAR(50) NOT NULL
)";
if ($conn->query($sql_create_table) === TRUE) {
    echo "Tabel 'table_account' berhasil dibuat atau sudah ada.<br>";
} else {
    die("Gagal membuat tabel: " . $conn->error);
}

$conn->close();
echo "Migrasi selesai!";
?>
