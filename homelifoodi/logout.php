<?php
    require 'connect.php';
    session_start();
    $_SESSION = ['login_id'];
    session_destroy();
    header("Location:../homelifoodi/login.php");
?>