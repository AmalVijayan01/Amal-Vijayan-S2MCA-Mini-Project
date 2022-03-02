<?php
    include 'connect.php';
    session_start();
    if ($_SESSION['login_id']==0)
    {
        header("location:../login.php");
    }
    $sqlb="SELECT * FROM tbl_login WHERE login_id ='". $_SESSION['login_id']."'";
    $resb = mysqli_query($con,$sqlb);
    if($reslt=mysqli_fetch_array($resb))
  {
    $reslt['username'];
  }
  $sqlf = "SELECT chefs_id FROM tbl_chefs WHERE login_id = '" . $_SESSION['login_id'] . "'";
$resltg = mysqli_query($con, $sqlf);
$reslth = mysqli_fetch_array($resltg);
$urn2 = $reslth['chefs_id'];
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>homelifoodi-userhome</title>
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
            .cfhome{
                margin: 0 auto;
            }
            .homeland{
                width: 90%;
                min-width: 96%;
                height: 300px;
                background-color:black;
                margin:10px 10px 5px 27px;
                border-radius: 10px;
                box-shadow:5px 5px 5px 5px;
                
            }
            .homeland img{
                width: 100%;
                height: 100%;
                object-fit: cover;
                opacity: 40%;
                border-radius: 10px;
                /* filter: blur(1px);
                -webkit-filter: blur(1px); */
            }
            .homeland h2{
                text-align: center;
                position: absolute;
                top: 150px;
                left: 400px;
                color: white;
                font-size:40px;
            }
            .allcnts{
                display: flex;
                margin:20px 0 0 0;

            }
            .neworders{
                background-color: white;
                border-color:black;
                border-radius: 1px;
                width: 35%;
                height: 380px;
                margin:0 25px 0 25px;
                border-radius: 10px;
                box-shadow:5px 5px 5px 5px;
            }
            .neworders h4{
                text-align: center;
                margin: 10px;
            }
            .recentadded{
                background-color: white;
                border-color:black;
                border:1px;
                width: 35%;
                height: 380px;
                margin:0 25px 0 15px;
                border-radius: 10px;
                box-shadow:5px 5px 5px 5px;
            }
            .recentadded h4{
                text-align: center;
                margin: 10px;
            }
            .recentadded img{
                width: 300px;
                height:250px;
                justify-content: center;
                align-items: center;
                margin:  0 10px 0 40px;
                border-radius:10px;
            }
            .dishdetails{
                text-align: center;
                margin: 5px;
            }
            .neworders img{
                width: 300px;
                height:250px;
                justify-content: center;
                align-items: center;
                margin:  0 10px 0 40px;
                border-radius:10px;
            }
            .dishdetails{
                text-align: center;
                margin: 5px;
            }
            .aggregte{
                width: 30%;
                height: 380px;
                margin:0 25px 0 15px;
            }
            .aggritms{
                background-color: white;
                border-color:black;
                border-radius: 10px;
                width: 380px;
                height: 180px;
                margin: 0 0 10px 0;
                box-shadow:5px 5px 5px 5px;
                
            }
            .aggritms h4{
                text-align: center;
                margin: 10px;
            } 
            .aggritms svg{
                width:80px;
                height:80px;
                align-items: center;
                justify-content: center;

            }
            .aggritms a{
                text-decoration: none;
                text-align: center;
                margin: 15px 30px 20px 50px;
                background-color: lawngreen;
                padding: 20px 25px 20px 25px;

            }
            .aggritms1 a{
                text-decoration: none;
                text-align: center;
                margin: 15px 30px 20px 50px;
                background-color: lawngreen;
                padding: 20px 25px 20px 25px;
            }
            .aggritms1{
                background-color: white;
                border-color:black;
                border-radius: 10px;
                width: 380px;
                height: 180px;
                box-shadow:5px 5px 5px 5px;
            } 
            .aggritms1 h4{
                text-align: center;
                margin: 10px;
            } 
            .aggritms1 svg{
                width:80px;
                height:80px;
                align-items:center;
                justify-content: right;
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
            <a href="#" class="active">
            <i class='bx bxs-home' ></i>
            <span class="links_name">
                Home
            </span>
            </a>
        </li>
        <li>
            <a href="allfoods.php">
            <i class='bx bxs-food-menu' ></i>
            <span class="links_name">
                All Items
            </span>
            </a>
        </li>
        <li>
            <a href="myfoods.php">
            <i class='bx bxs-food-menu' ></i>
            <span class="links_name">
                My Items
            </span>
            </a>
        </li>
        <li>
            <a href="addfoods.php">
            <i class='bx bxs-cart-alt'></i>
            <span class="links_name">
                Add items
            </span>
            </a>
        </li>
        <li>
            <a href="ordersforme.php">
            <i class='bx bx-dollar' ></i>
            <span class="links_name">
                Orders
            </span>
            </a>
        </li>
        <li>
            <a href="profile.php">
            <i class='bx bxs-user-account' ></i>
            <span class="links_name">
                My Profile
            </span>
            </a>
        </li>
        <li class="login">
            <a href="../logout.php">
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
                <img src="..//image/homeland.jpg">
                <h2>Welcome to Homelifoodi</h2>
            </div>
            <div class="allcnts">
            <div class="neworders">
                    <h4>New orders for you</h4>
                <?php
                 $resqq = "SELECT * FROM orders,products WHERE orders.chefs_id = '$urn2' AND products.chefs_id = '$urn2' ORDER BY order_id DESC LIMIT 1;";
                 $resww = mysqli_query($con, $resqq);
                 if ($resee = mysqli_fetch_array($resww)) {
                     $resee['del_name'];
                     $resee['del_addr'];
                     $resee['order_time'];
                     $imageurl = "food_images/" . $resee['prdt_image'];
                     
                 ?>
                 <img src="<?php echo $imageurl ?>">
                 <div class="dishdetails">
                     <h5><?php echo $resee['del_name']; ?></h5>
                     <h6><?php echo $resee['del_addr']; ?></h6>
                     <p><?php echo $resee['order_time']; ?></p>
                 </div>
                 <?php }
                 else{
                     echo "no items";
                 }?>
                
                </div>
                
                <div class="recentadded">
                    <h4>Recent dishes by you</h4>
                    <?php
                     $resq = "SELECT * FROM products WHERE chefs_id = '$urn2' ORDER BY prdt_id DESC LIMIT 1";
                    $resw = mysqli_query($con, $resq);
                    if ($rese = mysqli_fetch_array($resw)) {
                        $rese['prdt_name'];
                        $rese['prdt_price'];
                        $rese['prdt_description'];
                        $imageurl = "food_images/" . $rese['prdt_image'];
                    
                    ?>
                    <img src="<?php echo $imageurl ?>">
                    <div class="dishdetails">
                        <h5><?php echo $rese['prdt_name']; ?></h5>
                        <h6><?php echo $rese['prdt_price']; ?></h6>
                        <p><?php echo $rese['prdt_description']; ?></p>
                    </div>
                    <?php }
                    else{
                        echo "no items";
                    }?>
                </div>
                <div class="aggregte">
                    <div class="aggritms">
                        <?php 
                            $csqlqry = "SELECT COUNT(prdt_id) from products WHERE chefs_id ='$urn2'";
                            $rescsqlqry = mysqli_query($con,$csqlqry);
                            $cnt= mysqli_num_rows($rescsqlqry);
                        ?>
                        <h4>Total dishes</h4>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(249, 5, 5, 1);transform: ;msFilter:;"><path d="M21 15c0-4.625-3.507-8.441-8-8.941V4h-2v2.059c-4.493.5-8 4.316-8 8.941v2h18v-2zM5 15c0-3.859 3.141-7 7-7s7 3.141 7 7H5zm-3 3h20v2H2z"></path></svg>
                        <a href="myfoods.php">View More</a>
                    </div>
                    <div class="aggritms1">
                        <h4>Total orders </h4>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;"><path d="M21 4H2v2h2.3l3.28 9a3 3 0 0 0 2.82 2H19v-2h-8.6a1 1 0 0 1-.94-.66L9 13h9.28a2 2 0 0 0 1.92-1.45L22 5.27A1 1 0 0 0 21.27 4 .84.84 0 0 0 21 4zm-2.75 7h-10L6.43 6h13.24z"></path><circle cx="10.5" cy="19.5" r="1.5"></circle><circle cx="16.5" cy="19.5" r="1.5"></circle></svg>
                        <a href="ordersforme.php">View More</a>
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
                if(sidebar.classList.contains("open")) {
                    closeBtn.classList.replace("bx-menu", "bx-menu-alt-right");
                } else {
                    closeBtn.classList.replace("bx-menu-alt-right", "bx-menu");
                }
            }
        </script>
    </body>
</html>