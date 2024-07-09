<?php
session_start();
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require_once('connection.php');

if (isset($_POST['csavebtn'])) {
    $email = mysqli_real_escape_string($con, $_POST['cemail']);
    $password = mysqli_real_escape_string($con, $_POST['cpassword']);

    if (empty($email) || empty($password)) {
        echo 'Please fill all available spaces';
    } else {
        $stmt = $con->prepare("SELECT User_ID, User_Name, Password, grpID FROM users WHERE User_Email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        if ($user && password_verify($password, $user['Password'])) {
            $_SESSION['User_ID'] = $user['User_ID'];
            $_SESSION['username'] = $user['User_Name'];
            $_SESSION['group'] = $user['grpID'];

            header('Location: userpage.php');
            exit;
        } else {
            echo 'Invalid email or password';
        }
        $stmt->close();
    }
}
?>
