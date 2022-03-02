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
    .displayitems{
      align-items: center;
      padding-left: 30px;
      padding-right: 30px;
      padding-top:10px;
      padding-bottom:50px;
      border-radius:10px;
      
    }
    h1{
      text-align: center;
      margin-top: 50px;
      margin-bottom: 30px;
    }
    .distbl{
      padding-top: 20px;
      padding-bottom: 20px;
      align-content: center;
      border-radius: 10px;
    }
    table{
      background-color: white;
      border-collapse: collapse;
      border-color: #fff;
      box-shadow: 0 10px 20px rgba(0,0,0,0.3);
      border-radius: 10px;
      margin: auto;
    }
    th,td{
      border: 1px solid #f2f2f2;
      padding: 8px 30px;
      text-align: center;
      color:grey;
    }
    th{
      text-transform: uppercase;
      font: weight 500px;
    }
    td{
      font-size: 13px
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
        <a href="#" class="active">
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

      <!-- <li>
        <a href="profile.php">
        <i class='bx bxs-user-account' ></i>
          <span class="links_name">
            Profile
          </span>
        </a>
      </li> -->
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
  <!-- display food item -->

  <div class="fditems">
    <h1 >List of Food products</h1>
    <div class="displayitems">
      <div class="distbl">
        <table>
          <thead>
            <tr>
              <th>Id</th>
              <th>Name</th>
              <th>Price</th>
              <th>Image</th>
              <th>Description</th>
              <th>Added by</th>
              <th>Chef Id</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            <?php
              
              $qry= "select products.prdt_id,products.prdt_name,products.prdt_price,products.prdt_image,products.prdt_description,products.prdt_status,tbl_chefs.chef_name,tbl_chefs.chefs_id from products,tbl_chefs where products.chefs_id = tbl_chefs.chefs_id  ORDER BY prdt_id DESC;";
              $res4 = mysqli_query($con,$qry);
              
              
              while ($reslts = mysqli_fetch_array($res4))
              {
                $imageurl="../chefs/food_images/".$reslts['prdt_image'];
                ?>
                <!--  echo $result['prdt_name']."<br>"; -->
                <tr>
                  <td><?php echo $reslts['prdt_id']; ?></td>
                  <td><?php echo $reslts['prdt_name']; ?></td>
                  <td><?php echo $reslts['prdt_price']; ?></td>
                  <td><img src= "<?php echo $imageurl ?>" style="width:130px; height:100px;"></td>
                  <td><?php echo $reslts['prdt_description']; ?></td>
                  <td> Chef <?php echo $reslts['chef_name']; ?></td>
                  <td><?php echo $reslts['chefs_id']; ?></td>
                  <td><?php 
                  
                  if($reslts['prdt_status']==0)
                  {
                    echo "Available";
                  }
                  else{
                    echo "Not Available";
                  }
                  ?></td>
                  <!-- <td>
                    <a href='fooditems-update.php'>
                      <i class='bx bxs-edit-alt '  style='color:#089106'  ></i>
                    </a>
                  </td> 
                  <td>
                    <a href='fooditems-delete.php'>
                      <i class='bx bxs-trash-alt ' style='color:#fa1616' ></i>
                    </a>
                  </td> -->
                </tr>
            <?php
               
                }
                 
            ?>
            </tbody>
        </table>
      </div>
    </div>
  </div>
</body>
</html>