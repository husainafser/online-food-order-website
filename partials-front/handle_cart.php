<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   if (isset($_POST['add_to_cart'])) {  //button
      if (isset($_SESSION['cart'])) {   //$_SESSION['cart'] is global variable which can be used in any page by using session_start();

         //checking duplicate entries
         $myitems = array_column($_SESSION['cart'], 'title');
         if (in_array($_POST['title'], $myitems)) {
            echo '<script>alert("Item Already Added");
                        window.location.href="/food-order/";
                  </script>';
         } else {

            $count = count($_SESSION['cart']); //count() function is for counting the index's

            //rearrange the array to start from index value 1
            $_SESSION['cart'][$count] = array('image_name' => $_POST['image'], 'title' => $_POST['title'], 'price' => $_POST['price'], 'description' => $_POST['description'], 'id' => $_POST['id']);
            echo '<script>alert("Item Added to cart");
         window.location.href="/food-order/";
         </script>';
         }
      } else {
         // initially there would be no $_SESSION['cart'] , so we have to set it first
         $_SESSION['cart'][0] = array('image_name' => $_POST['image'], 'title' => $_POST['title'], 'price' => $_POST['price'], 'description' => $_POST['description'], 'id' => $_POST['id']);
         echo '<script>alert("Item Added to cart");
                window.location.href="/food-order/";
                </script>';
      }
   }
   if (isset($_POST['delete'])) {
      foreach ($_SESSION['cart'] as $key => $value) {
         if ($value['title'] === $_POST['item']) {
            unset($_SESSION['cart'][$key]);
            $_SESSION['cart'] = array_values($_SESSION['cart']);
            echo '<script>alert("Item deleted from cart");
                window.location.href="/food-order/cart.php";
                </script>';
         }
      }
   }
}
