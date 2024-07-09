<?php

session_start();
require_once('connection.php');


ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

if (isset($_POST['recipebtn'])) {

    if (!isset($_SESSION['User_ID'])) {
        echo 'User not logged in.';
        exit();
    }

    $userID = $_SESSION['User_ID'];
    $title = mysqli_real_escape_string($con, $_POST['recipetitle']);
    $category = mysqli_real_escape_string($con, $_POST['category']);
    $ingredients = mysqli_real_escape_string($con, $_POST['ingredients']);
    $instructions = mysqli_real_escape_string($con, $_POST['instructions']);
    $image = $_FILES['recipeimage'];

    if (empty($title) || empty($category) || empty($ingredients) || empty($instructions) || empty($image['name'])) {
        echo 'Please fill all available spaces';
    } else {

        $image_path = 'uploads/' . uniqid() . '_' . basename($image['name']);
        
        if (move_uploaded_file($image['tmp_name'], $image_path)) {
            $stmt = $con->prepare("INSERT INTO recipes (userID, title, category, ingredients, instructions, imagepath) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("isssss", $userID, $title, $category, $ingredients, $instructions, $image_path);
            
            if ($stmt->execute()) {
                echo 'Recipe posted successfully!';
                header('Location: userpage.php');
                exit();
            } else {
                echo 'Please check your query';
            }
            $stmt->close();
        } else {
            echo 'Failed to upload image';
        }
    }
}
?>
