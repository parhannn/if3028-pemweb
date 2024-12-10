<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];

    $sql = "UPDATE registrations SET name = ?, email = ?, age = ?, gender = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ssisi', $name, $email, $age, $gender, $id);

    if ($stmt->execute()) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'error' => $conn->error]);
    }
}
?>
