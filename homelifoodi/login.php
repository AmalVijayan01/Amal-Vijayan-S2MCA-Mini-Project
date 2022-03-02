<?php
include 'connect.php';
include 'header.php';
session_start();
$_SESSION['login_id'] = $_SESSION['login_id'];
// $urn = $_SESSION['login_id'];
if ($_SESSION['login_id'] == " ") {
    header("Location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@100&family=Poppins:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/formstyle.css">

    <script>
        window.location.hash = "no-back-button";

window.location.hash = "Again-No-back-button"; 

window.onhashchange = function(){
    window.location.hash = "no-back-button";
}
    </script>
</head>
<?php
if (isset($_POST["submit"])) {
    $uname = $_POST["username"];
    $pass = $_POST["password"];
    // $pass1 = md5($pass);
    // echo$pass1;

    $sql = "select * from tbl_login where username='$uname' and password='$pass' and status in('1','0') and role in('chef','customer');";
    $result = mysqli_query($con, $sql);
    $count = mysqli_num_rows($result);

    while ($row = mysqli_fetch_array($result)) {
        $urn = $row['login_id'];
        $role = $row['role'];
    }
    if ($count > 0 && $role == "customer") {
        $_SESSION['login_id'] = $urn;
        header("location:userhome.php");
    } else if ($count > 0 && $role == "chef") {
        $_SESSION['login_id'] = $urn;
        header("location:chefs/chefhome.php");
    } else {
?>
        <script>
            alert("invalid username or password");
        </script>
<?php
    }
    mysqli_close($con);
}
?>

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
                    <form method="POST" action="#" class="form">
                        <h3>Login</h3>
                        <div class="inputs">
                            <div class="input-field">
                                <input type="text" class="input" placeholder="Username" name="username" required autocomplete="off">
                            </div>
                            <div class="input-field">
                                <input type="password" class="input pass" placeholder="Password" name="password" required autocomplete="off">
                            </div>
                            <!-- <div class="input-field">
                                <select name="Role" id="role" class="input">
                                    <option value="customer"> Customer</option>
                                    <option value="homechef"> Home Chef</option>
                                </select>
                            </div> -->
                            <input type="submit" name="submit" value="Login" class="btn-create">
                        </div>
                        <div class="login">Don't have an account?
                            <a href="signup.php">Register</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</body>

</html>