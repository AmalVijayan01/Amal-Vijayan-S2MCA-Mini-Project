<?php
include 'connect.php';
session_start();
$sec = $_SESSION['login_id'];

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
    <title>homelifoodi-fooditems</title>
    <link rel="stylesheet" href="css/main.css">
    <!-- box icon -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <meta charset="UTF-8">

    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .food-menu h1 {
            text-align: center;
            margin: 6px 0 10px 0;
        }

        .cards {
            position: relative;
            width: 100%;
            padding: 1rem 1.5rem;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            grid-gap: 30px;

        }

        .fddisplay {
            margin: 5px 0 5px 10px;
            display: flex;
            flex-wrap: wrap;
            width: 36%;

        }

        .displaycard {
            margin: 5px 10px 5px 10px;


        }

        .displayimg {
            text-align: center;
            border-radius: 10px 10px 0 0;
            width: 350px;
            border: solid 1px;
            height: 250px;
            margin: 0 0 0 0;

        }

        .displayimg img {
            width: 350px;
            height: 250px;
            border-radius: 10px 10px 0 0;
        }

        .displaytext {
            text-align: center;
            align-items: inline;
            width: 350px;
            height: 200px;
            background-color: white;
            margin: 5px 0 0 0;


        }

        .displaytext h3 {
            padding: 10px 0 0 0;
        }

        .fdquantity {
            padding: 10px 0 0 0;

        }

        .addcartbtn {
            background-color: orangered;
            margin: 10px 10px 5px 10px;
            padding: 5px 5px 5px 5px;
            border-radius: 10px;

        }

        .addcartbtn button {
            text-decoration: none;
            font-weight: bold;
            color: black;
            background-color: orangered;
            border: none;

        }

        .user_wrapper {
            font-weight: bold;
            color: white;
            font-size: 20px;
            background-color: black;
            padding: 5px 20px 5px 20px;
            border-radius: 30px 30px 30px 30px;

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
                <a href="#" class="active">
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
    <?php
    $quer = "SELECT customers.*,tbl_login.login_id from customers,tbl_login where customers.login_id=tbl_login.login_id and customers.login_id='$sec'; ";
    $res = mysqli_query($con, $quer);
    $data = mysqli_fetch_array($res);
    $cu = $data['cust_id'];

    ?>

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
        </div>
        <!-- End Top Bar -->
        <!-- fOOD MEnu Section Starts Here -->
        <div class="food-menu">
            <h1>Food Menu<br></h1>
            <div class="cards">
                <?php
                $Selectquery = "SELECT * FROM products WHERE prdt_status='0' ORDER BY prdt_id DESC   ";
                $res = mysqli_query($con, $Selectquery);
                $num = mysqli_num_rows($res);
                while ($result = mysqli_fetch_array($res)) {
                    $imageurl = "Chefs/food_images/" . $result['prdt_image'];
                    $sid = $result['prdt_id'];

                ?>
                    <div class="fddisplay">
                        <form method="POST" enctype="multipart/form-data">
                            <div class="displaycard">
                                <div class="displayimg">
                                    <img src="<?php echo $imageurl ?>">
                                </div>
                                <div class="displaytext">
                                    <h3><?php echo $result['prdt_name']; ?></h3>
                                    <h4>₹<?php echo $result['prdt_price']; ?></h4>
                                    <p><?php echo $result['prdt_description']; ?></p>
                                    <div class="fdquantity">
                                        <label>Quantity:</label>
                                        <input type="number" min="1" default="1" value="1" name="qty" id="" value="qty" min="1">
                                        <input type="hidden" name="pid" id="" value="<?php echo $result['prdt_id']; ?>">
                                        <input type="hidden" name="uprice" id="" value="<?php echo $result['prdt_price']; ?>">
                                    </div>
                                    <div class="addcartbtn">
                                        <a href="addtocart.php">
                                            <button type="submit" class="btn" name="submit<?php echo $result['prdt_id']; ?>">Add to cart</button></a>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <?php
                        $sub = "submit" . $sid;
                        if (isset($_POST[$sub])) {
                            $qty = $_POST["qty"];
                            $prdt_id = $result['prdt_id'];
                            $prdtprice = $result['prdt_price'];
                            $userid = $reslt['login_id'];
                            $quantity = $prdtprice * $qty;

                            $rescart = "INSERT INTO cart(prdt_id,login_id,quantity,unit_price,total_price)  VALUES('$prdt_id','$userid','$qty','$prdtprice','$quantity')";
                            $rescart1 = mysqli_query($con, $rescart);
                            echo "<script> location='foods.php' </script>";
                        }
                        ?>
                    </div>
                <?php }
                ?>

            </div>
        </div>
    </section>

    <!-- fOOD Menu Section Ends Here -->
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
<?php
if (isset($_POST['submit'])) {
    $qty = $_POST["qty"];
    echo $qty;
}
?>

</html>