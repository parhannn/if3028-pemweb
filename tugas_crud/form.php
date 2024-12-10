<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Pendaftaran</title>
    <link rel="stylesheet" href="assets/global.css">
    <link rel="stylesheet" href="assets/form.css">
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
    <script>
        function validateForm() {
            const name = document.getElementById("name").value.trim();
            const email = document.getElementById("email").value.trim();
            const age = document.getElementById("age").value.trim();
            const fileInput = document.getElementById("file");
            const file = fileInput.files[0];

            if (name.length < 3) {
                return;
            }

            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email)) {
                return;
            }

            if (isNaN(age) || age <= 0) {
                return;
            }

            if (!file) {
                return;
            }
            const allowedExtensions = ["png", "jpeg", "jpg"];
            const fileExtension = file.name.split(".").pop().toLowerCase();
            if (!allowedExtensions.includes(fileExtension)) {
                return;
            }
            if (file.size > 2 * 1024 * 1024) {
                return;
            }
        }
    </script>
</head>
<body>
    <?php
    if (isset($_SESSION['errors']) && !empty($_SESSION['errors'])) {
        echo "<div id='customAlert'>";
        foreach ($_SESSION['errors'] as $error) {
            echo "<p>$error</p>";
        }
        echo "</div>";
        unset($_SESSION['errors']);
    }
    ?>
    <nav>
      <label class="logo">
        <span class="logo-text">Farhan Apri Kesuma</span>
        <img src="assets/icons/favicon.png" alt="Logo" class="web-logo" />
      </label>
    </nav>

    <div class="content">
        <h1>Formulir Pendaftaran</h1>
        <form action="process.php" name="registerForm" method="POST" enctype="multipart/form-data" onsubmit="validateForm()">
            <label for="name" class="form-label">Nama</label>
            <input type="text" id="name" name="name" class="form-control" required>

            <label for="email" class="form-label">Email</label>
            <input type="email" id="email" name="email" class="form-control" required>

            <label for="age" class="form-label">Umur</label>
            <input type="number" id="age" name="age" class="form-control" required>

            <label for="gender" class="form-label">Jenis Kelamin</label>
            <select name="gender" id="gender" class="form-control" required>
                <option value="Laki-Laki">Laki-Laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>

            <label for="file" class="form-label">Upload Dokumen Teks (.txt)</label>
            <input type="file" id="file" name="file" accept=".txt" class="form-control" required>

            <div class="btn-container">
                <button type="submit" class="btn">Submit</button>
                <a href="list.php" class="btn">Lihat Daftar Registrasi</a>
            </div>
        </form>
    </div>

    <script>
        window.onload = function() {
            const alert = document.getElementById('customAlert');
            if (alert) {
                alert.style.display = 'block';
                setTimeout(function() {
                    alert.style.display = 'none';
                }, 5000);
            }
        };
    </script>

    <footer>
        <p>&copy; 2024 Farhan Apri Kesuma</p>
    </footer>
</body>
</html>