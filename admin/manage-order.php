<?php include('partials/menu.php') ?>

<div class="main-content">
    <div class="wrapper">
       <h1>Manage orders</h1>
       </br></br>
       <?php
       if (isset($_SESSION['update'])) {
        echo $_SESSION['update'];
        unset($_SESSION['update']);
  }
       ?>
      
                  <br/>
                  <br/>
                  <br/>
                 <table class="tbl-full text-center">
                     <tr>
                         <th class="text-center">S.No</th>
                         <th class="text-center">Food</th>
                         <th class="text-center">Price</th>
                         <th class="text-center">QTY</th>
                         <th class="text-center">Total</th>
                         <th class="text-center">Date</th>
                         <th class="text-center">Status</th>
                         <th class="text-center">customer_name</th>
                         <th class="text-center">customer_contact</th>
                         <th class="text-center">customer_email</th>
                         <th class="text-center">customer_address</th>
                         <th class="text-center">Actions</th>
                     </tr>
                         
                     <?php
                            $sql="SELECT * FROM `tbl_order` ORDER BY id DESC";
                            $result=mysqli_query($conn,$sql);
                            $count=mysqli_num_rows($result);
                            $sn=1;
                            if ($count>0) {
                               while ($row=mysqli_fetch_assoc($result)) {
                                  $id=$row['id'];
                                  $food=$row['food'];
                                  $price=$row['price'];
                                  $qty=$row['qty'];
                                  $total=$row['total'];
                                  $order_date=$row['order_date'];
                                  $status=$row['status'];
                                  $customer_name=$row['customer_name'];
                                  $customer_contact=$row['customer_contact'];
                                  $customer_email=$row['customer_email'];
                                  $customer_address=$row['customer_address'];
                                  ?>
                                         <tr>
                                            <td><?php echo $sn++; ?></td>
                                            <td><?php echo $food; ?></td>
                                            <td><?php echo $price; ?> </td>
                                            <td><?php echo $qty; ?> </td>
                                            <td><?php echo $total; ?> </td>
                                            <td><?php echo $order_date; ?> </td>

                                            <td>
                                                <?php 
                                                  if ($status=="Ordered") {
                                                     echo '<label>$status</label>';
                                                  }
                                                  elseif ($status=="On Delivery") {
                                                      echo "<label style='color:orange'>$status</label>";
                                                  } elseif ($status=="Delivered") {
                                                    echo "<label style='color:blue'>$status</label>";
                                                } elseif ($status=="Cancelled") {
                                                    echo "<label style='color:red'>$status</label>";
                                                }
                                                ?> 
                                            </td>
                                            <td><?php echo $customer_name; ?> </td>
                                            <td><?php echo $customer_contact; ?> </td>
                                            <td><?php echo $customer_email; ?> </td>
                                            <td><?php echo $customer_address; ?> </td>
                                            <td>
                                                <a href="update-order.php?id=<?php echo $id; ?>" class="btn-secondary">Update order</a>
                                            </td>
                                         </tr>
                                  <?php
                               }
                            }
                            else {
                                ?>
                                <tr>
                                <td colspan="12">
                                <div class="warning">Orders Not Availaible</div>
                                </td>
                                </tr>
                                <?php
                            }
                          ?>
                 </table>
    </div> 
</div>





<?php include('partials/footer.php') ?>
