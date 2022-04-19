<?php include('partials/menu.php') ?>
<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>
          <br/>
          <br/>
          <br/>
          <?php
          if (isset($_SESSION['add'])) {
             echo $_SESSION['add'];
             unset($_SESSION['add']);
          }
          ?>
        <form action="" method="post">
            <table class="tbl-30">
                <tr>
                    <td>Full Name</td>
                    <td><input type="text" name="full_name"></td>
                </tr>
                <tr>
                <td>Username</td>
                    <td><input type="text" name="username"></td>
                </tr>
                <tr>
                <td>Password</td>
                    <td><input type="password" name="password"></td>
                </tr>
                <tr>
                <td colspan="2">
                    <input type="submit" value="Add Admin" name="submit" class="btn-secondary">
                </td>
                </tr>
            </table>
        </form> 
    </div>
</div>
<?php include('partials/footer.php') ?>

<?php
 if (isset($_POST['submit'])) {
     $full_name=mysqli_real_escape_string($conn,$_POST['full_name']);
     $username=mysqli_real_escape_string($conn,$_POST["username"]);
     $password=md5(mysqli_real_escape_string($conn,$_POST["password"]));
    
 
    $sql="INSERT INTO `tbl_admin` SET full_name='$full_name',username='$username',password='$password'";

     $result=mysqli_query($conn,$sql) or die(mysqli_error());
     if ($result){
        $_SESSION['add']="<div class='success'>Admin Added successfully</div>";
        header("Location:http://localhost/food-order/admin/manage-admin.php");
     }
     else {
        $_SESSION['add']="<div class='warning'>failed to add admin</div>";
        header("Location:http://localhost/food-order/admin/add-admin.php");
     }
 }
?>


