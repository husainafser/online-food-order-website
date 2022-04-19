<?php include('partials/menu.php') ?>
<?php
  $id=$_GET['id'];
  $sql="DELETE FROM `tbl_food` WHERE id=$id";
  $result=mysqli_query($conn,$sql);
  if ($result) {
      $_SESSION['delete']="<div class='success'>Food Item Deleted Successfully</div>";
      header('Location:http://localhost/food-order/admin/manage-food.php');
  }
  else {
    $_SESSION['delete']="<div class='warning'>Failed to delete Food Item</div>";
    header('Location:http://localhost/food-order/admin/manage-food.php');
  }
?>


<?php include('partials/footer.php') ?>