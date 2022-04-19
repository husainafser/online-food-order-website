<?php include('partials-front/menu-front.php'); ?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            <?php 
               $search=mysqli_real_escape_string($conn,$_POST['search']);
            ?>
            <h2>Foods on Your Search <a href="#" class="text-white">"<?php echo $search;?>"</a></h2>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>

            <?php
              
              $sql="SELECT * FROM `tbl_food` WHERE title LIKE '%$search%' OR description LIKE '%$search%'";
              $result=mysqli_query($conn,$sql);
              $count=mysqli_num_rows($result);
              if ($count>0) {
                  while ($row=mysqli_fetch_assoc($result)) {
                      $id=$row['id'];
                      $title=$row['title'];
                      $description=$row['description'];
                      $price=$row['price'];
                      $image_name=$row['image_name'];
                      
                           echo '
                           <form action="/food-order/partials-front/handle_cart.php" method="POST">

                           <div class="food-menu-box">
                                    <div class="food-menu-img">
                                        <img src="http://localhost/food-order/images/food/'.$image_name.'" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                                    </div>

                                    <div class="food-menu-desc">
                                        <h4> '.$title.'</h4>
                                        <p class="food-price">'.$price.'</p>
                                        <p class="food-detail">
                                        '.$description.'
                                        </p>
                                        <br>';

                                        
                                        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                                            echo'
                            <input type="hidden" name="id" value="'.$id.'" >
                            <input type="hidden" name="image" value="'.$image_name.'">
                            <input type="hidden" name="title" value="'.$title.'">
                            <input type="hidden" name="price" value="'.$price.'">
                            <input type="hidden" name="description" value="'.$description.'">
                            ';
                            echo '<div class="delete">
                            <a href="order.php?food_id=' . $id . '" class="btn">Order Now</a>';
                            echo '<button type="submit" name="add_to_cart" class="cart"> <img class="icn" src="https://img.icons8.com/external-icongeek26-glyph-icongeek26/30/000000/external-cart-user-interface-icongeek26-glyph-icongeek26.png"/></button>
                            </div>';

                             } else{
                                     echo '<a href="/food-order/partials-front/handle_nologin.php" class="btn">Order Now</a>';

                                    }
                                    
                                        
                                   echo '</div>
                            </div>
                            </form>';
                      
                  }
              }
              else {
                  echo '<div class="warning">Food not found</div>';
              }
            ?>

            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

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