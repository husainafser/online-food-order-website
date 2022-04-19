<?php include('../config/db_connect.php'); ?>
<?php
  session_destroy();
  header("Location:http://localhost/food-order/");
?>