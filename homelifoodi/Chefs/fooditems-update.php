<?php
include 'connect.php';
session_start();
?>
<?php
    $sqlf = "SELECT chefs_id FROM tbl_chefs WHERE login_id = '" . $_SESSION['login_id'] . "'";
    $resltg = mysqli_query($con, $sqlf);
    $reslth = mysqli_fetch_array($resltg);
    $urn2 = $reslth['chefs_id'];

    $upqry = "SELECT * FROM  products WHERE  chefs_id='$urn2'";
    $resupqry=mysqli_query($con,$upqry);
    $resupqry1=mysqli_fetch_array($resupqry);
    $imageurl = "food_images/" . $resupqry1['prdt_image'];
?>
<html>

<head>
    <title>update foods</title>
    <script type="text/javascript">

    </script>
    <style>
        .body {
            justify-content: center;
            position: absolute;
        }

        .updt-food {}

        .updt-food form {}

        .fd-dtls {
            position: absolute;
            align-items: center;
            justify-content: center;
        }
    </style>
</head>

</html>

<body>
    <div class="updt-food">
        <form action="" method="post" action="#">
            <h3>Welcome</h3>
            <div class="fd-dtls">
                <tr>
                    <label>Name:</label><br>
                    <input type="text" name="name" ><br>
                    <label>Price:</label><br>
                    <input type="text" name="addr" value="<?php echo $resupqry1['prdt_price']; ?>"><br>
                    <label>Image:</label><br>
                    <input type="file" name="email" value=""><br>
                    <label>Description:</label><br>
                    <input type="text" name="mob" value="<?php echo $resupqry1['prdt_description']; ?>"><br>
                    <input type="submit" value="update" name="submit">
            </div>
            </tr>
    </div>
    </form>
    </div>
    <?php 
        // if($_POST["submit"]){
        //     $fdupdt = "UPDATE products SET `prdt_name`='',`prdt_price`='',`prdt_image`='',`prdt_description`='' WHERE 1
        // }
    ?>
</body>

</html>
<?php

?>