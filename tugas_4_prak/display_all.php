<?php
$host = 'localhost';
$username = 'root'; 
$password = ''; 
$dbname = 'account'; 

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM table_account";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Semua Data</title>
    <link rel="icon" href="assets/icons/favicon.png" type="image/png">
</head>
<body>

    <h2>Semua Data dari Tabel Account</h2>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>NIM</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['nama'] . "</td>";
                    echo "<td>" . $row['nim'] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='3'>Tidak ada data</td></tr>";
            }
            ?>
        </tbody>
    </table>

    <br>
    <a href="display.php"><button>Kembali ke Halaman Utama</button></a> 

</body>
</html>

<?php
$conn->close();
?>
