<?php
include 'partials-front/menu-front.php';
?>
<!-- Banner Starts Here -->
<section class="food-search text-center">
    <div class="container">

        <h3 class="icn2">We’ve got something for everyone.</h3>

    </div>
</section>
<!-- Banner Ends Here -->
<section class="contact">
    <div class="heading">
        <h2 class="text-center">Contact Us</h2>
        <p class="text-center">We are here to help and answer any question you might have. We look forward to hearing from you .</p>
    </div>
    <div class="con_container">
        <div class="container1">
            <div class="box1">
                <div><img class="icn" src="https://img.icons8.com/ios/35/000000/address--v1.png" /></div>
                <div>
                    <h4>Address</h4>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem, perferendis?</p>
                </div>

            </div>
            <div class="box2">
                <div>
                    <img class="icn" src="https://img.icons8.com/ios/40/000000/apple-phone.png" />
                </div>
                <div class="div1">
                    <h4>Phone</h4>
                    <p>+91-6375361494</p>
                </div>
            </div>
            <div class="box3">
                <div><img class="icn" src="https://img.icons8.com/external-kiranshastry-lineal-kiranshastry/40/000000/external-email-interface-kiranshastry-lineal-kiranshastry-1.png" /></div>
                <div class="div2">
                    <h4>Email</h4>
                    <p>husainasfer1@gmail.com</p>
                </div>
            </div>
        </div>

        <div class="container2">

            <h3>Send Message</h3>
            <form action="" method="post">
                <div class="order-label">Name</div>
                <input type="text" name="Name" placeholder="E.g. Husain Afser" class="input-responsive" required>

                <div class="order-label">Email</div>
                <input type="email" name="email" class="input-responsive" required>

                <div class="order-label">Message</div>
                <textarea name="message" id="message" cols="60" rows="5" required></textarea>

                <button class="btn" type="submit">Send</button>
            </form>
        </div>
    </div>
</section>

<!--Contact Details -->

<?php include('partials-front/footer-front.php'); ?>