<?php
session_start();
require_once('connection.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = mysqli_real_escape_string($con, $_POST['user_id']);
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $group = mysqli_real_escape_string($con, $_POST['group']);

    $stmt = $con->prepare("UPDATE users SET User_Name = ?, User_Email = ?, grpID = ? WHERE User_ID = ?");
    $stmt->bind_param("ssii", $username, $email, $group, $user_id);

    if ($stmt->execute()) {
        echo 'User updated successfully';
    } else {
        echo 'User update failed';
    }
    $stmt->close();
    header('Location: table.php');
    exit;
}
?>