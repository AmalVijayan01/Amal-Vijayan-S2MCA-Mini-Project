<?php
    include 'connect.php';
    session_start();
    if ($_SESSION['login_id']==0)
    {
        header("location:login.php");
    }

    $sqlb="SELECT * FROM tbl_login WHERE login_id ='". $_SESSION['login_id']."'";
    $resb = mysqli_query($con,$sqlb);
    if($reslt=mysqli_fetch_array($resb))
    {
        $reslt['username'];
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>homelifoodi-orders</title>
        <link rel="stylesheet" href="css/main.css">
        <!-- box icon -->
        <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
        <style>
            .user_wrapper{
                font-weight: bold;
                color: white;
                font-size: 20px;
                background-color:black ;
                padding: 5px 20px 5px 20px;
                border-radius: 30px 30px 30px 30px;

            }
        </style>
    </head>
    <body>
    <div class="sidebar">
        <div class="logo_details">
        <div class="logo_name">
        Welcome &nbsp <?php echo $reslt['username'];?>
        </div>
        </div>
        <ul>
        <li>
            <a href="userhome.php" >
            <i class='bx bxs-home' ></i>
            <span class="links_name">
                Home
            </span>
            </a>
        </li>
        <li>
            <a href="foods.php">
            <i class='bx bxs-food-menu' ></i>
            <span class="links_name">
                Food Items
            </span>
            </a>
        </li>
        <li>
            <a href="cart.php">
            <i class='bx bxs-cart-alt'></i>
            <span class="links_name">
                My Cart
            </span>
            </a>
        </li>
        <li>
            <a href="#" class="active">
            <i class='bx bx-dollar' ></i>
            <span class="links_name">
                My Orders
            </span>
            </a>
        </li>
        <li>
            <a href="profile.php" >
            <i class='bx bxs-user-account' ></i>
            <span class="links_name">
                My Profile
            </span>
            </a>
        </li>
        <li class="login">
            <a href="logout.php">
            <span class="links_name login_out">
                Login Out
            </span>
            <i class='bx bx-log-out' id="log_out"></i>
            </a>
        </li>
        </ul>
    </div>
    <!-- End Sideber -->
    <section class="home_section">
        <div class="topbar">
        <div class="toggle">
            <i class='bx bx-menu' id="btn"></i>
        </div>
        <div class="user_wrapper">
            <h5><?php echo $reslt['username']; ?></h5>
        </div>
        </div>
        <!-- End Top Bar -->
        <!-- Order section starts -->
        <!-- Order section ends -->

        <script>
            let sidebar = document.querySelector(".sidebar");
            let closeBtn = document.querySelector("#btn");
            closeBtn.addEventListener("click", () => {
            sidebar.classList.toggle("open");
            // call function
            changeBtn();
            });
            function changeBtn() {
                if(sidebar.classList.contains("open")) {
                    closeBtn.classList.replace("bx-menu", "bx-menu-alt-right");
                } else {
                    closeBtn.classList.replace("bx-menu-alt-right", "bx-menu");
                }
            }
        </script>
    </body>
</html>