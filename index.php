<?php include('partials-front/menu-front.php'); ?>

<!-- fOOD sEARCH Section Starts Here -->
<section class="food-search text-center">
    <div class="container">

        <form action="http://localhost/food-order/food-search.php" method="POST">
            <input type="search" name="search" placeholder="Search for Food.." required>
            <input type="submit" name="submit" value="Search" class="btn btn-primary">
        </form>

    </div>
</section>
<!-- fOOD sEARCH Section Ends Here -->
<?php if (isset($_SESSION['order'])) {
    echo $_SESSION['order'];
    unset($_SESSION['order']);
}
?>

<!-- CAtegories Section Starts Here -->
<section class="categories">
    <div class="container">
        <h2 class="text-center">Explore Foods</h2>

        <?php
        $sql = "SELECT * FROM `tbl_category`WHERE active='Yes'AND featured='Yes' LIMIT 3";
        $result = mysqli_query($conn, $sql);

        $count = mysqli_num_rows($result);
        if ($count > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $id = mysqli_real_escape_string($conn,$row['id']);
                $title = mysqli_real_escape_string($conn,$row['title']);
                $image_name = mysqli_real_escape_string($conn,$row['image_name']);
        ?>
                <a href="category-foods.php?category_id=<?php echo $title; ?>">
                    <div class="box-3 float-container">
                        <img src="http://localhost/food-order/images/category/<?php echo $image_name; ?>" alt="<?php echo $title; ?>" class="img-responsive img-curve">

                        <h3 class="float-text text-white"><?php echo $title; ?></h3>
                    </div>
                </a>
        <?php
            }
        } else {
            echo '<div class="warning">category not added</div>';
        }
        ?>





        <div class="clearfix"></div>
    </div>
    <p class="text-center">
        <a href="categories.php">See All Categories</a>
    </p>
</section>
<!-- Categories Section Ends Here -->

<!-- fOOD MEnu Section Starts Here -->
<section class="food-menu">
    <div class="container">
        <h2 class="text-center">Food Menu</h2>

        <?php
        $sql = "SELECT * FROM `tbl_food`WHERE active='Yes'AND featured='Yes' LIMIT 6 ";
        $result = mysqli_query($conn, $sql);

        $count = mysqli_num_rows($result);
        if ($count > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $id = mysqli_real_escape_string($conn,$row['id']);
                $title = mysqli_real_escape_string($conn,$row['title']);
                $description = mysqli_real_escape_string($conn,$row['description']);
                $price = mysqli_real_escape_string($conn,$row['price']);
                $image_name = mysqli_real_escape_string($conn,$row['image_name']);
        ?>
            <form action="/food-order/partials-front/handle_cart.php" method="POST">
                <div class="food-menu-box">
                    <div class="food-menu-img">
                        <img src="http://localhost/food-order/images/food/<?php echo $image_name; ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                    </div>

                    <div class="food-menu-desc">
                        <h4><?php echo $title; ?></h4>
                        <p class="food-price"><?php echo $price; ?> rs</p>
                        <p class="food-detail">
                            <?php echo $description; ?>
                            <!-- Made with Italian Sauce, Chicken, and organice vegetables. -->
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
                        } else{
                            echo '<a href="/food-order/partials-front/handle_nologin.php" class="btn">Order Now</a>';
                        }
                        ?>
                    </div>
                </div>
                </form>
        <?php
            }
        } else {
            echo '<div class="warning">category not added</div>';
        }
    
        ?>

        <div class="clearfix"></div>
        
        <p class="text-center">
        <a href="foods.php">See All Foods</a>
        </p>

    </div>

</section>
<!-- fOOD Menu Section Ends Here -->

<!-- Review section starts here -->

<section class="food-menu">
    <div class="container">
        <h2 class="text-center">Customer Reviews</h2>

                <div class="food-menu-box">
                    <div class="food-menu-img">
                        <img src="http://localhost/food-order/r1.jpg" alt="Customer" class="img-responsive img-curve">
                    </div>

                    <div class="food-menu-desc">
                        <h4>Michael Warne</h4>

                        <div class="rating">
                        <p class="food-price"><img src="https://img.icons8.com/emoji/40/000000/star-emoji.png"/></p>
                        <p class="food-price"><img src="https://img.icons8.com/emoji/40/000000/star-emoji.png"/></p>
                        <p class="food-price"><img src="https://img.icons8.com/emoji/40/000000/star-emoji.png"/></p>
                        <p class="food-price"><img src="https://img.icons8.com/emoji/40/000000/star-emoji.png"/></p>
                        </div>
                        <p class="food-detail">
                        This cozy restaurant has left the best impressions! Hospitable hosts, delicious dishes, beautiful presentation, wide wine list and wonderful dessert. I recommend to everyone! I would like to come back here again and again.
                        </p>
                        <br>
                    </div>
                </div>

                <div class="food-menu-box">
                    <div class="food-menu-img">
                        <img src="http://localhost/food-order/r2.jpg" alt="customer" class="img-responsive img-curve">
                    </div>

                    <div class="food-menu-desc">
                        <h4>Steve Decker</h4>

                        <div class="rating">
                        <p class="food-price"><img src="https://img.icons8.com/emoji/40/000000/star-emoji.png"/></p>
                        <p class="food-price"><img src="https://img.icons8.com/emoji/40/000000/star-emoji.png"/></p>
                        <p class="food-price"><img src="https://img.icons8.com/emoji/40/000000/star-emoji.png"/></p>
                        <p class="food-price"><img src="https://img.icons8.com/fluency/40/000000/star-half.png"/></p>
                        </div>
                        <p class="food-detail">
                        Excellent food. Menu is extensive and seasonal to a particularly high standard. Definitely fine dining. It can be expensive but worth it and they do different deals on different nights so it’s worth checking them out before you book. Highly recommended.
                        </p>
                        <br>
                    </div>
                </div>

                <div class="food-menu-box">
                    <div class="food-menu-img">
                        <img src="http://localhost/food-order/r3.jpg" alt="customer" class="img-responsive img-curve">
                    </div>

                    <div class="food-menu-desc">
                        <h4>John Richards</h4>

                        <div class="rating">
                        <p class="food-price"><img src="https://img.icons8.com/emoji/40/000000/star-emoji.png"/></p>
                        <p class="food-price"><img src="https://img.icons8.com/emoji/40/000000/star-emoji.png"/></p>
                        <p class="food-price"><img src="https://img.icons8.com/emoji/40/000000/star-emoji.png"/></p>
                        <p class="food-price"><img src="https://img.icons8.com/emoji/40/000000/star-emoji.png"/></p>
                        <p class="food-price"><img src="https://img.icons8.com/fluency/40/000000/star-half.png"/></p>

                        </div>
                        <p class="food-detail">
                        This place is great! Atmosphere is chill and cool but the staff is also really friendly. They know what they’re doing and what they’re talking about, and you can tell making the customers happy is their main priority. Food is pretty good, some italian classics and some twists, and for their prices it’s 100% worth it.
                        </p>
                        <br>
                    </div>
                </div>

                <div class="food-menu-box">
                    <div class="food-menu-img">
                        <img src="http://localhost/food-order/r4.jpg" alt="customer" class="img-responsive img-curve">
                    </div>

                    <div class="food-menu-desc">
                        <h4>Trixie</h4>

                        <div class="rating">
                        <p class="food-price"><img src="https://img.icons8.com/emoji/40/000000/star-emoji.png"/></p>
                        <p class="food-price"><img src="https://img.icons8.com/emoji/40/000000/star-emoji.png"/></p>
                        <p class="food-price"><img src="https://img.icons8.com/emoji/40/000000/star-emoji.png"/></p>
                        <p class="food-price"><img src="https://img.icons8.com/emoji/40/000000/star-emoji.png"/></p>
                        </div>
                        <p class="food-detail">
                        It’s a great experience. The ambiance is very welcoming and charming. Amazing wines, food and service. Staff are extremely knowledgeable and make great recommendations.
                        </p>
                        <br>
                    </div>
                </div>

        <div class="clearfix"></div>

    </div>

    
</section>

<!-- Review section ens here -->

<!-- social Section Starts Here -->
<section class="social">
    <div class="container text-center">
        <ul>
            <li>
                <a href="#"><img class="icn" src="icons8-codepen-48.png" /></a>
            </li>
            <li>
                <a href="#"><img class="icn" src="https://img.icons8.com/fluent/48/000000/instagram-new.png" /></a>
            </li>
            <li>
                <a href="#"><img class="icn" src="https://img.icons8.com/fluent/48/000000/twitter.png" /></a>
            </li>
        </ul>
    </div>
</section>
<!-- social Section Ends Here -->
<?php include('partials-front/footer-front.php'); ?>