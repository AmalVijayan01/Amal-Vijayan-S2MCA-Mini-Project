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
      padding-top:50px;
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
    td a{
      padding:5px 7px 5px 4px;
      border-radius: 6px;
    }
    .btna{
      background-color: greenyellow;
      padding: 3px 7px 3px 7px;
      border-radius: 10px;
      border: none;
      font-weight: bold;
    }
    .btnb{
      background-color:red;
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
        <a href="orders.php">
          <i class='bx bx-cart-alt'></i>
          <span class="links_name">
            Orders
          </span>
        </a>
      </li>
      <li>
        <a href="#" class="active">
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
  <div class="fditems">
    <h1 >List of Customers</h1>
    <div class="displayitems">
      <div class="distbl">
        <table>
          <thead>
            <tr>
              <th>Id</th>
              <th>Name</th>
              <th>Address</th>
              <th>Email</th>
              <th>Mobile</th>
              <th>Status</th>
              <th>Update</th>
            </tr>
          </thead>
          <tbody>
          <?php
          $Selectquery = "SELECT tbl_login.*,customers.* from tbl_login,customers where tbl_login.login_id=customers.login_id;";
              // $Selectquery = "SELECT * FROM customers";
              $res=mysqli_query($con,$Selectquery);

              while ($result = mysqli_fetch_array($res))
              {
                ?>
                <tr>
                  <td><?php echo $result['cust_id']; ?></td>
                  <td><?php echo $result['cust_name']; ?></td>
                  <td><?php echo $result['cust_address']; ?></td>
                  <td><?php echo $result['cust_email']; ?></td>
                  <td><?php echo $result['cust_mobile']; ?></td>
                  <td><?php 
                    if($result['status']==0)
                    {
                      echo "active";
                    }
                    else{
                      echo "Inactive";
                    }
                    ?>
                  </td>
                  <td>
                  <a href="suspend-users.php?id=<?php echo $result['login_id'] ?> ">
                  <input type="submit" value="Enable" class="btna"></a> 
                  <a href="suspend-users.php?r_id=<?php echo $result['login_id'] ?> ">
                  <input type="submit" value="Disable" class="btnb"></a>
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
</body>
</html>