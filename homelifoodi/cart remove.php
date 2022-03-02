<?php
include 'connect.php';
$id = $_GET['id'];
mysqli_query($con,"UPDATE cart SET cart_status ='2'WHERE cart_id = '$id'");
header("Location: cart.php");
?>