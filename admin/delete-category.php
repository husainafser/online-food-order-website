<?php include('partials/menu.php') ?>
<?php
  $id=$_GET['id'];
  $sql="DELETE FROM `tbl_category` WHERE id=$id";
  $result=mysqli_query($conn,$sql);
  if ($result) {
      $_SESSION['delete']="<div class='success'>Category Deleted Successfully</div>";
      header('Location:http://localhost/food-order/admin/manage-category.php');
  }
  else {
    $_SESSION['delete']="<div class='warning'>Failed to delete Category</div>";
    header('Location:http://localhost/food-order/admin/manage-category.php');
  }
?>


<?php include('partials/footer.php') ?>