<?php
session_start();
if (!isset($_SESSION['User_ID'])) {
    header('Location: login.php');
    exit();
}
require_once('connection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Foodie</title>
    <link rel="stylesheet" href="LPstyle.css">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
</head>
<body>
    <header id="nav">
        <h1 class="logo">Foodie</h1>
        <nav class="navbar">
            <ul>
                <li><a href="userpage.php">Home</a></li>
                <li><a href="logout.php">Logout</a></li>
                <li><a href="#">Recipes</a></li>
                <li><a href="recipe.php">Post Recipe</a></li>
                <li><a href="#">Products</a></li>
                <li><a href="#">Contacts</a></li>
                <li><a href="#">About</a></li>
                <li><a href="profile.php">View Profile</a></li>
            </ul>
        </nav>
        <?php if ($_SESSION['group'] == 1): ?>
        <div id="BTNS">
            <a href="table.php" class="button">ADMIN DASHBOARD</a>
        </div>
        <?php endif; ?>
    </header>
    <main>
        <section class="hero">
       
            <h2 class="catch">Easy Masterchef Recipes to Try at Home</h2>
            <div id="slider">
                <figure>
                    <img src="LPimage1.jpg" alt="Delicious Dish 1">
                    <img src="slide2.jpg" alt="Delicious Dish 2">
                    <img src="slide3.jpg" alt="Delicious Dish 3">
                    <img src="slide4.jpg" alt="Delicious Dish 4">
                    <img src="LPimage1.jpg" alt="Delicious Dish 5">
                </figure>
            </div>
            <p id="catch2">&hearts;Indulging in flavors that make life delicious, because foodie adventures are the best adventures.&hearts;</p>
        </section>
        <section class="FOLDER">
            <div class="folder1">
                <div class="album">
                    <a href="#">
                        <img src="breakfast.jpg" class="image2" alt="Pancakes with maple syrup drizzled on top">
                        <div class="gallery">
                            <h4 class="word">Breakfast Meals</h4>
                            <p class="word2">Done in under 15 minutes</p>
                        </div>
                    </a>
                </div>
                <div class="album">
                    <a href="#">
                        <img src="salad.jpg" class="image2" alt="A salad">
                        <div class="gallery">
                            <h4 class="word">Healthy Lunches</h4>
                            <p class="word2">Using only the healthiest ingredients</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="folder2">
                <div class="album">
                    <a href="#">
                        <img src="dessert.jpg" class="image2" alt="Cheesecake with Italian Meringue buttercream">
                        <div class="gallery">
                            <h4 class="word">Desserts</h4>
                            <p class="word2">Sweet, savory, and explosively tasteful</p>
                        </div>
                    </a>
                </div>
                <div class="album">
                    <a href="#">
                        <img src="cheat-day.jpg" class="image2" alt="Pizza">
                        <div class="gallery">
                            <h4 class="word">Comfort Foods</h4>
                            <p class="word2">Made tastier and healthier than at a restaurant</p>
                        </div>
                    </a>
                </div>
            </div>
        </section>
         <section class="reviews">
            <h3>Raving Reviews from Subscribers</h3>
            <blockquote>
                <p>"I recently tried their chocolate lava cake recipe, and it was absolutely divine. The instructions were clear and easy to follow, resulting in a perfectly gooey center encased in a moist, chocolatey exterior. My guests couldn't stop raving about it, and I can't wait to try more dessert recipes from this site!"</p>
                <cite>- @SweetToothSamantha</cite>
            </blockquote>
            <blockquote>
                <p>"As someone who loves fresh and healthy meals, I'm always on the lookout for new salad recipes, and this website delivers in spades. I recently made their spinach and strawberry salad with balsamic vinaigrette, and it was a hit with my family."</p>
                <cite>- @FreshFeastFiona</cite>
            </blockquote>
            <blockquote>
                <p>"I recently tried their homemade pepperoni pizza, and it was better than anything I could get from a restaurant. I love how customizable the recipes are, allowing me to create my perfect slice of pizza every time."</p>
                <cite>- @PizzaPleasurePeter</cite>
            </blockquote>
            <blockquote>
                <p>"Start your day off right with the delicious breakfast recipes from this website! Whether you're a fan of sweet or savory breakfasts, this website has something for everyone."</p>
                <cite>- @MorningMagicMegan</cite>
            </blockquote>
        </section>
    </main>
    <footer>
        <h1 id="endlogo">Foodie</h1>
        <p id="p1">Except as permitted by the copyright law applicable to you, you may not reproduce or communicate any of the content on this website, including files downloadable from this website, without the permission of the copyright owner.</p>
        <ul id="l2">
            <li><a href="#">Privacy Policy</a></li>
            <li><a href="#">Business Inquiries</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Contact Information</a></li>
        </ul>
        <p>For any complaints, don't hesitate to call:<br>3445-0012<br>or email:<br><a href="mailto:info@foodie.com">info@foodie.com</a></p>
        <p>&copy; 2024 Foodie. All rights reserved.</p>
    </footer>
</body>
</html>
