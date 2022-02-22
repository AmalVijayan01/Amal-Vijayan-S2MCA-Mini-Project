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
        $reslt['password'];
    }

    $sqle="SELECT * FROM customers WHERE login_id ='". $_SESSION['login_id']."'";
    $resc= mysqli_query($con,$sqle);
    if($rese = mysqli_fetch_array($resc))
    {
        $rese['cust_id'];
        $rese['cust_name'];
        $rese['cust_address'];
        $rese['cust_email'];
        $rese['cust_mobile'];
        
    }

    if(isset($_POST['submit']))
    {
        $name = $_POST['name'];
        $addr = $_POST['addr'];
        $email = $_POST['email'];
        $mob = $_POST['mob'];
        $pass = $_POST['pass'];
        $sqlc = "UPDATE customers SET cust_name='$name', cust_address='$addr', cust_email='$email',cust_mobile='$mob' WHERE login_id = '". $_SESSION['login_id']."'";
        $resd = mysqli_query($con,$sqlc);

        if($resd)
        {
            print "<script> alert('Profile updated sucessfully')</script>";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>homelifoodi-userprofile</title>
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
            .profcard{
                background-color:white;
                position: absolute;
                display: flex;
                align-items: center;
                justify-content: center;
                width:500px;
                height: 700px;;
                margin: 50px 200px 50px 350px;
                padding:30px 50px 10px 50px;
                min-width: 10%;
                max-width: 100%;
                border-radius:0px;
                box-shadow: 20px;
                display:grid;
            }
            .profcard h3{
                text-align: center;
                justify-content: center;
                margin:0px 0 5px 0;
                font-weight: bold;
            }
            .f1{
                display:flex;
            }
            .inpbox{
                border: none;
            }
            .profcard p{
                text-align:center;
                font-size: 20px;
            }
            .f1 label{
                align-items: left;
                margin-right: 20px;
            }
            .f1 text{
                display: inline-block;
                margin: left 10px;
            }
            .protbl .sbtn{
               margin:10px 0 0 0;
               border-radius: 30px;
               width:250px;
               height:30px;
               background-color: greenyellow;
               box-shadow: none;
               border: none;
               box-shadow: 5px 5px;
            }
            .protbl input{
                width:250px;
                height:50px;
                margin:5px 0 5px 0;
                border-radius: 10px;
                text-align: center;
                box-shadow: 5px 5px;
            }
        </style>
        <script>
            function alerts()
            {
               alert('username cannot be changed');
            }
        </script>
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
            <a href="orders.php">
            <i class='bx bx-dollar' ></i>
            <span class="links_name">
                My Orders
            </span>
            </a>
        </li>
        <li>
            <a href="#" class="active">
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

        <div class="profcard">
            <form action="" method="post" action="#">
                <h3>Welcome</h3>
                <div class="protbl">
                    <tr>
                        <label>Name:</label><br>
                        <input type="text" name="name" value="<?php echo $rese['cust_name'];?>" ><br>
                        <label>Address:</label><br>
                        <input type="text" name="addr" value="<?php echo $rese['cust_address'];?>" ><br>
                        <label>Email:</label><br>
                        <input type="text" name="email" value="<?php echo $rese['cust_email'];?>" ><br>
                        <label>Mobile:</label><br>
                        <input type="text" name="mob" value="<?php echo $rese['cust_mobile'];?>" ><br>
                        <label>Username:</label><br>
                        <input type="text" name="uname" readonly onclick="return alerts()" value="<?php echo $reslt['username'];?>"><br>
                        <label>Password:</label><br>
                        <input type="password" name="pass" value="<?php echo $reslt['password'];?>"><br>
                        <div class="sbtn">
                            <input type="submit" value="update" name="submit" class="sbtn">
                        </div>
                    </tr>
                </div>
            </form>

        </div>

        <!-- End Top Bar -->
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
