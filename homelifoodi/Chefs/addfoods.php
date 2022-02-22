<?php
  include 'connect.php';
  session_start();
  ob_start();
  $urn = $_SESSION['login_id'];
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
  <title>Homelifoodi Admin</title>
  <link rel="stylesheet" href="css/main.css">
  <!-- box icon -->
  <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
  <style>
    .add{

        align-self: center;
        padding-left: 150px; 
        padding-right: 150px;
        padding-top:50px;
        padding-bottom:50px;
        margin-top: 30px;
        margin-right: 200px;
        margin-left: 200px;
        border-radius: 10px;
      }
     h2{
        text-align: center;
        margin-bottom: 30px;
        margin-left: 50x;
        margin-top: 50px;
      }
      form{
      background-color: white;
      border-collapse: collapse;
      border-color: #fff;
      box-shadow: 0 10px 20px rgba(0,0,0,0.3);
      border-radius: 10px;
      margin: auto;
      padding:50px 30px 50px 30px;
    }
    label{
      width:200px;
      display: inline-block;
      text-transform: uppercase;
    }
    input{
      width:300px;
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
            <a href="myfoods.php">
            <i class='bx bxs-food-menu' ></i>
            <span class="links_name">
                My Items
            </span>
            </a>
        </li>
        <li>
            <a href="#" class="active">
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
      <div class="user_wrapper">
      <h5><?php echo $reslt['username']; ?></h5>
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
   <h2 >Add New Food Item</h2>  
  <div class="add" >
 
  <div class="adfd" >
      <form method="POST" action="#"  enctype="multipart/form-data">
        <label>Item Name :</label>
        <input type="text" name="itemname" required autocomplete="off">
        <br><br>
        <label>Item Price :</label> 
        <input type="number" name="itemprice" required autocomplete="off">
        <br><br>
        <label>Item Image :</label>
        <input type="file" name="uploadimage" >
        <br><br>
        <label>Item Description :</label> 
        <input type="text area" cols="80" rows="10" name="itemdes" required autocomplete="off">
        <br><br>
        <label>Add item :</label> 
        <input type="submit" name="submit" value="Add Item">
        <br><br>
      </form>
    </div>
  </div>

</body>
</html>



<?php
  
  if(isset($_POST['submit']))
  {
    $itemname = $_POST['itemname'];
    $itemprice = $_POST['itemprice'];
    $filename = $_FILES["uploadimage"]["name"];
    $tempfile = $_FILES["uploadimage"]["tmp_name"];
    $folder = "food_images/".$filename;
    $itemdes = $_POST['itemdes'];
    $status = 0;

    $sqle = "SELECT * FROM tbl_chefs where login_id = '$urn'";
    $reslta = mysqli_query($con,$sqle);
    $resltf=mysqli_fetch_array($reslta);
    $urn1 = $resltf['chefs_id'];

    $sql="INSERT INTO  products(chefs_id,prdt_name,prdt_price,prdt_image,prdt_description,prdt_status) VALUES ('$urn1','$itemname','$itemprice','$filename','$itemdes','$status')";
    mysqli_query($con,$sql);
    move_uploaded_file($tempfile,$folder);
    
    header("Location:addfoods.php");
    ob_end_flush();
  }
 
?>