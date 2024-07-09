<?php
session_start();
require_once('connection.php');

if (!isset($_SESSION['User_ID'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['User_ID'];
$query = "SELECT User_Name, User_Email, grpID FROM users WHERE User_ID = ?";
$stmt = $con->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
} else {
    echo "User not found.";
    exit();
}

$stmt->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Profile</title>
    <link rel="stylesheet" href="profile.css">
</head>
<body>
    <h1>User Profile</h1>
    <div class="profile-info">
        <p><strong>User ID:</strong> <?php echo $user_id; ?></p>
        <p><strong>Username:</strong> <?php echo $user['User_Name']; ?></p>
        <p><strong>Email:</strong> <?php echo $user['User_Email']; ?></p>
        <p><strong>Group:</strong> <?php echo $user['grpID']; ?></p>
    </div>
    <a href="userpage.php">Back to Home</a>
</body>
</html>
