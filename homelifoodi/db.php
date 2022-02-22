<?php 
include 'connect.php';
if(isset($_GET['product_id'])&($_GET['login_id']));
{
    $int=$_GET['product_id'];
    $cu=$_GET['login_id'];
}
$query="SELECT prdt_price from products where prdt_id='$int'" ;
mysqli_query($con,$query);
$res=mysqli_query($con,$query);
$data=mysqli_fetch_array($res);
$price=$data['prdt_price'];
$queryy="insert into cart (prdt_id,login_id,unit_price) values ('$int','$cu','$price');";
$reslti = mysqli_query($con,$queryy);
header("location:foods.php");
?>
