<?php include('../config/db_connect.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>
    <div class="login">
        <h1 class="text-center">login</h1>  <br/> <br/>
    <?php
        if (isset($_SESSION['login'])) {
                        echo $_SESSION['login'];
                        unset($_SESSION['login']);
                  }
        if (isset($_SESSION['no-login-message'])) {
                    echo $_SESSION['no-login-message'];
                    unset($_SESSION['no-login-message']);
              }
    ?>    
    
            </br>

        <form class="text-center" action="" method="post">
    
               <b> Username :</b> <br/> <br/>
                <input type="text" name="username">  <br/> <br/>
                
                <b>Password :</b>  <br/> <br/>
                <input type="password" name="password">  <br/> <br/>
                
                <input type="submit" value="login" name="submit" class="btn-secondary"> <br/> <br/>
                
        </form>
    
        <p class="text-center">Created By - <a href="">Husain afser</a></p>
    </div>
</body>
</html>

<?php
   if (isset($_POST['submit'])) {
       $username=mysqli_real_escape_string($conn,$_POST['username']);
       $password=md5(mysqli_real_escape_string($conn,$_POST['password']));

       $sql="SELECT * FROM `tbl_admin` WHERE username='$username' AND password='$password'";
        $result=mysqli_query($conn,$sql);

        $count=mysqli_num_rows($result);
        if ($count==1) {
           $_SESSION['login']="<div class='success'>Login Successful</div>";
           $_SESSION['user']=$username;
           header("Location:http://localhost/food-order/admin/");
        }
        else {
            $_SESSION['login']="<div class='warning text-center'>Login Failed</div>";
            header("Location:http://localhost/food-order/admin/login.php");
        }
        
   }
?>