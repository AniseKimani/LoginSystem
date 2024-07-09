<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="register.css">
</head>
<body>
    <div class="signup">
        <h1>Sign Up</h1>
        <form action="signupfunction.php" method="post">
            <label>User Name</label>
            <input type="text" placeholder="" class="txt" name="username">
            <label>Email</label>
            <input type="email" placeholder="" class="txt" name="email">
            <label>User Group</label>
            <select name="group" required>
                <option value="Client">Client</option>
                <option value="Recipe Owner">Recipe Owner</option>
            </select>
            <label>Password</label>
            <input type="password" placeholder="" class="txt" name="password">
            <label>Confirm Password</label>
            <input type="password" placeholder="" class="txt" name="password2">
            <input type="submit" value="Submit" class="btn" name="savebtn">
        </form>
        <p id="p2">By clicking the Sign Up button, you agree to our <br> <a href="#">Terms and Conditions</a> and <a href="#">Privacy Policies</a></p>
        <p id="lin">Already have an account? <a href="login.php">Log In</a></p>
    </div>
</body>
</html>