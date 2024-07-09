<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <link rel="stylesheet" href="register.css">
</head>
<body>
    <div class="login">
        <h1>Log In</h1>
        <form action="loginfunction.php" method="post">
            <label>Email</label>
            <input type="email" placeholder="" class="txt" name="cemail">
            <label>Password</label>
            <input type="password" placeholder="" class="txt" name="cpassword">
            <input type="submit" value="Submit" class="btn" name="csavebtn">
        </form>
        <p id="p2">By clicking the Log In button, you agree to our <br> <a href="#">Terms and Conditions</a> and <a href="#">Privacy Policies</a></p>
    </div>
</body>   
</html>