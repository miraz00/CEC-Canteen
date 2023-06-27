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
                        <p>Diam elitr kasd sed at elitr sed ipsum justo dolor sed clita amet diam</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="service-item rounded pt-3">
                    <div class="p-4">
                        <i class="fa fa-3x fa-utensils text-primary mb-4"></i>
                        <h5>Quality Food</h5>
                        <p>Diam elitr kasd sed at elitr sed ipsum justo dolor sed clita amet diam</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="service-item rounded pt-3">
                    <div class="p-4">
                        <i class="fa fa-3x fa-cart-plus text-primary mb-4"></i>
                        <h5>Online Order</h5>
                        <p>Diam elitr kasd sed at elitr sed ipsum justo dolor sed clita amet diam</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                <div class="service-item rounded pt-3">
                    <div class="p-4">
                        <i class="fa fa-3x fa-headset text-primary mb-4"></i>
                        <h5>24/7 Service</h5>
                        <p>Diam elitr kasd sed at elitr sed ipsum justo dolor sed clita amet diam</p>
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
            <img src="https://images.pexels.com/photos/574111/pexels-photo-574111.jpeg?auto=compress&amp;cs=tinysrgb&amp;w=1260&amp;h=750&amp;dpr=2" class="food-img" alt="">
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
            <img src="https://images.pexels.com/photos/14457194/pexels-photo-14457194.jpeg?auto=compress&amp;cs=tinysrgb&amp;w=600" class="food-img" alt="">
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
            <img src="https://images.pexels.com/photos/410648/pexels-photo-410648.jpeg?auto=compress&amp;cs=tinysrgb&amp;w=600" class="food-img" alt="">
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
            <img src="https://images.pexels.com/photos/410648/pexels-photo-410648.jpeg?auto=compress&amp;cs=tinysrgb&amp;w=600" class="food-img" alt="">
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
            <img src="https://images.pexels.com/photos/410648/pexels-photo-410648.jpeg?auto=compress&amp;cs=tinysrgb&amp;w=600" class="food-img" alt="">
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
            <img src="https://images.pexels.com/photos/410648/pexels-photo-410648.jpeg?auto=compress&amp;cs=tinysrgb&amp;w=600" class="food-img" alt="">
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
<section style="padding-bottom: 2rem;">
    <form action="" method="post" style="display: flex;justify-content: center;">
        <textarea name="text" class="feedback-input" placeholder="Give your feedback"></textarea>
        <button type="submit" value="Submit" class="btn btn-primary" style="margin-left: 1rem;">Submit</button>
        <input type="hidden" name="action" value="feedback">
    </form>
</section>
<!--orders section end-->