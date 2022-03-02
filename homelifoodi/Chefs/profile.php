<?php
    include 'connect.php';
    session_start();

    $sqlb="SELECT * FROM tbl_login WHERE login_id ='". $_SESSION['login_id']."'";
    $resb = mysqli_query($con,$sqlb);
    if($reslt=mysqli_fetch_array($resb))
    {
        $reslt['username'];
        $reslt['password'];
    }
    $sqle="SELECT * FROM tbl_chefs WHERE login_id ='". $_SESSION['login_id']."'";
    $resc= mysqli_query($con,$sqle);
    if($rese = mysqli_fetch_array($resc))
    {
        $rese['chefs_id'];
        $rese['chef_name'];
        $rese['chef_address'];
        $rese['chef_email'];
        $rese['chef_mobile'];
        
    }

    if(isset($_POST['submit']))
    {
        $name = $_POST['name'];
        $addr = $_POST['addr'];
        $email = $_POST['email'];
        $mob = $_POST['mob'];
        $pass = $_POST['pass'];
        $sqlc = "UPDATE tbl_chefs SET chef_name='$name', chef_address='$addr', chef_email='$email',chef_mobile='$mob' WHERE login_id = '". $_SESSION['login_id']."'";
        $resd = mysqli_query($con,$sqlc);

        if($resd)
        {
            echo "<script> alert('Profile updated sucessfully')</script>";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>homelifoodi-chef-profile</title>
        <link rel="stylesheet" href="css/main.css">
        <!-- box icon -->
        <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
        <style>
            .user_wrapper{
                font-weight: bold;
                color: white;
                font-size: 20px;
                background-color:black ;
                padding: 10px 30px 10px 30px;
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
            <a href="chefhome.php" >
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
            <a href="#" class="active">
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

        <div class="profcard">
            <form action="" method="post" action="#">
                <h3>Welcome</h3>
                <div class="protbl">
                    <tr>
                        <label>Name:</label><br>
                        <input type="text" name="name" value="<?php echo $rese['chef_name'];?>" ><br>
                        <label>Address:</label><br>
                        <input type="text" name="addr" value="<?php echo $rese['chef_address'];?>" ><br>
                        <label>Email:</label><br>
                        <input type="text" name="email" value="<?php echo $rese['chef_email'];?>" ><br>
                        <label>Mobile:</label><br>
                        <input type="text" name="mob" value="<?php echo $rese['chef_mobile'];?>" ><br>
                        <label>Username:</label><br>
                        <input type="text" name="uname" readonly onclick="return alerts()" value="<?php echo $reslt['username'];?>"><br>
                        <label>Password:</label><br>
                        <input type="password" name="pass" value="<?php echo $reslt['password'];?>"><br>
                        <div class="sbtn">
                            <input type="submit" value="update" name="submit">
                        </div>
                    </tr>
                </div>
            </form>
        </div>

        <!-- end profile card -->
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