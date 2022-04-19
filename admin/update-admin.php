<?php include('partials/menu.php') ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Admin</h1>
        <br/><br/><br/>

        <?php
         $id=$_GET['id'];
         $sql="SELECT * FROM `tbl_admin` WHERE id=$id";
         $result=mysqli_query($conn,$sql);

         if ($result) {
            $count=mysqli_num_rows($result);
            if ($count==1) {
                 $row=mysqli_fetch_assoc($result);
                 
                 $full_name=$row['full_name'];
                 $username=$row['username'];
            }
            else {
                header('Location:http://localhost/food-order/admin/manage-admin.php');
            }
         }
        ?>
        <form action="" method="post">
            <table class="tbl-30">
                <tr>
                    <td>Full Name</td>
                    <td><input type="text" name="full_name" value="<?php echo $full_name; ?>"></td>
                </tr>
                <tr>
                <td>Username</td>
                    <td><input type="text" name="username" value="<?php echo $username; ?>"></td>
                </tr>
                <tr>
                <td colspan="2">
                    <input type="hidden" name="id"value="<?php echo $id; ?>">
                    <input type="submit" value="Update Admin" name="submit" class="btn-secondary">
                </td>
                </tr>
            </table>
        </form> 
    </div>
</div>

<?php
   if (isset($_POST['submit'])) {
      $id=$_POST['id'];
      $full_name=$_POST['full_name'];
      $username=$_POST['username'];

      $sql="UPDATE `tbl_admin` SET full_name='$full_name',username='$username' WHERE id='$id'";
      $result=mysqli_query($conn,$sql);
      if ($result) {
        $_SESSION['update']="<div class='success'>Admin Updated Successfully</div>";
        header('Location:http://localhost/food-order/admin/manage-admin.php');
      }else {
        $_SESSION['update']="<div class='success'>Failed to update admin</div>";
        header('Location:http://localhost/food-order/admin/manage-admin.php');
      }
   }
?>

<?php include('partials/footer.php') ?>