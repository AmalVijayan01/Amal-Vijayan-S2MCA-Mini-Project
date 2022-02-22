<?php
  include 'connect.php';
  session_start();
  
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
  <link href="https://icons8.com/icon/PIQrqZ6SK4m6/chef">
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
        <a href="#" class="active">
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
        <a href="orders.php">
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

      <li>
        <a href="profile.php">
        <i class='bx bxs-user-account' ></i>
          <span class="links_name">
            Profile
          </span>
        </a>
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
      <div class="search_wrapper">
        <label>
          <span>
            <i class='bx bx-search'></i>
          </span>
          <input type="search" placeholder="Search...">
        </label>
      </div>
      <div class="user_wrapper">
        <img src="img/user.jpg" alt="">
      </div>
    </div>
    <!-- End Top Bar -->
    <div class="card-boxes">
      <div class="box">
        <div class="right_side">
          <div class="numbers">9.99</div>
          <div class="box_topic">Total Orders</div>
        </div>
        <img src="https://img.icons8.com/fluency/48/000000/shopping-cart-with-money.png"/>
      </div>
      <?php 
        $Selectquery1 = "SELECT * FROM customers";
        $res1=mysqli_query($con,$Selectquery1);
        $num1 = mysqli_num_rows($res1);
      ?>
      <div class="box">
        <div class="right_side">
          <div class="numbers"><?php echo $num1; ?></div>
          <div class="box_topic">Total Customers</a></div>
        </div>
        <img src="https://img.icons8.com/fluency/48/000000/group.png"/>
      </div>
      <?php 
        $Selectquery3 = "SELECT * FROM tbl_chefs";
        $res3=mysqli_query($con,$Selectquery3);
        $num3 = mysqli_num_rows($res3);
      ?>
      <div class="box">
        <div class="right_side">
          <div class="numbers"><?php echo "$num3";?></div>
          <div class="box_topic">Total Chefs</div>
        </div>
        <img src="https://img.icons8.com/color/48/000000/cook-male--v1.png"/>
      </div> 
      <?php 
        $Selectquery = "SELECT * FROM products";
        $res=mysqli_query($con,$Selectquery);
        $num = mysqli_num_rows($res);
      ?>
      <div class="box">
        <div class="right_side">
          <div class="numbers"><?php echo "$num";?></div>
          <div class="box_topic">Total Items</a></div>
        </div>
        <img src="https://img.icons8.com/fluency/48/000000/restaurant-menu.png"/>
      </div>
    </div>
    <!-- End Card Boxs -->

    <div class="details">
      <div class="recent_project">
        <div class="card_header">
          <h2>Recently added items</h2>
        </div>
        <table>
          <thead>
            <tr>
              <td>Name</td>
              <td>Price</td>
              <td>Image</td>
              <td>Added By</td>
            </tr>
          </thead>
          <tbody>
          <?php
             $items = "select products.prdt_name,products.prdt_price,products.prdt_image ,tbl_chefs.chef_name from products,tbl_chefs where products.chefs_id = tbl_chefs.chefs_id  ORDER BY prdt_id DESC LIMIT 6;";
              $resitems = mysqli_query($con,$items);
             
              
                while($resnum = mysqli_fetch_array($resitems))
                
                {
                  $imageurl="../chefs/food_images/".$resnum['prdt_image'];
                  ?>
                  <tr>
                    <td><?php echo $resnum['prdt_name']?></td>
                    <td><?php echo $resnum['prdt_price']?></td>
                    <td><img src= "<?php echo $imageurl ?>" style="width:80px; height:60px;"></td>
                    <td>chef <?php echo $resnum['chef_name']?></td>
                  </tr>
                  <?php
                } 
              
            ?>
          </tbody>
        </table>
      </div>
      <div class="recent_customers">
        <div class="card_header">
          <h2>New Customers</h2>
        </div>
        <table>
          <tbody>
            <?php
              $cus = "SELECT cust_name,cust_email FROM customers ORDER BY cust_id DESC LIMIT 6 ";
              $cusres = mysqli_query($con,$cus);
              $cusnum = mysqli_num_rows($cusres);

              while ($rescus = mysqli_fetch_array($cusres))
              {
              ?>
            <tr>
              <td>
                <div class="info_img">
                  <img src="img/avatar-2.jpg" alt="">
                </div>
              </td>
              <td>
                <h4><?php echo $rescus['cust_name'];?></h4>
                <span><?php echo $rescus['cust_email'];?></span>
              </td>
            </tr>
            <?php } ?>

          </tbody>
        </table>
      </div>
    </div>
  </section>

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