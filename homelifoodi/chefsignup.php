<?php
    include 'header.php';
    include 'connect.php';
    session_start();
    ob_start();
?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
        <!-- <link rel="stylesheet" type="text/css" href="css/formstyle.css"> -->
        <style>
            .user-form{ 
                background-color: blanchedalmond;
                margin-top:20px;                
                padding: 50px;
                border-radius:10px;
                
            }
            form{
                margin-left: 420px;
                background-color:white;
                padding: 30px 30px 30px 30px;
                border-radius:10px;
                box-shadow: 6px 6px 8px  black;
            }
            .user-form h1{
                color: black;
                font-weight: 700;
                text-align: center;
                margin-top:20px;
            }
            .user-form i{
                position: absolute;
                color: #6C63FF;
                margin: 25px 10px;
            }
            input{
                width: 100%;
                border: none;
                font-size: 15px;
                margin: 10px 0;
                padding: 0 30px;
            }
            .action-btn{
                width: 100%;
                display: flex;
                margin: 30px 0;
                align-items: center;
                justify-content: center;
            }
            .btn{
                border: 1px solid #fff;
                color: #fff;
                padding: 10px;
                border-radius: 20px;
                width: 50%;
                margin: 0 10px;
                font-size: 16px;
            }
            .primary{
                border: none;
                background: linear-gradient(45deg, rgba(222,197,5,1) 24%, rgba(255,107,0,1) 100%);
            }
            .docs label{
                text-align: center;
            }
            .docs{
                display: flex;
            }
            .docs h3{
                margin-top: 17px;
                margin-left: 5px;
                color: black    ;
            }
            .upload-box{
                font-size:16px;
                background: white;
                border-radius: 50px;
                box-shadow: 3px 3px 5px  black;
                max-width: 100%;
                margin-left: 13px;
                padding-top: 10px;
                padding-bottom: 10px;
                border-radius: 10px;
            }
            .inputbox{
                box-shadow: 3px 3px 5px  black;
                border: none;
                height: 2.5em;
                border-radius: 10px;
                max-width: 100%;
            }
            .textarea{
                box-shadow: 3px 3px 5px  black;
                border: none;
                max-width: 100%;
                border-radius: 10px;
                font-size:16px;
                padding: 0 30px;
            }
            .btn{
                width: 100%;
                margin: 5px;
                padding: 5px;

            }
            .log{
                text-align: center;
            }
            .log a{
                font-size:15px;
            }
        </style>
        <script type="text/javascript">
            function validate() {
            var name = document.myform.name.value;
            var address = document.myform.address.value;
            var email = document.myform.email.value;
            var mobile = document.myform.mob.value;
            var uname = document.myform.uname.value;
            var pwd = document.myform.pwd.value;
            var cpwd = document.myform.cpwd.value;
            
            var pwd_expression = /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{6,10}$/;
            var letters = /^[A-Za-z]+$/;
            var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            var phoneno = /^\d{10}$/;


            if (name == '') {
                alert('Please enter your name');
                return false;
            } else if (!letters.test(name)) {
                alert('Name must contain alphabet characters only');
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
            } else if (pwd == '') {
                alert('Please enter your Password');
                return false;
            } else if (!pwd_expression.test(pwd)) {
                alert('password must contain characters 6-10 characters consist of numeric digit and a special character');
                return false;
            } else if (cpwd == '') {
                alert('Enter Confirm Password');
                return false;
            } else if (pwd != cpwd) {
                alert('Password not Matched');
                return false;
            } else {
                alert('Registration Sucessfully');
            }
            return (true);

        }
        function fileValidation() {
            var fileInput = document.myform.image;
            var filePath = fileInput.value;
            var allowedExtensions = /(\.jpg|\.png|\.jpeg)$/i;
              
            if (!allowedExtensions.exec(filePath)) {
                alert('Invalid file type.Only .jpeg, .jpg, .png extensions are allowed');
                fileInput.value = '';
                return false;
            } 
        }
        </script>
    </head>
    <body>
        <div class="inner">
            <div class="user-form">
                <h1>Welcome!</h1>
                <form action="#" method="POST"  name="myform" onsubmit="return(validate());" enctype="multipart/form-data">
                    <h2>Homelifoodi Chef Signup</h2>
                    <input type="text" placeholder="Your name" class="inputbox" required name="name" autocomplete="off">
                    <textarea placeholder="Enter your address" cols="80" rows="5"  name="address"  class="textarea" required autocomplete="off"></textarea>
                    <input type="email" placeholder="Your e-mail"class="inputbox" required name="email" autocomplete="off"> 
                    <input type="text" placeholder="Your phone number"class="inputbox" required  name="mob" autocomplete="off" >
                    <input type="text" placeholder="Your username" class="inputbox"   name="uname" autocomplete="off">
                    <input type="password" placeholder="Create password" class="inputbox" required  name="pwd" autocomplete="off"> 
                    <input type="password" placeholder="Confirm password" class="inputbox" required  name="cpwd" autocomplete="off" >
                    <div class="docs">
                        <h3>upload your photo</h3>
                        <input type="file" placeholder="Your photo" class="upload-box"  name="uploadimage" onchange="return fileValidation()">
                    </div>
                    <div class="action-btn">
                        <button class="btn primary" name="submit">Create Account</button>
                    </div>
                    <div class="log">
                        <h4>Have an account? </h4>
                        <a href="login.php" class="">Login here</a>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
<?php 
    if(isset($_POST['submit']))
    {
        $cname = $_POST['name'];
        $caddr = $_POST['address'];
        $cemail = $_POST['email'];
        $cmob = $_POST['mob'];
        $cuname = $_POST['uname'];
        $cpasswd = $_POST['pwd'];
        $role = "chef";
        $filename=$_FILES["uploadimage"] ["name"];
        $tempfile=$_FILES["uploadimage"]["tmp_name"];
        $folder="regimg/".$filename;
        //$regimgf=$_POST["uploadfile"];

        $sqla = "SELECT * from tbl_login where username = '$cuname'";
        $result5 = mysqli_query($con,$sqla);
        $num1 = mysqli_num_rows($result5);

        if($num1 == 0)
        {
            $reslt = "INSERT INTO tbl_login(username,password,role) VALUES ('$cuname','$cpasswd','$role')";
            mysqli_query($con,$reslt);

            $query5 = "SELECT * FROM tbl_login WHERE username = '$cuname'";
            $reslt1 = mysqli_query($con,$query5);
            $row = mysqli_fetch_array($reslt1);
            $usr = $row['login_id'];

            // $sqlb = "INSERT INTO tbl_chefs(chef_name,chef_address,chef_email,chef_mobile,chef_image) VALUES ('$cname','$caddr','$cemail','$cmob','$cimg')";
            $sqlc = "INSERT INTO tbl_chefs(chef_name,chef_address,chef_email,chef_mobile,chef_image,login_id) VALUES ('$cname','$caddr','$cemail','$cmob','$filename','$usr')";
            mysqli_query($con,$sqlc);
            move_uploaded_file($tempfile,$folder);
            header('location:login.php');

        }
        else
        {
            echo "<script>alert('Username alresdy exists') </script>";
        }
        ob_end_flush();
    }
?>