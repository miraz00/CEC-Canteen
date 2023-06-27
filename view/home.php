<body class="flex-column " style="height: 600px;">

    <?php include('view/templates/nav_header.php') ?>

    <div class="g-5 bck-header bg-dark ">
        <div class="row align-items-center text-white mt-3 g-3">
        <h1 class="wrapper typing-demo  display-1  text-white fw-bold">CEC CANTEEN</h1>
        </div>
    </div>

<!-- Service Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="service-item rounded pt-3">
                    <div class="p-4">
                        <i class="fa fa-3x fa-user-tie text-primary mb-4"></i>
                        <h5>Master Chefs</h5>
                        <p>"Our Canteen's Master Chef is a culinary expert with exceptional skills and expertise in crafting delicious and diverse dishes for our customers."</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="service-item rounded pt-3">
                    <div class="p-4">
                        <i class="fa fa-3x fa-utensils text-primary mb-4"></i>
                        <h5>Quality Food</h5>
                        <p>"Savor the finest flavors and ingredients, meticulously prepared to bring you a culinary experience of unparalleled quality and taste."</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="service-item rounded pt-3">
                    <div class="p-4">
                        <i class="fa fa-3x fa-cart-plus text-primary mb-4"></i>
                        <h5>Online Order</h5>
                        <p> "Experience the convenience of ordering food online, with a wide selection of delicious dishes delivered straight right to you"
</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                <div class="service-item rounded pt-3">
                    <div class="p-4">
                        <i class="fa fa-3x fa-headset text-primary mb-4"></i>
                        <h5>CEC Tokens</h5>
                        <p>CEC Token is a digital currency that empowers students to conveniently purchase meals and place orders within our campus canteen ecosystem.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--orders section-->

<section id="food">
    <div>
        <h2 class="title-text" style="text-align: center"> Food Fusion</h2>
    </div>
    <div class="food-container">
        <!--======Card Start ----============-->
        <article class="food-card">
            <img src="view/img/breakfast.jpg" class="food-img" alt="">
            <div class="img-text">
                <h1>Breakfast</h1>
            </div>
            <div class="img-footer">
                <div class="footer-btn">
                    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                        <input type="hidden" name="action" value="cat_breakfast">
                        <button type="submit" class="food-btn">Order Now</button>
                    </form>
                </div>
            </div>
        </article>
        <article class="food-card">
            <img src="view/img/kerala_sadya.jpg" class="food-img" alt="">
            <div class="img-text">
                <h1>Rice Dishes</h1>
            </div>
            <div class="img-footer">
                <div class="footer-btn">
                    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                        <input type="hidden" name="action" value="cat_rice_dishes">
                        <button type="submit" class="food-btn">Order Now</button>
                    </form>
                </div>
            </div>
        </article>
        <article class="food-card">
            <img src="view/img/curries.jpg" class="food-img" alt="">
            <div class="img-text">
                <h1>Curries</h1>
            </div>
            <div class="img-footer">
                <div class="footer-btn">
                    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                        <input type="hidden" name="action" value="cat_curries">
                        <button type="submit" class="food-btn">Order Now</button>
                    </form>
                </div>
            </div>
        </article>
        <article class="food-card">
            <img src="view/img/snacks.jpg" class="food-img" alt="">
            <div class="img-text">
                <h1>Snacks</h1>
            </div>
            <div class="img-footer">
                <div class="footer-btn">
                    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                        <input type="hidden" name="action" value="cat_snacks">
                        <button type="submit" class="food-btn">Order Now</button>
                    </form>
                </div>
            </div>
        </article>
        <article class="food-card">
            <img src="view/img/coft.webp" class="food-img" alt="">
            <div class="img-text">
                <h1>Beverages</h1>
            </div>
            <div class="img-footer">
                <div class="footer-btn">
                    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                        <input type="hidden" name="action" value="cat_beverages">
                        <button type="submit" class="food-btn">Order Now</button>
                    </form>
                </div>
            </div>
        </article>
        <article class="food-card">
            <img src="view/img/desserts.jpg" class="food-img" alt="">
            <div class="img-text">
                <h1>Desserts</h1>
            </div>
            <div class="img-footer">
                <div class="footer-btn">
                    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                        <input type="hidden" name="action" value="cat_desserts">
                        <button type="submit" class="food-btn">Order Now</button>
                    </form>
                </div>
            </div>
        </article>
    </div>
</section>

<!--orders section end-->