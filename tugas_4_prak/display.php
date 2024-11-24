<?php
$host = 'localhost';
$username = 'root'; 
$password = ''; 
$dbname = 'account'; 

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$limit = 10;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$start = ($page > 1) ? ($page * $limit) - $limit : 0;

$total_result = $conn->query("SELECT COUNT(*) AS total FROM table_account");
$total_data = $total_result->fetch_assoc()['total'];

$total_pages = ceil($total_data / $limit);

$sql = "SELECT * FROM table_account LIMIT $start, $limit";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Tabel</title>
    <link rel="icon" href="assets/icons/favicon.png" type="image/png">
</head>
<body>

    <h2>Data dari Tabel Account</h2>

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
    
    <div>
        <?php
        if ($page > 1) {
            echo '<a href="?page=' . ($page - 1) . '">Sebelumnya</a> ';
        }

        for ($i = 1; $i <= $total_pages; $i++) {
            if ($i == $page) {
                echo '<strong>' . $i . '</strong> ';
            } else {
                echo '<a href="?page=' . $i . '">' . $i . '</a> ';
            }
        }

        if ($page < $total_pages) {
            echo '<a href="?page=' . ($page + 1) . '">Berikutnya</a>';
        }
        ?>
    </div>

    <br>
    <a href="display_all.php"><button>Tampilkan Semua Data</button></a>
    <a href="main.php"><button>Kembali ke Formulir</button></a>  

</body>
</html>

<?php
$conn->close();
?>
