<?php
session_start();
require_once('connection.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $group = mysqli_real_escape_string($con, $_POST['group']);
    $password = password_hash('defaultPassword', PASSWORD_DEFAULT); // Set a default password or generate a random one

    $stmt = $con->prepare("INSERT INTO users (User_Name, User_Email, Password, grpID) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("sssi", $username, $email, $password, $group);

    if ($stmt->execute()) {
        echo 'User created successfully';
    } else {
        echo 'User creation failed';
    }
    $stmt->close();
    header('Location: table.php');
    exit;
}
?>
