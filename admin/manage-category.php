<?php include('partials/menu.php') ?>

<div class="main-content">
    <div class="wrapper">
       <h1>Manage Category</h1>
                 <br/> 
                 <br/>
                 <br/>
                  <a class="btn-primary" href="add-category.php">Add categories</a>
                  <br/>
                  <br/>
                  
                  <?php if (isset($_SESSION['add'])) {
                           echo $_SESSION['add'];
                           unset($_SESSION['add']);
                        }
                        if (isset($_SESSION['update'])) {
                            echo $_SESSION['update'];
                            unset($_SESSION['update']);
                        } 
                        if (isset($_SESSION['delete'])) {
                            echo $_SESSION['delete'];
                            unset($_SESSION['delete']);
                        }
                      if (isset($_SESSION['no-category-found'])) {
                        echo $_SESSION['no-category-found'];
                        unset($_SESSION['no-category-found']);
                      }
                      if (isset($_SESSION['upload'])) {
                        echo $_SESSION['upload'];
                        unset($_SESSION['upload']);
                      }
                      if (isset($_SESSION['failed-remove'])) {
                        echo $_SESSION['failed-remove'];
                        unset($_SESSION['failed-remove']);
                      }
                        ?>
                        <br/>
                 <table class="tbl-full text-center">
                     <tr>
                         <th class="text-center">S.No</th>
                         <th class="text-center">Title</th>
                         <th class="text-center">Image</th>
                         <th class="text-center">Featured</th>
                         <th class="text-center">Active</th>
                         <th class="text-center">Actions</th>
                     </tr>
                          <?php
                            $sql="SELECT * FROM `tbl_category`";
                            $result=mysqli_query($conn,$sql);
                            $count=mysqli_num_rows($result);
                            $sn=1;
                            if ($count>0) {
                               while ($row=mysqli_fetch_assoc($result)) {
                                  $id=$row['id'];
                                  $title=$row['title'];
                                  $image_name=$row['image_name'];
                                  $featured=$row['featured'];
                                  $active=$row['active'];
                                  ?>
                                         <tr>
                                            <td><?php echo $sn++; ?></td>
                                            <td><?php echo $title; ?></td>
                                            <td>
                                                <?php
                                                  if ($image_name!="") {
                                                      ?>
                                                      <img src="http://localhost/food-order/images/category/<?php echo $image_name ?>" alt="image" width=100px>
                                                      <?php
                                                  }
                                                  else {
                                                      echo '<div class="warning">Image not availaible</div>';
                                                  }
                                                ?> 
                                            </td>
                                            <td><?php echo $featured; ?> </td>
                                            <td><?php echo $active; ?> </td>
                                            <td>
                                              <a href="update-category.php?id=<?php echo $id; ?>" class="btn-secondary">Update category</a>
                                              <a href="delete-category.php?id=<?php echo $id; ?>" class="btn-danger">Delete category</a>
                                            </td>
                                         </tr>
                                  <?php
                               }
                            }
                            else {
                                ?>
                                <tr>
                                <td colspan="6">
                                <div class="warning">No category Added</div>
                                </td>
                                </tr>
                                <?php
                            }
                          ?>
                     
                 </table>
    </div> 
</div>





<?php include('partials/footer.php') ?>
