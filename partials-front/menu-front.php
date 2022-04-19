<?php include('config/db_connect.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Website</title>

    <!-- Link our CSS file -->
    <link rel="stylesheet" href="css/style.css">

    <!-- Link our Font file -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous" />

    <!-- Link our Bootstrap file -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->

</head>

<body>
    <!-- Alerts Section Starts Here -->
    <?php
    if (isset($_SESSION['signup'])) {
        echo $_SESSION['signup'];
        unset($_SESSION['signup']);
    }
    if (isset($_SESSION['nologin'])) {
        echo $_SESSION['nologin'];
        unset($_SESSION['nologin']);
    }
    if (isset($_SESSION['login'])) {
        echo $_SESSION['login'];
        unset($_SESSION['login']);
    }
    if (isset($_SESSION['add'])) {
        echo $_SESSION['add'];
        unset($_SESSION['add']);
    }
    ?>

    <!-- Navbar Section Starts Here -->
    <section class="navbar">
        <div class="container">
            <div class="logo">
                <a href="#" title="Logo">
                    <img src="images/logo.png" alt="Restaurant Logo" class="img-responsive">
                </a>
            </div>

            <div class="menu text-right nav-links">
                <ul>
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li>
                        <a href="categories.php">Categories</a>
                    </li>
                    <li>
                        <a href="foods.php">Foods</a>
                    </li>
                    <li>
                        <a href="contact.php">Contact</a>
                    </li>
                    <?php
                    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                        echo '
                          <li>
                          <a href="/food-order/cart.php"><img class="icn" src="https://img.icons8.com/external-icongeek26-glyph-icongeek26/30/000000/external-cart-user-interface-icongeek26-glyph-icongeek26.png"/>
                          </a>
                          </li>
                          <li>
                          <a href="/food-order/profile.php"><img class="icn" src="https://img.icons8.com/ios-glyphs/30/000000/user-male-circle.png"/></a>                         
                          </li>
                          <li>
                          <a href="/food-order/partials-front/logOut.php"><button class="modal-btn3">logout</button></a>
                      </li>
                          ';
                    } else {
                        echo ' <li>
                          <button class="modal-btn">login</button>
                      </li>
                      <li>
                          <button class="modal-btn2">signup</button>
                      </li>
                          ';
                    }
                    ?>

                </ul>
                <img class="menu-btn" src="kisspng-computer-icons-hamburger-button-menu-new-menu-5b34724be5a1f0.5796308115301637879406.jpg" alt="menu" />
            </div>
            <div class="clearfix"></div>
        </div>

    </section>

    <div class="modal-overlay">
        <div class="modal-container">
            <form action="/food-order/partials-front/handle_login.php" method="post">
                <div class="order-label">User_Email</div>
                <input type="email" name="loginEmail" class="input-responsive" required>

                <div class="order-label">Password</div>
                <input type="password" name="loginPassword" class="input-responsive" required>

                <button class="modal-btn" type="submit">Login</button>
            </form>
            <button class="close-btn"><img src="https://img.icons8.com/windows/32/000000/delete-sign.png" /></a></button>
        </div>
    </div>

    <div class="modal-overlay2">
        <div class="modal-container">
            <form action="/food-order/partials-front/handle_signup.php" method="post">
                <div class="order-label">Username</div>
                <input type="text" name="username" placeholder="E.g. Husain Afser" class="input-responsive" required>

                <div class="order-label">Email</div>
                <input type="email" name="signupEmail" class="input-responsive" required>

                <div class="order-label">Password</div>
                <input type="password" name="signupPassword" class="input-responsive" required>

                <div class="order-label">Confirm Password</div>
                <input type="password" name="cPassword" class="input-responsive" required>

                <button class="modal-btn" type="submit">Signup</button>
            </form>
            <button class="close-btn2"><img src="https://img.icons8.com/windows/32/000000/delete-sign.png" /></a></button>
        </div>
    </div>
    <!-- Navbar Section Ends Here -->