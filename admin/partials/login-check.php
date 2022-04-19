<?php
if (!isset($_SESSION['user'])) {
     $_SESSION['no-login-message']='<div class="warning">Login to access admin panel</div>';
     header("Location:http://localhost/food-order/admin/login.php");
                               }
?>