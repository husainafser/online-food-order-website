<?php
$showError="false";
if($_SERVER["REQUEST_METHOD"]=="POST"){
    include '../config/db_connect.php';
    $email = mysqli_real_escape_string($conn,$_POST["loginEmail"]);
    $pass = mysqli_real_escape_string($conn,$_POST["loginPassword"]);

    $sql = "SELECT * FROM `tbl_user` WHERE user_email='$email'";
    $result = mysqli_query($conn,$sql);
    $numRows = mysqli_num_rows($result);
    if ($numRows==1) {
       $row = mysqli_fetch_assoc($result);
       if(password_verify($pass,$row['password'])){
           session_start();
          $_SESSION['loggedin']=true;
           $_SESSION['useremail']=$email;
           header("Location: /food-order/index.php");
           exit();
       }
       $_SESSION['login']="<script>alert('Wrong Credentials !')</script>";
       header("Location:/food-order/index.php");
    }
    $showError="Wrong Credentials";
    header("Location: /food-order/index.php");
    }
?>

