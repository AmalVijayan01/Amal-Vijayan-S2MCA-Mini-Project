<?php
    include 'connect.php';
    session_start();
    $urn = $_SESSION['login_id'];
    $id = $_GET['id'];
    $rid = $_GET['r_id'];
    $prid = $_GET['pid'];
    $prtid = $_GET['p_rid'];
    $status =0;
    $statusd =1;
    
    $sqle = "SELECT * FROM tbl_chefs where login_id = '$urn'";
    $reslta = mysqli_query($con,$sqle);
    $resltf=mysqli_fetch_array($reslta);
    $urn1 = $resltf['chefs_id'];

    mysqli_query($con,"UPDATE products set prdt_status='$status' where prdt_id = '$prid' AND chefs_id = '$urn1'");
    mysqli_query($con,"UPDATE products set prdt_status='$statusd' where prdt_id = '$prtid' AND chefs_id = '$urn1'");
    header("Location: myfoods.php");
?>