<?php
    include 'connect.php';
    session_start();
?>
<html>
    <head>
        <title>update foods</title>
        <script type="text/javascript">

        </script>
        <style>
            .body{
                justify-content: center;
                position: absolute;
            }
            .updt-food{

            }
            .updt-food form{

            }
            .fd-dtls{
                position: absolute;
                align-items: center;
                justify-content: center;
            }
        </style>
    </head>
</html>
<body>
    <div class="updt-food">
        <form action="" method="post" action="#">
            <h3>Welcome</h3>
            <div class="fd-dtls">
                <tr>
                    <label>Name:</label><br>
                    <input type="text" name="name" value="<?php echo $rese['chef_name'];?>" ><br>
                    <label>Price:</label><br>
                    <input type="text" name="addr" value="<?php echo $rese['chef_address'];?>" ><br>
                    <label>Image:</label><br>
                    <input type="text" name="email" value="<?php echo $rese['chef_email'];?>" ><br>
                    <label>Description:</label><br>
                    <input type="text" name="mob" value="<?php echo $rese['chef_mobile'];?>" ><br>
                    <input type="submit" value="update" name="submit">
                    </div>
                </tr>
            </div>
        </form>
    </div>
</body>
</html>
<?php

?>