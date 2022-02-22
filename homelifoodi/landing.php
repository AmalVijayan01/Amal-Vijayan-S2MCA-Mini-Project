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
            <a href="#home">Home</a>
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

    <!-- home section starts  -->
    <section class="home" id="home">
        <div class="content">
            <h3>We have Pure<span> Home made </span> foods for you</h3>
            <p>Tasty and quality home made foods from experts home chefs</p>
            <a href="login.php" class="btn">Order now</a>
        </div>
    </section>
    <!-- home section ends -->
    <!-- features section starts  -->
    <section class="features" id="features">
        <h1 class="heading"> our <span>features</span> </h1>
        <div class="box-container">
            <div class="box">
                <img src="image/feature-img-1.png" alt="">
                <h3>fresh and healthy</h3>
                <p>Here you get fresh and healthy home made foods various talanted home chfs across the city</p>
            </div>
            <div class="box">
                <img src="image/feature-img-2.png" alt="">
                <h3>free delivery</h3>
                <p>Free delivery for food items within 15 kilometers</p>
            </div>
            <div class="box">
                <img src="image/feature-img-3.png" alt="">
                <h3>easy payments</h3>
                <p>Hungry order the food and pay it online.Simplified payment system</p>
            </div>
        </div>
    </section>

    <!-- features section ends -->
    <!-- categories section starts  -->

    <section class="categories" id="categories">
        <h1 class="heading"> product <span>categories</span> </h1>
        <div class="box-container">
            <div class="box">
                <img src="image/cat-1.png" alt="">
                <h3>Healthy breakfast</h3>
                <p>upto 30% off</p>
            </div>
            <div class="box">
                <img src="image/cat-2.png" alt="">
                <h3>Meal plans</h3>
                <p>upto 20% off</p>
            </div>
            <div class="box">
                <img src="image/cat-3.png" alt="">
                <h3>Tasty dinner</h3>
                <p>upto 45% off</p>
            </div>
            <div class="box">
                <img src="image/cat-4.png" alt="">
                <h3>Healthy Diet plans</h3>
                <p>upto 15% off</p>
            </div>
        </div>
    </section>

    <!-- categories section ends -->
    <!-- review section starts  -->

    <section class="review" id="review">
        <h1 class="heading"> Are you a <span>Home Chef</span> </h1>
        <div class="swiper review-slider">
            <div class="swiper-wrapper">
                <div class="swiper-slide box">
                    <img src="image/pic-1.png" alt="">
                    <p>Are you a talented home chef.Join with us and earn more.Explore the home chef inside you</p>
                    <a href="chefsignup.php" class="btn">Join with us</a>
                </div>
            </div>
        </div>
    </section>
    <!-- blogs section starts  -->

    <section class="blogs" id="blogs">
        <h1 class="heading"> our <span>blogs</span> </h1>
        <div class="box-container">
            <div class="box">
                <img src="image/blog-1.jpg" alt="">
                <div class="content">
                    <div class="icons">
                        <a href="#"> <i class="fas fa-user"></i> by user </a>
                        <a href="#"> <i class="fas fa-calendar"></i> 1st may, 2021 </a>
                    </div>
                    <h3>fresh and organic vegitables and fruits</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam, expedita.</p>
                    <a href="#" class="btn">read more</a>
                </div>
            </div>

            <div class="box">
                <img src="image/blog-2.jpg" alt="">
                <div class="content">
                    <div class="icons">
                        <a href="#"> <i class="fas fa-user"></i> by user </a>
                        <a href="#"> <i class="fas fa-calendar"></i> 1st may, 2021 </a>
                    </div>
                    <h3>fresh and organic vegitables and fruits</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam, expedita.</p>
                    <a href="#" class="btn">read more</a>
                </div>
            </div>

            <div class="box">
                <img src="image/blog-3.jpg" alt="">
                <div class="content">
                    <div class="icons">
                        <a href="#"> <i class="fas fa-user"></i> by user </a>
                        <a href="#"> <i class="fas fa-calendar"></i> 1st may, 2021 </a>
                    </div>
                    <h3>fresh and organic vegitables and fruits</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam, expedita.</p>
                    <a href="#" class="btn">read more</a>
                </div>
            </div>
    </section>

    <!-- blogs section ends -->
    <!-- review section starts  -->
    <section class="review" id="review">
        <h1 class="heading"> customer's <span>review</span> </h1>
        <div class="swiper review-slider">
            <div class="swiper-wrapper">
                <div class="swiper-slide box">
                    <img src="image/pic-1.png" alt="">
                    <p>Enjoying foods from Homeli foodi.One of the best place where you can find pure homeli foods.Great quality and quck delivery.</p>
                    <h3>john deo</h3>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>

                <div class="swiper-slide box">
                    <img src="image/pic-2.png" alt="">
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Unde sunt fugiat dolore ipsum id est maxime ad tempore quasi tenetur.</p>
                    <h3>john deo</h3>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>

                <div class="swiper-slide box">
                    <img src="image/pic-3.png" alt="">
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Unde sunt fugiat dolore ipsum id est maxime ad tempore quasi tenetur.</p>
                    <h3>john deo</h3>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>

                <div class="swiper-slide box">
                    <img src="image/pic-4.png" alt="">
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Unde sunt fugiat dolore ipsum id est maxime ad tempore quasi tenetur.</p>
                    <h3>john deo</h3>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- review section ends -->
    <!-- footer section starts  -->

    <section class="footer">
        <div class="box-container">
            <div class="box">
                <h3> Homeli foodi <i class="fas fa-shopping-basket"></i> </h3>
                <p>All rights reserved.connect us with </p>
                <div class="share">
                    <a href="#" class="fab fa-facebook-f"></a>
                    <a href="#" class="fab fa-twitter"></a>
                    <a href="#" class="fab fa-instagram"></a>
                    <a href="#" class="fab fa-linkedin"></a>
                </div>
            </div>
        </div>
    </section>
    <!-- footer section ends -->

</body>

</html>