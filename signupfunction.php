<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require_once('connection.php');
    if(isset($_POST['savebtn']))
    {
        $username = mysqli_real_escape_string($con, $_POST['username']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $group = mysqli_real_escape_string($con, $_POST['group']);
        $password = mysqli_real_escape_string($con, $_POST['password']);
        $cpassword = mysqli_real_escape_string($con, $_POST['password2']);

        if(empty($username) || empty($email) || empty($password) || empty($cpassword)){
            echo 'Please Fill all Available Spaces';
        }
        elseif($password != $cpassword){
            echo 'Password Not Matched';
        }
        else{
            $hashed_password = password_hash($password, PASSWORD_BCRYPT);

            $grpID = null;
            switch ($group){
                case 'Client': $grpID = 2 ;
                break;
                case 'Recipe Owner': $grpID = 3 ;
                break;
                default: echo 'Please enter a user group';
                exit;
            }

            $stmt = $con->prepare("INSERT INTO users (User_Name, User_Email, grpID, Password) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssis", $username, $email, $grpID, $hashed_password);

            if ($stmt->execute()) {
                echo 'Your record has been saved to the database';
                header ('Location: login.php');
            } else {
                echo 'Please check your query';
            }
            $stmt->close();
        }
    }

?>