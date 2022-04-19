<?php include('partials-front/menu-front.php'); ?>


    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Foods</h2>
            
               <?php
               $sql="SELECT * FROM `tbl_category` WHERE active='Yes'";
               $result=mysqli_query($conn,$sql);
               
               $count= mysqli_num_rows($result);
               if ($count>0) {
                  while ($row=mysqli_fetch_assoc($result)) {
                      $id=$row['id'];
                      $title=$row['title'];
                      $image_name=$row['image_name'];
                      echo '<a href="category-foods.php?category_id='.$title.'">
                      <div class="box-3 float-container">
                          <img src="http://localhost/food-order/images/category/'.$image_name.'" alt=" '.$title.'" class="img-responsive img-curve">
          
                          <h3 class="float-text text-white">'.$title.'</h3>
                      </div>
                      </a>';
                  }}
                    ?>


            
            
            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->


    <!-- social Section Starts Here -->
    <section class="social">
        <div class="container text-center">
            <ul>
                <li>
                    <a href="#"><img src="https://img.icons8.com/fluent/50/000000/facebook-new.png"/></a>
                </li>
                <li>
                    <a href="#"><img src="https://img.icons8.com/fluent/48/000000/instagram-new.png"/></a>
                </li>
                <li>
                    <a href="#"><img src="https://img.icons8.com/fluent/48/000000/twitter.png"/></a>
                </li>
            </ul>
        </div>
    </section>
    <!-- social Section Ends Here -->

    <?php include('partials-front/footer-front.php'); ?>