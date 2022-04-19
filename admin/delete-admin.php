<?php include('partials/menu.php') ?>
<?php
  $id=$_GET['id'];
  $sql="DELETE FROM `tbl_admin` WHERE id=$id";
  $result=mysqli_query($conn,$sql);
  if ($result) {
      $_SESSION['delete']="<script>alert('Admin is deleted successfully !')</script>";
      header('Location:http://localhost/food-order/admin/manage-admin.php');
  }
  else {
    $_SESSION['delete']="<div class='warning'>Failed to delete admin</div>";
    header('Location:http://localhost/food-order/admin/manage-admin.php');
  }
?>


<?php include('partials/footer.php') ?>