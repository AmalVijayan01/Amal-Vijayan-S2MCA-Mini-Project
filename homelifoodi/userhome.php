<?php
session_start();
include 'connect.php';

if ($_SESSION['login_id'] == 0) {
    header("location:login.php");
}
$sqlb = "SELECT * FROM tbl_login WHERE login_id ='" . $_SESSION['login_id'] . "'";
$resb = mysqli_query($con, $sqlb);
if ($reslt = mysqli_fetch_array($resb)) {
    $reslt['username'];
}
?>
<?php
$resq = "SELECT * FROM products ORDER BY prdt_id DESC LIMIT 1";
$resw = mysqli_query($con, $resq);
if ($rese = mysqli_fetch_array($resw)) {
    $rese['prdt_name'];
    $rese['prdt_price'];
    $rese['prdt_description'];
    $imageurl = "Chefs/food_images/" . $rese['prdt_image'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>homelifoodiuserhome</title>
    <link rel="stylesheet" href="css/main.css">
    <!-- box icon -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <script>
        window.location.hash = "no-back-button";

window.location.hash = "Again-No-back-button"; 

window.onhashchange = function(){
    window.location.hash = "no-back-button";
}
    </script>
    <style>
        .user_wrapper {
            font-weight: bold;
            color: white;
            font-size: 20px;
            background-color: black;
            padding: 5px 20px 5px 20px;
            border-radius: 30px 30px 30px 30px;

        }

        .cfhome {
            margin: 0 auto;
        }

        .homeland {
            width: 90%;
            min-width: 96%;
            height: 300px;
            background-color: black;
            margin: 10px 10px 5px 27px;
            border-radius: 10px;
            box-shadow: 5px 5px 5px 5px;

        }

        .homeland img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            opacity: 40%;
            border-radius: 10px;
            /* filter: blur(1px);
                -webkit-filter: blur(1px); */
        }

        .homeland h2 {
            text-align: center;
            position: absolute;
            top: 150px;
            left: 400px;
            color: white;
            font-size: 40px;
        }

        .allcnts {
            display: flex;
            margin: 20px 0 0 0;

        }

        .neworders {
            background-color: white;
            border-color: black;
            border-radius: 1px;
            width: 35%;
            height: 380px;
            margin: 0 25px 0 25px;
            border-radius: 10px;
            box-shadow: 3px 3px 3px 3px;
        }

        .neworders h4 {
            text-align: center;
            margin: 10px;
        }

        .neworders img {
            width: 60%;
            height: 55%;
            align-items: center;
            justify-content: center;
            display: block;
            margin: 10px 60px 0 60px;

        }

        .neworders a {
            text-decoration: none;
            border: solid 1px;
            border-radius: 1px;
            background-color: lawngreen;
            color: black;
            border-radius: 10px;
            padding: 3px 4px 3px 4px;
            text-align: center;
            justify-content: center;
            margin: 50px 60px 0 140px;
        }

        .dishdetails {
            align-items: center;
            justify-content: center;
            text-align: center;
            margin-bottom: 10px;
        }

        .recentadded {
            background-color: white;
            border-color: black;
            border: 1px;
            width: 35%;
            height: 380px;
            margin: 0 25px 0 15px;
            border-radius: 10px;
            box-shadow: 3px 3px 3px 3px;
        }

        .recentadded h4 {
            text-align: center;
            margin: 10px;
        }

        .aggregte {
            width: 30%;
            height: 380px;
            margin: 0 25px 0 15px;
        }

        .aggritms {
            background-color: white;
            border-color: black;
            border-radius: 10px;
            width: 380px;
            height: 180px;
            margin: 0 0 10px 0;
            box-shadow: 3px 3px 3px 3px;

        }

        .recentadded {
            background-color: white;
            border-color: black;
            border: 1px;
            width: 35%;
            height: 380px;
            margin: 0 25px 0 15px;
            border-radius: 10px;
            box-shadow: 5px 5px 5px 5px;
        }

        .recentadded h4 {
            text-align: center;
            margin: 10px;
        }

        .recentadded img {
            width: 300px;
            height: 250px;
            justify-content: center;
            align-items: center;
            margin: 0 10px 0 40px;
            border-radius: 10px;
        }

        .aggritms h4 {
            text-align: center;
            margin: 10px;
        }

        .aggritms svg {
            width: 80px;
            height: 80px;
            align-items: right;
            justify-content: right;
        }

        .aggritms1 {
            background-color: white;
            border-color: black;
            border-radius: 10px;
            width: 380px;
            height: 180px;
            box-shadow: 3px 3px 3px 3px;
        }

        .aggritms1 h4 {
            text-align: center;
            margin: 10px;
        }

        .aggritms1 svg {
            width: 80px;
            height: 80px;
            align-items: flex-end;
            justify-content: right;
        }

        .aggritms a {
            text-decoration: none;
            text-align: center;
            margin: 15px 30px 20px 50px;
            background-color: lawngreen;
            padding: 20px 25px 20px 25px;

        }

        .aggritms1 a {
            text-decoration: none;
            text-align: center;
            margin: 15px 30px 20px 50px;
            background-color: lawngreen;
            padding: 20px 25px 20px 25px;
        }
    </style>
</head>

<body>
    <div class="sidebar">
        <div class="logo_details">
            <div class="logo_name">
                Welcome &nbsp <?php echo $reslt['username']; ?>
            </div>
        </div>
        <ul>
            <li>
                <a href="#" class="active">
                    <i class='bx bxs-home'></i>
                    <span class="links_name">Home</span>
                </a>
            </li>
            <li>
                <a href="foods.php">
                    <i class='bx bxs-food-menu'></i>
                    <span class="links_name"> Food Items</span>
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
                <a href="orders.php">
                    <i class='bx bx-dollar'></i>
                    <span class="links_name">
                        My Orders
                    </span>
                </a>
            </li>
            <li>
                <a href="profile.php">
                    <i class='bx bxs-user-account'></i>
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
            <div class="search_wrapper">
                <label>
                    <span>
                        <i class='bx bx-search'></i>
                    </span>
                    <input type="search" placeholder="Search...">
                </label>
            </div>
            <div class="user_wrapper">
                <h5><?php echo $reslt['username']; ?></h5>
            </div>
        </div>
        <!-- End Top Bar -->
        <!-- start of division -->
        <div class="cfhome">
            <div class="homeland">
                <img src="image/homeland.jpg">
                <h2>Welcome to Homelifoodi</h2>
            </div>
            <div class="allcnts">
                <div class="neworders">
                    <h4>New dishes for you</h4>
                    <img src="<?php echo $imageurl ?>">
                    <div class="dishdetails">
                        <h5><?php echo $rese['prdt_name']; ?></h5>
                        <h6><?php echo $rese['prdt_price']; ?></h6>
                        <p><?php echo $rese['prdt_description']; ?></p>
                    </div>
                    <a href="foods.php">Show more ></a>
                </div>
                <div class="recentadded">
                    <h4>Recent orders</h4>
                    <?php
                    $urn2 = $_SESSION['login_id'];
                    $resqq = "SELECT * FROM orders,products WHERE orders.login_id = '$urn2' AND products.prdt_id = orders.prdt_id ORDER BY order_id DESC LIMIT 1;";
                    $resww = mysqli_query($con, $resqq);
                    if ($resee = mysqli_fetch_array($resww)) {
                        $resee['del_name'];
                        $resee['del_addr'];
                        $resee['order_time'];
                        $imageurl = "Chefs/food_images/" . $resee['prdt_image'];

                    ?>
                        <img src="<?php echo $imageurl ?>">
                        <div class="dishdetails">
                            <h5><?php echo $resee['del_name']; ?></h5>
                            <h6><?php echo $resee['del_addr']; ?></h6>
                            <p><?php echo $resee['order_time']; ?></p>
                        </div>
                    <?php } else {
                        echo "no items";
                    } ?>
                </div>
                <div class="aggregte">
                    <div class="aggritms">
                        <h4>Total Items</h4>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;">
                            <path d="M7.5 6.5C7.5 8.981 9.519 11 12 11s4.5-2.019 4.5-4.5S14.481 2 12 2 7.5 4.019 7.5 6.5zM20 21h1v-1c0-3.859-3.141-7-7-7h-4c-3.86 0-7 3.141-7 7v1h17z"></path>
                        </svg>
                        <a href="foods.php">View More</a>
                    </div>
                    <div class="aggritms1">
                        <h4>Total orders </h4>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;">
                            <path d="M21 4H2v2h2.3l3.28 9a3 3 0 0 0 2.82 2H19v-2h-8.6a1 1 0 0 1-.94-.66L9 13h9.28a2 2 0 0 0 1.92-1.45L22 5.27A1 1 0 0 0 21.27 4 .84.84 0 0 0 21 4zm-2.75 7h-10L6.43 6h13.24z"></path>
                            <circle cx="10.5" cy="19.5" r="1.5"></circle>
                            <circle cx="16.5" cy="19.5" r="1.5"></circle>
                        </svg>
                        <a href="orders.php">View More</a>
                    </div>
                </div>
            </div>
        </div>
        <script>
            let sidebar = document.querySelector(".sidebar");
            let closeBtn = document.querySelector("#btn");
            closeBtn.addEventListener("click", () => {
                sidebar.classList.toggle("open");
                // call function
                changeBtn();
            });

            function changeBtn() {
                if (sidebar.classList.contains("open")) {
                    closeBtn.classList.replace("bx-menu", "bx-menu-alt-right");
                } else {
                    closeBtn.classList.replace("bx-menu-alt-right", "bx-menu");
                }
            }
        </script>
</body>

</html>