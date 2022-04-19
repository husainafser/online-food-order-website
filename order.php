<?php include('partials-front/menu-front.php'); ?>
  <?php
   if (isset($_GET['food_id'])) {
      $food_id=$_GET['food_id'];
      $sql="SELECT * FROM tbl_food WHERE id=$food_id";
      $result=mysqli_query($conn,$sql);
      $count=mysqli_num_rows($result);
      if ($count==1) {
         $row=mysqli_fetch_assoc($result);
         $title=$row['title'];
         $price=$row['price'];
         $image_name=$row['image_name'];
         ?>
 
         
     <?php
      }
      else {
        header('Location:http://localhost/food-order/');
      }
   }
   else {
    header('Location:http://localhost/food-order/');
   }
   ?>
     <!-- fOOD sEARCH Section Starts Here -->
   <section class="food-search">
   <div class="container">
       
       <h2 class="text-center text-white">Fill this form to confirm your order.</h2>

       <form action="payment.php" method="POST" class="order">
           <fieldset>
               <legend>Selected Food</legend>

               <div class="food-menu-img">
                   <img src="http://localhost/food-order/images/food/<?php echo $image_name; ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
               </div>

               <div class="food-menu-desc">
                   <h3><?php echo $title; ?></h3>
                   <input type="hidden" name="food" value="<?php echo $title; ?>">
                   <p class="food-price"><?php echo $price; ?>rs</p>
                   <input type="hidden" name="price" value="<?php echo $price; ?>">

                   <div class="order-label">Quantity</div>
                   <input type="number" name="qty" class="input-responsive" value="1" required>
                   
               </div>

           </fieldset>

           <fieldset>
               <legend>Delivery Details</legend>
               <div class="order-label">Full Name</div>
               <input type="text" name="full-name" placeholder="E.g. Husain Afser" class="input-responsive" required>

               <div class="order-label">Phone Number</div>
               <input type="tel" name="contact" placeholder="E.g. 9843xxxxxx" class="input-responsive" required>

               <div class="order-label">Email</div>
               <input type="email" name="email" placeholder="E.g. husainafser1@gmail.com" class="input-responsive" required>

               <div class="order-label">Address</div>
               <textarea name="address" rows="10" placeholder="E.g. Street, City, Country" class="input-responsive" required></textarea>

               <input type="hidden" name="id" value="<?php echo $food_id; ?>" >


               <input type="submit" name="submit" value="Confirm Order" class="btn">
               
           </fieldset>
       </form>
       
         </div>
     </section>
    

  
   
    <!-- fOOD sEARCH Section Ends Here -->

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