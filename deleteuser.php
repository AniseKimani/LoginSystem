<?php
session_start();
require_once('connection.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = mysqli_real_escape_string($con, $_POST['user_id']);

    $stmt = $con->prepare("DELETE FROM users WHERE User_ID = ?");
    $stmt->bind_param("i", $user_id);

    if ($stmt->execute()) {
        echo 'User deleted successfully';
    } else {
        echo 'User deletion failed';
    }
    $stmt->close();
    header('Location: table.php');
    exit;
}
?>

