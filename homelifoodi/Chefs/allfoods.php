<?php
    include 'connect.php';
    session_start();

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
        <title>homelifoodi-fooditems</title>
        <link rel="stylesheet" href="css/main.css">
        <!-- box icon -->
        <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
        <meta charset="UTF-8">

        <!-- Boxicons CDN Link -->
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style> 
            .cards{
                position: relative;
                width: 100%;
                padding: 1rem 1.5rem;
                display: grid;
                grid-template-columns: repeat(3, 1fr);
                grid-gap: 10px;
            }
            .fddisplay{
                margin:5px 0 5px 10px;
                display:flex;
                flex-wrap: wrap;
                width:36%;
            }
            .displaycard{
                margin: 5px 10px 0 10px;     
                
            }
            .displayimg{
                text-align: center;
                border-radius:10px 10px 0 0;
                width:180px;
                border: none;
                height:200px;
                margin:0 0 0 0;
            }
            .displayimg img{
                width: 250px;
                height: 180px;
                border-radius:10px 10px 0 0;
            }
            .displaytext{
                text-align: center;
                align-items:inline;
                width: 250px;
                height: 120px;
                background-color: white;
                margin:0 0 0 0;

            }
            .displaytext h3{
                padding:10px 0 0 0;
            }
            .user_wrapper{
                font-weight: bold;
                color: white;
                font-size: 20px;
                background-color:black ;
                padding: 10px 30px 10px 30px;
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
            <a href="chefhome.php">
            <i class='bx bxs-home' ></i>
            <span class="links_name">
                Home
            </span>
            </a>
        </li>
        <li>
            <a href="#" class="active">
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
        </div>
        <!-- End Top Bar -->
        <!-- fOOD MEnu Section Starts Here -->
        <div class="food-menu">
            <h1>Food Menu<br></h1>
            <div class="cards">
            <?php
                $Selectquery = "SELECT * FROM products WHERE prdt_status='0' ORDER BY prdt_id DESC  ";
                $res=mysqli_query($con,$Selectquery);
                $num = mysqli_num_rows($res);

                while ($result = mysqli_fetch_array($res))
                {
                    $imageurl="food_images/".$result['prdt_image'];
                ?>
                <div class="fddisplay">
                    <div class="displaycard">
                        <div class="displayimg">
                        <img src= "<?php echo $imageurl ?>">
                        </div>
                        <div class="displaytext">
                            <h3><?php echo $result['prdt_name'];?></h3>
                            <h4>₹<?php echo $result['prdt_price']; ?></h4>
                            <p><?php echo $result['prdt_description']; ?></p>
                        </div>
                    </div>
                </div>
            <?php } ?>
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
                if(sidebar.classList.contains("open")) {
                    closeBtn.classList.replace("bx-menu", "bx-menu-alt-right");
                } else {
                    closeBtn.classList.replace("bx-menu-alt-right", "bx-menu");
                }
            }
        </script>
    </body>
</html>