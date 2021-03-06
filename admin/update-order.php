<?php include('partials/menu.php') ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Order's</h1>
        <br/><br/><br/>

        <?php
        if (isset($_GET['id'])) {
            $id=$_GET['id'];
            $sql="SELECT * FROM `tbl_order` WHERE id=$id";
            $result=mysqli_query($conn,$sql);
            $count=mysqli_num_rows($result);
            if ($count==1) {
                $row=mysqli_fetch_assoc($result);
                
                $food=$row['food'];
                $price=$row['price'];
                $qty=$row['qty'];
                $status=$row['status'];
                $customer_name=$row['customer_name'];
                $customer_contact=$row['customer_contact'];
                $customer_email=$row['customer_email'];
                $customer_address=$row['customer_address'];
           }
           else {
               header('Location:http://localhost/food-order/admin/manage-order.php');
            }
            
        }
        else {
            header('Location:http://localhost/food-order/admin/manage-order.php');
        }
        ?>

        <form action="" method="post">
            <table class="tbl-50">
                <tr>
                    <td>Food Name</td>
                    <td><b><?php echo $food; ?></b></td>
                </tr>
                <tr>
                    <td>Price</td>
                    <td><b><?php echo $price; ?> rs</b></td>
                </tr>
                <tr>
                <td>Quantity</td>
                    <td><b><?php echo $qty; ?></b></td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td>
                        <select name="status" id="status">
                            <option <?php if ($status=="Ordered") {echo 'Selected';} ?> value="Ordered">Ordered</option>
                            <option <?php if ($status=="On Delivery") {echo 'Selected';} ?> value="On Delivery">On Delivery</option>
                            <option <?php if ($status=="Delivered") {echo 'Selected';} ?> value="Delivered">Delivered</option>
                            <option <?php if ($status=="Cancelled") {echo 'Selected';}?> value="Cancelled">Cancelled</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Customer Name:</td>
                   <td><b><?php echo $customer_name; ?></b></td> 
                </tr>
                <tr>
                    <td>Customer Contact:</td>
                   <td><b><?php echo $customer_contact; ?></b></td> 
                </tr>
                <tr>
                    <td>Customer Email:</td>
                   <td><b><?php echo $customer_email; ?></b></td> 
                </tr>
                <tr>
                    <td>Customer Address:</td>
                   <td><b><?php echo $customer_address; ?></b></td> 
                </tr>
                <tr>
                <td colspan="3">
                    <input type="hidden" name="id"value="<?php echo $id; ?>">
                    <input type="hidden" name="price"value="<?php echo $price; ?>">
                    <input type="submit" value="Update order" name="submit" class="btn-secondary">
                </td>
                </tr>
            </table>
        </form> 
        <?php
   if (isset($_POST['submit'])) {
      $id=$_POST['id'];
      $price=$_POST['price'];
      $qty=$_POST['qty'];
      $total=$price * $qty;
      $status=$_POST['status'];
      $customer_name=$_POST['customer_name'];
      $customer_contact=$_POST['customer_contact'];
      $customer_email=$_POST['customer_email'];
      $customer_address=$_POST['customer_address'];

      $sql2="UPDATE `tbl_order` SET status='$status' WHERE id='$id'";
      $result2=mysqli_query($conn,$sql2);
      if ($result2) {
        $_SESSION['update']="<div class='success'>Order Updated Successfully</div>";
        header('Location:http://localhost/food-order/admin/manage-order.php');
      }else {
        $_SESSION['update']="<div class='warning'>Failed to update Order</div>";
        header('Location:http://localhost/food-order/admin/manage-order.php');
      }
   }
?>
    </div>
</div>



<?php include('partials/footer.php') ?>