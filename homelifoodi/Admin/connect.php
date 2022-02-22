<?php
    $host = "localhost"; $username = "root";  $dbname = "homelifoodi";
    $con = mysqli_connect($host, $username,"", $dbname)or die ("not connected ");
    if (!$con) {
        die("<script>alert('Connection Failed.')</script>");
    }    
?>