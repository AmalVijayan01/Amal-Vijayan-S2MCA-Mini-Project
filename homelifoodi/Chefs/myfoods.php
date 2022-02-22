<?php
    include 'connect.php';
    session_start();
    $urn = $_SESSION['login_id'];
    $sqlb="SELECT * FROM tbl_login WHERE login_id ='". $_SESSION['login_id']."'";
    $resb = mysqli_query($con,$sqlb);
    if($reslt=mysqli_fetch_array($resb))
    {
      $reslt['username'];
    }
    $sqlf = "SELECT chefs_id FROM tbl_chefs WHERE login_id = '". $_SESSION['login_id']."'";
    $resltg = mysqli_query($con,$sqlf);
    $reslth = mysqli_fetch_array($resltg);
    $urn2 = $reslth['chefs_id'];

    $sqlg = "SELECT * FROM products WHERE chefs_id = '$urn2'  ORDER BY prdt_id DESC;";
    $reslti = mysqli_query($con,$sqlg);
    
    
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>homelifoodi-chef-myfoods</title>
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
            <a href="#" class="active">
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
            <a href="ordersforme.php" >
            <i class='bx bx-dollar' ></i>
            <span class="links_name">
                Orders
            </span>
            </a>
        </li>
        <li>
            <a href="profile.php" >
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
        <!-- food menu starts -->
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
              <th>Status</th>
              <th>Update Status</th>
              <th>Update</th>
            </tr>
          </thead>
          <tbody>
          <?php while ($resltj = mysqli_fetch_array($reslti))
          {
            $imageurl="food_images/".$resltj['prdt_image'];
            ?>
                <tr>
                  <td><?php echo $resltj['prdt_id']; ?></td>
                  <td><?php echo $resltj['prdt_name']; ?></td>
                  <td><?php echo $resltj['prdt_price']; ?></td>
                  <td><img src= "<?php echo $imageurl ?>" style="width:130px; height:100px;"></td>
                  <td><?php echo $resltj['prdt_description']; ?></td>
                  <td>
                    <?php 

                      if($resltj['prdt_status'] == 0)
                      {
                        echo "Enabled" ;
                      }
                      else if ($resltj['prdt_status'] == 1)
                      {
                        echo " Disabled" ;
                      }
        
                    ?>
                  </td>
                  <td>
                    <?php     
                      $sqle = "SELECT * FROM tbl_chefs where login_id = '$urn'";
                      $reslta = mysqli_query($con,$sqle);
                      $resltf=mysqli_fetch_array($reslta);
                      $urn1 = $resltf['chefs_id'];
                    ?>
                    <a href="suspendfood.php?id=<?php echo $urn1?> ">
                    <input type="submit" value="Enable" class="btna"></a> 
                    <a href="suspendfood.php?r_id=<?php echo $urn1 ?> ">
                    <input type="submit" value="Disable" class="btnb"></a>
                  </td>
                  <td>
                  
                
                  </td>
                  <td>
                    <a href='fooditems-update.php'>
                    <i class='bx bx-edit' style='color:#56ff06'  ></i>
                    </a>
                  </td>
                </tr>
            <?php
                }
            ?>
            </tbody>
        </table>
      </div>
    </div>
  </div>
        <!-- food menu ends -->
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