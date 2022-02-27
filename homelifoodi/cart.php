<?php
include 'connect.php';
session_start();
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
    <title>homelifoodi-usercart</title>
    <link rel="stylesheet" href="css/main.css">
    <!-- box icon -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>

    <script>
        function openForm() {
            document.getElementById("loginPopup").style.display = "block";
        }

        function closeForm() {
            document.getElementById("loginPopup").style.display = "none";
        }
        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            let modal = document.getElementById('loginPopup');
            if (event.target == modal) {
                closeForm();
            }
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

        .fditems {
            min-width: 100%;
        }

        .displayitems {
            align-items: center;
            padding-left: 30px;
            padding-right: 30px;
            padding-top: 50px;
            padding-bottom: 50px;
            border-radius: 10px;
            min-width: 100%;
        }

        h1 {
            text-align: center;
            margin-top: 50px;
            margin-bottom: 30px;
        }

        .distbl {
            padding-top: 20px;
            padding-bottom: 20px;
            align-content: center;
            border-radius: 10px;
            min-width: 100%;
        }

        table {
            background-color: white;
            border-collapse: collapse;
            border-color: #fff;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
            border-radius: 10px;
            margin: auto;
            min-width: 100%;
        }

        th,
        td {
            border: 1px solid #f2f2f2;
            padding: 8px 30px;
            text-align: center;
            color: grey;
            min-width: 100%;
        }

        th {
            text-transform: uppercase;
            font: weight 500px;
            min-width: 100%;
        }

        td {
            font-size: 13px;
            min-width: 100%;
        }

        td a {
            padding: 5px 7px 5px 4px;
            border-radius: 6px;
            text-decoration: none;
        }

        td img {
            width: 150px;
            height: 150px;
            border-radius: 6px;
        }

        .btn1 {
            color: white;
            background-color: #2060f5;
            border: none;
            padding: 5px 7px 5px 7px;
            border-radius: 10px;
            font-size: 13px;
            font-weight: bold;
            width: 200px;
            height: 40px;
            text-decoration: none;
            text-align: center;
        }

        .btn2 {
            color: black;
            background-color: lawngreen;
            border: none;
            padding: 5px 7px 5px 7px;

            align-items: right;
            border-radius: 10px;
            font-size: 13px;
            font-weight: bold;
            width: 200px;
            height: 40px;
            text-decoration: none;
            text-align: center;
        }

        .btnb {
            background-color: red;
            padding: 3px 7px 3px 7px;
            border-radius: 10px;
            border: none;
            font-weight: bold;
        }

        .loginPopup {
            position: absolute;
            text-align: center;
            width: 100%;
            width: 100%;
        }

        .formPopup {
            display: none;
            position: fixed;
            left: 60%;
            top: 10%;
            transform: translate(-60%, 5%);
            background-color: white;
            border-collapse: collapse;
            border-color: #fff;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
            border-radius: 10px;
            margin: auto;
            padding: 50px 30px 50px 30px;
        }

        .labels {
            text-transform: uppercase;
            float: left;
            text-align: left;
        }

        .inputs {
            width: 300px;
            float: right;
            margin-right: 20px;
            margin-left: 20px;
        }

        .cnbtn {
            float: left;
            background-color: red;
            padding: 3px 7px 3px 7px;
            border-radius: 10px;
            border: none;
            font-weight: bold;

        }

        .chbtn {
            float: right;
            margin-right: 20px;
            background-color: lawngreen;
            padding: 3px 7px 3px 7px;
            border-radius: 10px;
            border: none;
            font-weight: bold;
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
                <a href="#" class="active">
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

        <!-- cart section start -->
        <div class="fditems">
            <h1>My cart</h1>
            <div class="displayitems">
                <div class="distbl">
                    <table>
                        <thead>
                            <tr>
                                <th>Product Details</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Total Price</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // $csql="SELECT * FROM cart WHERE login_id ='". $_SESSION['login_id']."'";
                            // $csql1=mysqli_query($con,$csql);
                            // while($cresult=mysqli_fetch_array($csql1))
                            // {
                            // $csql2="SELECT p.prdt_id,p.prdt_name,p.prdt_price,p.prdt_image FROM products p INNER JOIN cart c ON p.prdt_id =c.prdt_id WHERE c.login_id = '".$_SESSION['login_id']."'";
                            // $cres1=mysqli_query($con,$csql2);

                            // $csql3="SELECT quantity FROM cart where login_id='".$_SESSION['login_id']."'";
                            // $cres2=mysqli_query($con,$csql3);

                            // $csql4="SELECT quantity*unit_price AS total FROM cart WHERE login_id='".$_SESSION['login_id']."'";
                            // $cres3=mysqli_query($con,$csql4);



                            $quy = "SELECT products.prdt_id,products.prdt_name,products.prdt_price,products.prdt_image,cart.quantity,cart.total_price,cart.cart_id,cart.cart_status from products,cart WHERE products.prdt_id=cart.prdt_id and cart.cart_status=0 and cart.login_id='" . $_SESSION['login_id'] . "' ";
                            $cres3 = mysqli_query($con, $quy);

                            while ($cres4 = mysqli_fetch_array($cres3)) {
                                $imageurl = "Chefs/food_images/" . $cres4['prdt_image'];
                                $cid = $cres4['cart_id'];
                                $prdt_id = $cres4['prdt_id']
                            ?>
                                <td><img style="width: 80px;height: 80px;" src="<?php echo $imageurl ?>"><br>
                                    <?php echo $cres4['prdt_name'] ?></td>
                                <td><?php echo $cres4['quantity'] ?></td>
                                <td><?php echo $cres4['prdt_price'] ?></td>
                                <td><?php echo $cres4['total_price'] ?></td>
                                <td>
                                    <a href="cart remove.php?id=<?php echo $cres4['cart_id'] ?> ">
                                        <input type="submit" value="Remove" class="btnb"></a>
                                </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                        <th> Grand Total</th>
                        <?php
                        $csql5 = "SELECT SUM(quantity) AS qtysum ,SUM(total_price) AS totprice FROM cart  WHERE cart_status='0' and login_id ='" . $_SESSION['login_id'] . "'";
                        $cres5 = mysqli_query($con, $csql5);
                        $cres6 = mysqli_fetch_assoc($cres5);
                        $sum = $cres6["qtysum"];
                        $totprice = $cres6["totprice"]
                        ?>

                        <td><?php echo "$sum" ?></td>
                        <td></td>
                        <td><?php echo "$totprice" ?></td>
                        <form method="post" enctype="multipart/form-data">
                            <td>
                                <button class="btn2" onclick="openForm()"><a>Place Order</a></button>
                            </td>
                            <div class="loginPopup">
                                <div class="formPopup" id="popupForm">
                                    <form action="" method="post" enctype="multipart/form-data" class="formContainer">
                                        <h2>Place order</h2><br><br>

                                        <label class="labels">Total Amount</label>
                                        <input type="text" value="<?php echo "$totprice" ?>" id="psw" placeholder="total price" name="psw" readonly="readonly" required autocomplete="off" class="inputs"><br><br>

                                        <label class="labels">Delivery Name</label>
                                        <input type="text" id="products" placeholder="Your Name" name="name" required autocomplete="off" class="inputs"><br><br>

                                        <label class="labels">phone</label>
                                        <input type="text" id="products" placeholder="Mobile" name="phone" required autocomplete="off" class="inputs"><br><br>

                                        <label class="labels">Delivery Address</label>
                                        <textarea placeholder="Enter your address" cols="25" rows="2" name="address" required autocomplete="off" class="inputs"></textarea><br><br><br>

                                        <label class="labels">Payment Method</label>
                                        <select name="paymentMethod" id="payment" class="inputs">
                                            <option value="upi">UPI</option>
                                            <option value="card">Card</option>
                                            <option value="cod">COD</option>
                                        </select><br><br>
                                        <div class="obtns">
                                            <button type="button" class="cnbtn" onclick="closeForm()">Cancel</button>
                                            <button type="csubmit" name="csubmit" class="chbtn">Check out</button><br>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </form>
                        <?php
                        $cres7 = "SELECT products.chefs_id,tbl_chefs.chefs_id FROM products,tbl_chefs WHERE products.chefs_id=tbl_chefs.chefs_id";
                        $sql7 = mysqli_query($con, $cres7);
                        if ($cres8 = mysqli_fetch_array($sql7)) {
                            $cres8['chefs_id'];
                        }
                        if (isset($_POST["csubmit"])) {
                            $prdt_id;
                            $cid;
                            $userid = $reslt['login_id'];
                            $chefs_id = $cres8['chefs_id'];
                            $del_name = $_POST['name'];
                            $del_phone = $_POST['phone'];
                            $del_addr = $_POST['address'];
                            $payment = $_POST['paymentMethod'];

                            $rescart = "INSERT INTO orders(prdt_id, cart_id, login_id, chefs_id, del_name, del_phone, del_addr, payment_method) VALUES ('$prdt_id','$cid','$userid','$chefs_id','$del_name','$del_phone','$del_addr','$payment')";
                            $rescart1 = mysqli_query($con, $rescart);
                            if ($rescart1) {
                                mysqli_query($con, "UPDATE cart SET cart_status ='1' WHERE login_id = '" . $_SESSION['login_id'] . "'");
                            }
                            echo "<script> location='cart.php' </script>";
                        }
                        ?>
                    </table>

                </div>
                <div class="cartcard2">
                    <button class="btn1"><a href="foods.php" class="btn1">Continue Shopping</a></button>
                </div>
            </div>
        </div>
        <!-- cart section stop -->


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

            function openForm() {
                document.getElementById("popupForm").style.display = "block";
            }

            function closeForm() {
                document.getElementById("popupForm").style.display = "none";
            }
        </script>
</body>

</html>