<?php
include 'connect.php';
$id = $_GET['id'];
$rid = $_GET['r_id'];
$status =0;
$statusd =1;
mysqli_query($con,"UPDATE tbl_login set status='$status' where login_id = '$id'");
mysqli_query($con,"UPDATE tbl_login set status='$statusd' where login_id = '$rid'");
header("Location: customers.php");
?>