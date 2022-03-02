<?php
  include 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Homelifoodi Admin</title>
  <link rel="stylesheet" href="css/main.css">
  <!-- box icon -->
  <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
<style>
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
</style>
</head>
<body>
  <div class="sidebar">
    <div class="logo_details">
      <i class='bx bx-code-alt'></i>
      <div class="logo_name">
        Admin
      </div>
    </div>
    <ul>
      <li>
        <a href="index.php" >
        <i class='bx bxs-dashboard' ></i>
          <span class="links_name">
            Dashboard
          </span>
        </a>
      </li>
      <li>
        <a href="fooditems.php">
        <i class='bx bx-food-menu' ></i>
          <span class="links_name">
            Food items
          </span>
        </a>
      </li>

      <!-- <li>
        <a href="">
        <i class='bx bx-food-menu' ></i>
          <span class="links_name">
            Chef Requests
          </span>
        </a>
      </li> -->

      <li>
        <a href="#" class="active">
          <i class='bx bx-cart-alt'></i>
          <span class="links_name">
            Orders
          </span>
        </a>
      </li>
      <li>
        <a href="customers.php">
          <i class='bx bx-user'></i>
          <span class="links_name">
            Customers
          </span>
        </a>
      </li>

      <li>
        <a href="chefs.php">
        <i class='bx bx-food-menu' ></i>
          <span class="links_name">
            Chefs
          </span>
        </a>
      </li>

      <!-- <li>
        <a href="profile.php">
        <i class='bx bxs-user-account' ></i>
          <span class="links_name">
            Profile
          </span>
        </a> -->
      </li>
      <li class="login">
        <a href="logout.php ">
          <span class="links_name login_out">
            Logout
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
        <img src="img/user.jpg" alt="">
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

            $oqry="SELECT * FROM orders,products WHERE orders.prdt_id=products.prdt_id";
            $ores=mysqli_query($con,$oqry);
            while ($ores1 = mysqli_fetch_array($ores)) {
                $nam = $ores1['del_name'];
                $phn = $ores1['del_phone'];
                $adr = $ores1['del_addr'];
                $tot = $ores1['prdt_price'];
                $pay = $ores1['payment_method'];
                $pnam = $ores1['prdt_name'];
                $stat=$ores1['order_status'];
                $imageurl = "../Chefs/food_images/" . $ores1['prdt_image'];

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
              
            </div>
            
            
        </ordertbl>
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