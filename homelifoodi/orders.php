<?php
include 'connect.php';
session_start();
$sid = $_SESSION['login_id'];
if ($_SESSION['login_id'] == 0) {
    header("location:login.php");
}

$sqlb = "SELECT * FROM tbl_login WHERE login_id ='" . $_SESSION['login_id'] . "'";
$resb = mysqli_query($con, $sqlb);
if ($reslt = mysqli_fetch_array($resb)) {
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
        .user_wrapper {
            font-weight: bold;
            color: white;
            font-size: 20px;
            background-color: black;
            padding: 5px 20px 5px 20px;
            border-radius: 30px 30px 30px 30px;

        }

        table {
            margin: 20px 0 0 30px;
            background-color: white;
            width: 90%;
            height: 80%;
            text-align: center;
        }

        thead {
            height: 20px;
            background-color: orangered;
        }

        tbody {
            height: 120px;
        }

        td {
            width: 200px;
        }

        tr td img {
            width: 100px;
            height: 80px;
        }

        .hh-grayBox {
            background-color: #F8F8F8;
            margin-bottom: 20px;
            padding: 35px;
            margin-top: 20px;
        }

        .pt45 {
            padding-top: 45px;
        }

        .order-tracking {
            text-align: center;
            width: 33.33%;
            position: relative;
            display: block;
        }

        .order-tracking .is-complete {
            display: block;
            position: relative;
            border-radius: 50%;
            height: 30px;
            width: 30px;
            border: 0px solid #AFAFAF;
            background-color: #f7be16;
            margin: 0 auto;
            transition: background 0.25s linear;
            -webkit-transition: background 0.25s linear;
            z-index: 2;
        }

        .order-tracking .is-complete:after {
            display: block;
            position: absolute;
            content: '';
            height: 14px;
            width: 7px;
            top: -2px;
            bottom: 0;
            left: 5px;
            margin: auto 0;
            border: 0px solid #AFAFAF;
            border-width: 0px 2px 2px 0;
            transform: rotate(45deg);
            opacity: 0;
        }

        .order-tracking.completed .is-complete {
            border-color: #27aa80;
            border-width: 0px;
            background-color: #27aa80;
        }

        .order-tracking.completed .is-complete:after {
            border-color: #fff;
            border-width: 0px 3px 3px 0;
            width: 7px;
            left: 11px;
            opacity: 1;
        }

        .order-tracking p {
            color: #A4A4A4;
            font-size: 16px;
            margin-top: 8px;
            margin-bottom: 0;
            line-height: 20px;
        }

        .order-tracking p span {
            font-size: 14px;
        }

        .order-tracking.completed p {
            color: #000;
        }

        .order-tracking::before {
            content: '';
            display: flex;
            height: 3px;
            width: calc(100% - 40px);
            background-color: #f7be16;
            top: 13px;
            position: absolute;
            left: calc(-50% + 20px);
            z-index: 0;
        }

        .order-tracking:first-child:before {
            display: none;
        }

        .order-tracking.completed:before {
            background-color: #27aa80;
        }
        .summm{
            float: right;
            margin-top: 10px;
            margin-right:470px;
            background-color: white;
            border-radius:10px;
            padding: 10px 20px 10px 20px;
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
                <a href="userhome.php">
                    <i class='bx bxs-home'></i>
                    <span class="links_name">
                        Home
                    </span>
                </a>
            </li>
            <li>
                <a href="foods.php">
                    <i class='bx bxs-food-menu'></i>
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
            <div class="user_wrapper">
                <h5><?php echo $reslt['username']; ?></h5>
            </div>
        </div>
        <!-- End Top Bar -->
        <!-- Order section starts -->

        <ordertbl>
            <table>
                <thead>
                    <tr>
                        <td>Image</td>
                        <td>Name</td>
                        <td>Phone</td>
                        <td>Address</td>
                        <td>Total</td>
                        <td>Payment</td>
                        <td>Status</td>
                    </tr>
                </thead>
            </table>
            <?Php

            $osql = "SELECT * FROM `orders` join products on products.prdt_id = orders.prdt_id join cart on cart.cart_id = orders.cart_id where orders.login_id =$sid;";
            $osql2 = mysqli_query($con, "SELECT SUM(total_price) as asum FROM `orders` join products on products.prdt_id = orders.prdt_id join cart on cart.cart_id = orders.cart_id where orders.login_id ='$sid'");
            // "SELECT del_name, del_phone, del_addr, payment_method,SUM(total_price) as psum, order_status,prdt_image,prdt_name FROM orders o,cart c,products p  WHERE o.prdt_id = p.prdt_id AND c.login_id=o.login_id and c.login_id= $sid AND c.cart_status='1' ORDER BY order_id Desc";
            while ($osqlq = mysqli_fetch_assoc($osql2)) {
                $sum = $osqlq['asum'];
            }
            $ores = mysqli_query($con, $osql);
            // $osql1="SELECT SUM(total_price) as psum FROM cart WHERE cart.login_id=$sid";
            // $ores2 = mysqli_query($con,$osql1);
            // $ores3=mysqli_fetch_array($ores);
            while ($ores1 = mysqli_fetch_array($ores)) {
                $nam = $ores1['del_name'];
                $phn = $ores1['del_phone'];
                $adr = $ores1['del_addr'];
                $tot = $ores1['prdt_price'];
                $pay = $ores1['payment_method'];
                $pnam = $ores1['prdt_name'];
                $stat=$ores1['order_status'];
                $imageurl = "Chefs/food_images/" . $ores1['prdt_image'];

            ?>
                <table>
                    <tbody>
                        <tr>
                            <td><img src="<?php echo $imageurl ?>"><br><?php echo $pnam ?></td>
                            <td><?php echo $nam ?></td>
                            <td><?php echo $phn ?></td>
                            <td><?php echo $adr ?></td>
                            <td><?php echo $tot ?></td>
                            <td><?php echo $pay ?></td>
                            <td><?php 
                            
                            if($stat==0){
                                echo "Ordered";
                            }
                            ?></td>

                        </tr>
                    </tbody>
                </table>

            <?php
            }
            ?>
            <div class="summm">
               <?php echo $sum;?>
            </div>
            
            
        </ordertbl>
        <!-- <div class="ordrstat">
            <div class="container">
                <div class="row">
                    <div class="row justify-content-between">
                        <div class="order-tracking completed">
                            <span class="is-complete"></span>
                            <p>Ordered<br><span>Mon, June 24</span></p>
                        </div>
                        <div class="order-tracking completed">
                            <span class="is-complete"></span>
                            <p>Shipped<br><span>Tue, June 25</span></p>
                        </div>
                        <div class="order-tracking">
                            <span class="is-complete"></span>
                            <p>Delivered<br><span>Fri, June 28</span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        </div>
        <!-- <div class="recentordrs">
            <h5>Recent Orders</h5>
        </div> -->
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
                if (sidebar.classList.contains("open")) {
                    closeBtn.classList.replace("bx-menu", "bx-menu-alt-right");
                } else {
                    closeBtn.classList.replace("bx-menu-alt-right", "bx-menu");
                }
            }
        </script>
</body>

</html>