<?php include('partials/menu.php') ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Change Password</h1>
        <br/>
        <br/>
        <?php
         if (isset($_GET['id'])) {
            $id=$_GET['id'];
         }
        ?>
        <form action="" method="post">
            <table class="tbl-30">
            <tr>
                <td>Current Password</td>
                    <td><input type="password" name="current-password"></td>
                </tr>
                <tr>
                <td>New Password</td>
                    <td><input type="password" name="new-password"></td>
                </tr>
                <tr>
                <td>Confirm Password</td>
                    <td><input type="password" name="confirm-password"></td>
                </tr>
                <tr>
                <td colspan="2">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <input type="submit" value="Add Admin" name="submit" class="btn-secondary">
                </td>
                </tr>
            </table>
        </form> 
    </div>
</div>

<?php
         if (isset($_POST['submit'])) {
                $id=$_POST['id'];
                $current_password=$_POST['current-password'];
                $new_password=$_POST['new-password'];
                $confirm_password=$_POST['confirm-password'];

                $sql="SELECT * FROM `tbl_admin` WHERE id=$id AND password='$current_password'";
                $result=mysqli_query($conn,$sql);
                if ($result) {
                    $count=mysqli_num_rows($result);
                    if ($count==1) {
                       if ($new_password==$confirm_password) {
                          $sql2="UPDATE `tbl_admin` SET password='$new_password' WHERE id=$id";
                           $result2=mysqli_query($conn,$sql2);
                           if ($result2) {
                            $_SESSION['change-pwd']="<div class'success'>passwords changed successfully</div>";
                            header('Location:http://localhost/food-order/admin/manage-admin.php');
                           }
                           else {
                            $_SESSION['change-pwd']="<div class'warning'>failed to change passwords</div>";
                            header('Location:http://localhost/food-order/admin/manage-admin.php');
                           }
                       }
                       else {
                        $_SESSION['pwd-not-match']="<div class'warning'>passwords doesn't match</div>";
                        header('Location:http://localhost/food-order/admin/manage-admin.php');
                       }
                    }
                    else {
                        $_SESSION['user-not-found']="<div class'warning'>user not found</div>";
                        header('Location:http://localhost/food-order/admin/manage-admin.php');
                    }
                }

         }
?>


<?php include('partials/footer.php') ?>