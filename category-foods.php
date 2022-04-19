<?php include('partials-front/menu-front.php'); ?>
<?php
if (isset($_GET['category_id'])) {
    $category_id = $_GET['category_id'];
    $sql = "SELECT title FROM `tbl_category` WHERE title='$category_id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $category_title = $row['title'];
} else {
    echo '<div class="warning">category not passes</div>';
    header("Location:http://localhost/food-order/index.php");
}
?>
<!-- fOOD sEARCH Section Starts Here -->
<section class="food-search text-center">
    <div class="container">

        <h2>Foods on <a href="food-search.php" class="text-white">"<?php echo $category_title; ?>"</a></h2>

    </div>
</section>
<!-- fOOD sEARCH Section Ends Here -->



<!-- fOOD MEnu Section Starts Here -->
<section class="food-menu">
    <div class="container">
        <h2 class="text-center">Food Menu</h2>

        <?php
        $sql2 = "SELECT * FROM `tbl_food` WHERE Category_id='$category_id'";
        $result2 = mysqli_query($conn, $sql2);
        $count2 = mysqli_num_rows($result2);
        if ($count2 > 0) {
            while ($row2 = mysqli_fetch_assoc($result2)) {
                $id = $row2['id'];
                $title = $row2['title'];
                $price = $row2['price'];
                $description = $row2['description'];
                $image_name = $row2['image_name'];
        ?>
                    <form action="/food-order/partials-front/handle_cart.php" method="POST">

                <div class="food-menu-box">
                    <div class="food-menu-img">
                        <img src="http://localhost/food-order/images/food/<?php echo $image_name; ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                    </div>

                    <div class="food-menu-desc">
                        <h4><?php echo $title; ?></h4>
                        <p class="food-price"><?php echo $price; ?>rs</p>
                        <p class="food-detail">
                            <?php echo $description; ?>
                        </p>
                        <br>

                        <?php
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
                        } else {
                                echo '<a href="/food-order/partials-front/handle_nologin.php" class="btn">Order Now</a>';
                  
                        }
                        ?>
                    </div>
                </div>
                    </form>
        <?php
            }
        } else {
            echo '<div class="warning">Food not available</div>';
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
                <a href="#"><img src="https://img.icons8.com/fluent/50/000000/facebook-new.png" /></a>
            </li>
            <li>
                <a href="#"><img src="https://img.icons8.com/fluent/48/000000/instagram-new.png" /></a>
            </li>
            <li>
                <a href="#"><img src="https://img.icons8.com/fluent/48/000000/twitter.png" /></a>
            </li>
        </ul>
    </div>
</section>
<!-- social Section Ends Here -->

<?php include('partials-front/footer-front.php'); ?>