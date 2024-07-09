<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Logout</title>
    <link rel="stylesheet" href="LPstyle.css">
</head>
<body class="logout">
    <h2>Are you sure you want to log out?</h2>
    <p>You will be unable to like or post content if you are logged out.</p>
    <div id="out">
        <a href="logoutfunction.php" class="button">YES</a>
        <a href="landingpage.php" class="button">NO</a>
    </div>
</body>
</html>