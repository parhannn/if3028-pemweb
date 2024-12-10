<?php
include 'db.php';

$sql = "SELECT * FROM registrations";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Registrasi</title>
    <link rel="stylesheet" href="assets/global.css">
    <link rel="stylesheet" href="assets/list.css">
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
</head>
<body>
    <nav>
        <label class="logo">
            <span class="logo-text">Farhan Apri Kesuma</span>
            <img src="assets/icons/favicon.png" alt="Logo" class="web-logo" />
        </label>
    </nav>


    <div class="content">
        <h1>Daftar Registrasi</h1>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Umur</th>
                    <th>Jenis Kelamin</th>
                    <th>File</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= htmlspecialchars($row['name']) ?></td>
                    <td><?= htmlspecialchars($row['email']) ?></td>
                    <td><?= htmlspecialchars($row['age']) ?></td>
                    <td><?= htmlspecialchars($row['gender']) ?></td>
                    <td><a href="<?= htmlspecialchars($row['file_path']) ?>" target="_blank" class="btn">Lihat File</a></td>
                    <td>
                        <button class="btn green-btn edit-btn" 
                                data-id="<?= $row['id'] ?>" 
                                data-name="<?= htmlspecialchars($row['name']) ?>" 
                                data-email="<?= htmlspecialchars($row['email']) ?>" 
                                data-age="<?= htmlspecialchars($row['age']) ?>" 
                                data-gender="<?= htmlspecialchars($row['gender']) ?>">
                            Edit
                        </button>
                        <a href="delete.php?id=<?= $row['id'] ?>" 
                           onclick="return confirm('Hapus data ini?')" 
                           class="btn red-btn">Hapus</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

        <div class="btn-container">
            <a href="form.php" class="btn">Kembali ke Formulir</a>
        </div>
    </div>

    <div id="editModal" class="modal" style="display: none;">
        <div class="modal-content">
            <span class="close-btn" id="closeModal">&times;</span>
            <h2>Edit Data</h2>
            <form id="editForm">
                <input type="hidden" name="id" id="editId" class="form-control">
                <label class="form-label">Nama</label>
                <input type="text" name="name" id="editName" class="form-control" required>
                
                <label class="form-label">Email</label>
                <input type="email" name="email" id="editEmail" class="form-control" required>
                
                <label class="form-label">Umur</label>
                <input type="number" name="age" id="editAge" class="form-control" required>
                
                <label class="form-label">Jenis Kelamin</label>
                <select name="gender" id="editGender" class="form-control" required>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>

                <div class="btn-container">
                    <button type="submit" class="btn green-btn">Simpan</button>
                    <button type="button" class="btn red-btn" id="cancelEdit">Batal</button>
                </div>
            </form>
        </div>
    </div>

    <footer>
        <p>&copy; 2024 Farhan Apri Kesuma</p>
    </footer>

    <script>
        const editBtns = document.querySelectorAll('.edit-btn');
        const editModal = document.getElementById('editModal');
        const closeModal = document.getElementById('closeModal');
        const cancelEdit = document.getElementById('cancelEdit');
        const editForm = document.getElementById('editForm');

        editBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                document.getElementById('editId').value = btn.dataset.id;
                document.getElementById('editName').value = btn.dataset.name;
                document.getElementById('editEmail').value = btn.dataset.email;
                document.getElementById('editAge').value = btn.dataset.age;
                document.getElementById('editGender').value = btn.dataset.gender;
                editModal.style.display = 'block';
            });
        });

        closeModal.addEventListener('click', () => {
            editModal.style.display = 'none';
        });

        cancelEdit.addEventListener('click', () => {
            editModal.style.display = 'none';
        });

        editForm.addEventListener('submit', async (e) => {
            e.preventDefault();
            const formData = new FormData(editForm);
            const response = await fetch('update.php', {
                method: 'POST',
                body: formData
            });

            const result = await response.json();
            if (result.success) {
                alert('Data berhasil diperbarui');
                location.reload();
            } else {
                alert('Terjadi kesalahan: ' + result.error);
            }
        });

        window.addEventListener('click', (e) => {
            if (e.target === editModal) {
                editModal.style.display = 'none';
            }
        });
    </script>
</body>
</html>
