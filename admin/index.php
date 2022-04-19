<?php include('partials/menu.php') ?>

          <!-- Main section starts -->
          <div class="main-content">
              <div class="wrapper">
                 <h1>DASHBOARD</h1> 
                 </br>
                 </br>
                 <?php
                      if (isset($_SESSION['login'])) {
                        echo $_SESSION['login'];
                        unset($_SESSION['login']);
                                                   }
                 ?>
                 </br>   
                 <div class="col-4 text-center">
                     <?php
                     $sql="SELECT * FROM `tbl_category`";
                     $result=mysqli_query($conn,$sql);
                     $count=mysqli_num_rows($result);
                     ?>
                     <h1><?php echo $count ?></h1>
                     <br/>
                     categories
                 </div>
                 <div class="col-4 text-center">
                 <?php
                     $sql="SELECT * FROM `tbl_food`";
                     $result=mysqli_query($conn,$sql);
                     $count=mysqli_num_rows($result);
                     ?>
                     <h1><?php echo $count ?></h1>
                     <br/>
                     Foods
                    </div>
                 <div class="col-4 text-center"
                 <?php
                     $sql="SELECT * FROM `tbl_order`";
                     $result=mysqli_query($conn,$sql);
                     $count=mysqli_num_rows($result);
                     ?>
                 ><h1><?php echo $count ?></h1>
                     <br/>
                     Orders
                    </div>
                 <div class="col-4 text-center">
                 <?php
                     $sql="SELECT SUM(total) AS Total FROM `tbl_order` WHERE status='Delivered'";
                     $result=mysqli_query($conn,$sql);
                     $row=mysqli_fetch_assoc($result);
                     $total_revenue=$row['Total'];

                     ?>
                     <h1><?php echo $total_revenue ?> rs</h1>
                     <br/>
                     Revenue
                    </div> 
                    <div class="clearfix"></div>
              </div>
          </div>
          <!-- Main section ends -->

          <?php include('partials/footer.php') ?>  