<?php
include 'connect.php';
session_start();

$sqlb = "SELECT * FROM tbl_login WHERE login_id ='" . $_SESSION['login_id'] . "'";
$resb = mysqli_query($con, $sqlb);
$sid = $_SESSION['login_id'];
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
    <title>hhomelifoodi-chef-ordersforme</title>
    <link rel="stylesheet" href="css/main.css">
    <!-- box icon -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <style>
        .user_wrapper {
            font-weight: bold;
            color: white;
            font-size: 20px;
            background-color: black;
            padding: 10px 30px 10px 30px;
            border-radius: 30px 30px 30px 30px;

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
        }

        td img {
            width: 150px;
            height: 150px;
            border-radius: 6px;
        }

        .btna {
            background-color: greenyellow;
            padding: 3px 7px 3px 7px;
            border-radius: 10px;
            border: none;
            font-weight: bold;
        }

        .btnb {
            background-color: red;
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
                <a href="chefhome.php">
                    <i class='bx bxs-home'></i>
                    <span class="links_name">
                        Home
                    </span>
                </a>
            </li>
            <li>
                <a href="allfoods.php">
                    <i class='bx bxs-food-menu'></i>
                    <span class="links_name">
                        All Items
                    </span>
                </a>
            </li>
            <li>
                <a href="myfoods.php">
                    <i class='bx bxs-food-menu'></i>
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
                <a href="#" class="active">
                    <i class='bx bx-dollar'></i>
                    <span class="links_name">
                        Orders
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
            <li>
            <li class="login">
                <a href="../logout.php">
                    <span class="links_name login_out">
                        Log Out
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
        <div class="displayitems">
            <div class="distbl">
                <table>
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Mobile</th>
                            <th>Address</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Payment</th>
                            <th>Progress</th>


                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $qry = "SELECT chefs_id FROM tbl_chefs WHERE login_id =$sid";
                        $resqry = mysqli_query($con, $qry);
                        $chefid = mysqli_fetch_array($resqry);
                        $chid=$chefid['chefs_id'];
                        // $Selectquery = "SELECT orders.*,products.*,cart.* from orders,products,cart where products.chefs_id=orders.login_id AND cart.login_id = products.chefs_id";
                        //$Selectquery = "SELECT orders.* , products .*,cart.* from orders,products,cart WHERE orders.chefs_id='$chid' and products.chefs_id='$chid' and cart.login_id='$sid'";
                       // $Selectquery="SELECT   products.* , cart .* ,orders.* from products,cart,orders where products.chefs_id='3' LIMIT 2";
                        $Selectquery="SELECT * FROM `orders` join products on products.prdt_id = orders.prdt_id join cart on cart.cart_id = orders.cart_id where orders.chefs_id = '$chid'";
                        $res = mysqli_query($con, $Selectquery);


                        // $sqlk = "SELECT * FROM tbl_login";
                        // $reslti = mysqli_query($con,$sqlk);
                        // $result1 = mysqli_fetch_array($reslti);


                        while ($result = mysqli_fetch_array($res)) {
                            $imageurl = "food_images/" . $result['prdt_image'];
                        
                        ?>
                            <tr>
                                <td><img src="<?php echo $imageurl ?>"></td>
                                <td><?php echo $result['del_name']; ?></td>
                                <td><?php echo $result['del_phone']; ?></td>
                                <td><?php echo $result['del_addr']; ?></td>
                                <td><?php echo $result['quantity']; ?></td>
                                <td><?php echo $result['total_price']; ?></td>
                                <td><?php echo $result['payment_method']; ?></td>
                                <td><select name="progress">
                                        <option value="Order placed">Ordered</option>
                                        <option value="Processing">Processing</option>
                                        <option value="Dispatched">Dispatched</option>
                                    </select></td>


                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
                <!-- orderends -->
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