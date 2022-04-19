<?php include('partials-front/menu-front.php'); ?>
<section class="food-menu">
    <div class="container">
        <h2 class="text-center">Cart</h2>

<?php
// session_start();

if (isset($_SESSION['cart'])) {
   

foreach($_SESSION['cart'] as $key => $value){
    
    echo'
   
                <div class="food-menu-box">
                    <div class="food-menu-img">
                        <img src="http://localhost/food-order/images/food/'.$value['image_name'].'" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                    </div>

                    <div class="food-menu-desc">
                        <h4>'.$value['title'].'</h4>
                        <p class="food-price">'.$value['price'].' rs</p>
                        <p class="food-detail">
                        '.$value['description'].'
                            
                        </p>
                        <br>
                    <div class="delete">
                    <a href="order.php?food_id=' .$value['id']. '" class="btn">Order Now</a>
                    <form action="/food-order/partials-front/handle_cart.php" method="POST">
                    <button name="delete" class"delete"> <img src="https://img.icons8.com/material-rounded/30/000000/filled-trash.png"/> </button>
                    <input type="hidden" name = "item" value="'.$value['title'].'">
                    </form>
                    </div>
                    </div>
                </div>
        <?php
            }
        }
        ?>

   
    ';

}
}
else {
    echo '<script>alert("Cart is Empty !");
                window.location.href="/food-order/index.php";
                </script>';
}
?>
 </div>
</section>
<?php include('partials-front/footer-front.php'); ?>