<?php
include 'connect.php';
include 'header.php';

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $addr = $_POST['address'];
    $email = $_POST['email'];
    $mob = $_POST['mob'];
    $uname = $_POST['username'];
    $pass = md5($_POST['password']);
    $cpass = $_POST['cpassword'];
    $role = "customer";

    $sqlc = "Select * from tbl_login where username='$uname'";
    $result6 = mysqli_query($con, $sqlc);
    $num = mysqli_num_rows($result6);

    if ($num == 0) {
        $req = "insert into tbl_login(username,password,role) values ('$uname','$pass','$role')";
        mysqli_query($con, $req);

        $query = "select * from tbl_login where username='$uname' ";
        $result = mysqli_query($con, $query);
        $row = mysqli_fetch_array($result);
        $usr = $row['login_id'];

        $sqld = "INSERT INTO customers(cust_name,cust_address,cust_email,cust_mobile,login_id) VALUES ('$name','$addr','$email','$mob','$usr')";
        mysqli_query($con, $sqld);
        header('location:login.php');
    } else {
        echo "<script>alert('Username already exists')</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>signup Form</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@100&family=Poppins:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/formstyle.css">

    <script type="text/javascript">
        function validate() {
            var name = document.myform.name.value;
            var address = document.myform.address.value;
            var email = document.myform.email.value;
            var mobile = document.myform.mob.value;
            var uname = document.myform.username.value;
            var pass = document.myform.password.value;
            var cpass = document.myform.cpassword.value;

            var pwd_expression = /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{7,15}$/;
            var letters = /^[A-Za-z]+$/;
            var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            var phoneno = /^\d{10}$/;


            if (name == '') {
                alert('Please enter your name');
                return false;
            } else if (!letters.test(name)) {
                alert('Name field required only alphabet characters');
                return false;
            } else if (address == '') {
                alert('Please enter your address');
                return false;
            } else if (email == '') {
                alert('Please enter your user email id');
                return false;
            } else if (!filter.test(email)) {
                alert('Invalid email');
                return false;
            } else if (mobile == '') {
                alert('Please enter the mobile number.');
                return false;
            } else if (!phoneno.test(mobile)) {
                alert('Invalid Phoneno');
                return false;
            } else if (uname == '') {
                alert('Please enter the username.');
                return false;
            } else if (pass == '') {
                alert('Please enter your Password');
                return false;
            } else if (!pwd_expression.test(pass)) {
                alert('7 to 15 characters which contain at least one numeric digit and a special character  are required in Password filed');
                return false;
            } else if (cpass == '') {
                alert('Enter Confirm Password');
                return false;
            } else if (pass != cpass) {
                alert('Password not Matched');
                return false;
            } else {
                alert('Registration Sucessfully');
            }
            return (true);

        }
    </script>
</head>

<body>
    <main>
        <div class="box">
            <div class="inner-box">
                <div class="column-1">
                    <img src="image/logo.png" alt="" class="logo">
                    <div class="desc">
                        Pure home food <br>
                        by talented home chefs.
                    </div>
                    <img src="image/1.png" alt="" class="image">
                </div>
                <div class="column-2">
                    <form class="form" name="myform" method="POST" action="signup.php" autocomplete="off" onsubmit="return(validate());">

                        <h3>create account</h3>
                        <div class="inputs">
                            <div class="input-field" style="text-align: none;">
                                <input type="text" class="input" placeholder="Name" autocomplete="off" required name="name">
                            </div>
                            <div class="input-field">
                                <input type="text area" class="input" placeholder="Address" autocomplete="off" required name="address">
                            </div>
                            <div class="input-field">
                                <input type="email" class="input" placeholder="Email" autocomplete="off" required name="email">
                            </div>
                            <div class="input-field">
                                <input type="text" class="input" placeholder="Mobile" autocomplete="off" required name="mob">
                            </div>
                            <div class="input-field">
                                <input type="text" class="input" placeholder="Username" autocomplete="off" required name="username">
                            </div>
                            <div class="input-field">
                                <input type="password" class="input pass" placeholder="Password" autocomplete="off" required name="password">
                            </div>
                            <div class="input-field">
                                <input type="password" class="input pass" placeholder="Confirm Password" autocomplete="off" required name='cpassword'>
                            </div>
                            <input type="submit" value="create account" class="btn-create" name="submit">
                        </div>

                        <div class="login">Existing customer
                            <a href="login.php">Login here</a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </main>
    <script src="./form.js"></script>
</body>

</html>