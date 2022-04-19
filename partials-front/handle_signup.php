<?php include '../config/db_connect.php'; ?>
<?php
 $showError="false";
if ($_SERVER["REQUEST_METHOD"]=="POST") {
    include '../config/db_connect.php';
   $username = mysqli_real_escape_string($conn,$_POST["username"]);
   $user_email = mysqli_real_escape_string($conn,$_POST["signupEmail"]);
   $password = mysqli_real_escape_string($conn,$_POST["signupPassword"]);
   $cpassword = mysqli_real_escape_string($conn,$_POST["cPassword"]);

   $sqlexist = "SELECT * FROM `tbl_user` WHERE user_email='$user_email'";
   $result = mysqli_query($conn,$sqlexist);
   $numRows=mysqli_num_rows($result);
   if ($numRows>0) {
    $_SESSION['signup']="<script>alert('Oops! User Already Exists')</script>";
    header("Location:/food-order/index.php");
    exit();
   }
   else{
   if($password == $cpassword){
        $hash = password_hash($password,PASSWORD_DEFAULT);
        $sql = "INSERT INTO `tbl_user` (`user_name`,`user_email`,`password`,`time`) VALUES ('$username','$user_email','$hash',current_timestamp())";
        $result = mysqli_query($conn, $sql);
       if ($result) {
        $_SESSION['signup']="<script>alert('Your account has been created successfully !')</script>";
          header("Location:/food-order/index.php");
          exit();
       }
   }
   else {
    $_SESSION['signup']="<script>alert('Oops! Password doesn't matched')</script>";
    header("Location:/food-order/index.php");
}
}
$_SESSION['signup']="<script>alert('Oops! Something went wrong , Please try again')</script>";
header("Location:/food-order/index.php");
}

?>