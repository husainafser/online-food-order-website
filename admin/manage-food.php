
<?php include('partials/menu.php') ?>
  
  <!-- Main section starts -->
  <div class="main-content">
      <div class="wrapper">
         
         <h1>Manage Food</h1>
         <br/> 
         <br/>
         <br/>
         <?php if (isset($_SESSION['add'])) {
                   echo $_SESSION['add'];
                   unset($_SESSION['add']);
                } 
                
                if (isset($_SESSION['delete'])) {
                      echo $_SESSION['delete'];
                      unset($_SESSION['delete']);
                }
                if (isset($_SESSION['update'])) {
                    echo $_SESSION['update'];
                    unset($_SESSION['update']);
              }
         ?>
         <br/><br/>
          <a class="btn-primary" href="add-food.php">Add Food</a>
          <br/>
          <br/>
          <br/>
         <table class="tbl-full text-center">
             <tr>
                 <th class="text-center">S.No</th>
                 <th class="text-center">Title</th>
                 <th class="text-center">Description</th>
                 <th class="text-center">Price</th>
                 <th class="text-center">Image</th>
                 <th class="text-center">Category</th>
                 <th class="text-center">Featured</th>
                 <th class="text-center">Active</th>
                 <th class="text-center">Actions</th>
             </tr>

             <?php
               $sql="SELECT * FROM `tbl_food`";
               $result=mysqli_query($conn,$sql);

               if ($result) {
                   $count=mysqli_num_rows($result);
                   $sno=1; //displaying S.NO in chronological order
                   if ($count>0) {
                      while ($rows=mysqli_fetch_assoc($result)) {
                              $id=$rows['id'];
                              $title=$rows['title'];
                              $description=$rows['description'];
                              $price=$rows['price'];
                              $image_name=$rows['image_name'];
                              $category_id=$rows['category_id'];
                              $featured=$rows['featured'];
                              $active=$rows['active'];
             ?>

               <tr>
                   <td><?php echo $sno++; ?></td>
                   <td><?php echo $title; ?></td>
                   <td><?php echo $description; ?></td>
                   <td><?php echo $price; ?>Rs</td>
                   <td>
                   <?php
                                                  if ($image_name!="") {
                                                      ?>
                                                      <img src="http://localhost/food-order/images/food/<?php echo $image_name; ?>" alt="image" width=100px>
                                                      <?php
                                                  }
                                                  else {
                                                      echo '<div class="warning">Image not availaible</div>';
                                                  }
                                                ?> 
                   </td>                             
                   <td><?php echo $category_id; ?></td>
                   <td><?php echo $featured; ?></td>
                   <td><?php echo $active; ?></td>
                   <td>
                       <a href="update-food.php?id=<?php echo $id; ?>" class="btn-secondary">Update Food</a>
                       <a href="delete-food.php?id=<?php echo $id; ?>" class="btn-danger">Delete Food</a>
                   </td>
               </tr>

             <?php
                      }
                   }
                   else {
                       
                   }
               }
               else {
                ?>
                <tr>
                <td colspan="6">
                <div class="warning">No Food Added</div>
                </td>
                </tr>
                <?php
               }
             ?>
     </table>
      </div>
  </div>
  <!-- Main section ends -->

  <?php include('partials/footer.php') ?>  