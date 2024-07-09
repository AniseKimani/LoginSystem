<?php

session_start();
require_once('connection.php');

if (!isset($_SESSION['User_ID'])) {
    header('Location: login.php');
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Post a Recipe</title>
    <link rel="stylesheet" href="recipeform.css">
</head>
<body>
    <div class="postrecipe">
        <h1>Post a Recipe</h1>
        <form action="recipefunction.php" method="post" enctype="multipart/form-data">
            <label>Recipe Title</label>
            <input type="text" class="txt" name="recipetitle">
            <label>Category</label>
            <select class="txt" name="category">
                <option value="Breakfast meals">Breakfast meals</option>
                <option value="Healthy lunches">Healthy lunches</option>
                <option value="Desserts">Desserts</option>
                <option value="Comfort foods">Comfort foods</option>
            </select>
            <label>Ingredients</label>
            <textarea class="txt" name="ingredients"></textarea>
            <label>Instructions</label>
            <textarea class="txt" name="instructions"></textarea>
            <label>Image</label>
            <input type="file" class="txt" name="recipeimage">
            <input type="submit" value="Post Recipe" class="btn" name="recipebtn">
        </form>
    </div>
</body>
</html>
