<?php
    include 'connect.php';
    session_start();
    $urn = $_SESSION['login_id'];
    $id = $_GET['id'];
    $rid = $_GET['r_id'];
    $status =0;
    $statusd =1;
    
    $sqle = "SELECT * FROM tbl_chefs where login_id = '$urn'";
    $reslta = mysqli_query($con,$sqle);
    $resltf=mysqli_fetch_array($reslta);
    $urn1 = $resltf['chefs_id'];

    mysqli_query($con,"UPDATE products set prdt_status='$status' where login_id = '$id'");
    mysqli_query($con,"UPDATE products set prdt_status='$statusd' where login_id = '$rid'");
    header("Location: myfoods.php");
?>