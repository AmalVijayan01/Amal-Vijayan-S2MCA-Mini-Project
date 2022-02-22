<?php
include 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Homeli food ordering system</title>
        <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
        <!-- font awesome cdn link  -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <!-- custom css file link  -->
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
    <!-- header section starts  -->
        <header class="header">
            <a href="#" class="logo"> <i class="fas fa-shopping-basket"></i> Homeli Foodi </a>
            <nav class="navbar">
                <a href="landing.php">Home</a>
                <a href="#products">About</a>
                <a href="#categories">Contact</a>
                <a href="login.php">Login</a>
                <a href="signup.php">Register</a>
                <a href="chefsignup.php">Chef Registrations</a>
            </nav>
            <form action="" class="search-form">
                <input type="search" id="search-box" placeholder="search here...">
                <label for="search-box" class="fas fa-search"></label>
            </form>
        </header>
    <!-- header section ends -->
    </body>
</html>