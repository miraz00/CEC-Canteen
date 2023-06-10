<?php
global $breakfast_items;
global $rice_dishes_items;
global $curries_items;
global $snacks_items;
global $beverages_items;
global $desserts_items;
?>
<body>

<header>
    <nav class="navbar navbar-inverse bg-inverse fixed-top bg-faded">
        <div class="container-fluid">
            <div class="row w-100 d-flex align-items-center">
                <div class="col d-flex justify-content-start">
                    <a href="<?= $_SERVER['PHP_SELF'] ?>"><i class="fa-solid fa-house" style="font-size: xx-large;color: #FEA116"></i></a>
                </div>
                <div class="col d-flex justify-content-end">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#cart">Cart (<span class="total-count"></span>)</button>
                    <button class="clear-cart btn btn-danger">Clear Cart</button>
                </div>
            </div>
        </div>
    </nav>
</header>

    <section>
        <?php if(isset($error_message)): ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong><?= $error_message ?></strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>

        <div class="d-flex align-items-start">

            <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical" style="border-right: 1px solid #e8f4fb;align-items: flex-start;">
                <button class="nav-link <?php if($_REQUEST['action'] == 'cat_breakfast') echo 'active' ?>" id="breakfast-tab" data-bs-toggle="pill" data-bs-target="#breakfast" type="button" role="tab" aria-controls="breakfast" aria-selected="true"><i class="fa-solid fa-bowl-food"></i> Breakfast</button>
                <button class="nav-link <?php if($_REQUEST['action'] == 'cat_rice_dishes') echo 'active' ?>" id="rice_dishes-tab" data-bs-toggle="pill" data-bs-target="#rice_dishes" type="button" role="tab" aria-controls="rice_dishes" aria-selected="false"><i class="fa-solid fa-bowl-rice"></i> Rice Dishes</button>
                <button class="nav-link <?php if($_REQUEST['action'] == 'cat_curries') echo 'active' ?>" id="curries-tab" data-bs-toggle="pill" data-bs-target="#curries" type="button" role="tab" aria-controls="curries" aria-selected="false"><i class="fa-solid fa-fish"></i> Curries</button>
                <button class="nav-link <?php if($_REQUEST['action'] == 'cat_snacks') echo 'active' ?>" id="snacks-tab" data-bs-toggle="pill" data-bs-target="#snacks" type="button" role="tab" aria-controls="snacks" aria-selected="false"><i class="fa-solid fa-burger"></i> Snacks</button>
                <button class="nav-link <?php if($_REQUEST['action'] == 'cat_beverages') echo 'active' ?>" id="beverages-tab" data-bs-toggle="pill" data-bs-target="#beverages" type="button" role="tab" aria-controls="beverages" aria-selected="false"><i class="fa-solid fa-mug-hot"></i> Beverages</button>
                <button class="nav-link <?php if($_REQUEST['action'] == 'cat_desserts') echo 'active' ?>" id="desserts-tab" data-bs-toggle="pill" data-bs-target="#desserts" type="button" role="tab" aria-controls="desserts" aria-selected="false"><i class="fa-solid fa-ice-cream"></i> Desserts</button>
            </div>

            <div class="tab-content" id="v-pills-tabContent">

                <div class="tab-pane fade <?php if($_REQUEST['action'] == 'cat_breakfast') echo 'show active' ?>" id="breakfast" role="tabpanel" aria-labelledby="breakfast-tab" tabindex="0">
                    <div class="container">
                        <div class="row">
                            <?php foreach ($breakfast_items as $item): ?>
                                <div class="col">
                                    <div class="card" style="width: 20rem;">
                                        <img class="card-img-top" src="view/img/items/breakfast/<?= strtolower($item['name']) . '.jpg' ?>" alt="Card image cap" style="padding-top: 0.4rem;">
                                        <div class="card-block">
                                            <h4 class="card-title"><?= $item['name'] ?></h4>
                                            <p class="card-text">Price: &#8377<span class="price"><?= $item['price'] ?></span></p>
                                            <a href="#" data-name="<?= str_replace(' ', '&nbsp;', $item['name']) ?>" data-price="<?= $item['price'] ?>" class="add-to-cart btn btn-primary">Add to cart</a>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade <?php if($_REQUEST['action'] == 'cat_rice_dishes') echo 'show active' ?>" id="rice_dishes" role="tabpanel" aria-labelledby="rice_dishes-tab" tabindex="0">
                    <div class="container">
                        <div class="row">
                            <?php foreach ($rice_dishes_items as $item): ?>
                                <div class="col">
                                    <div class="card" style="width: 20rem;">
                                        <img class="card-img-top" src="view/img/items/rice dishes/<?= strtolower($item['name']) . '.jpg' ?>" alt="Card image cap" style="padding-top: 0.4rem;">
                                        <div class="card-block">
                                            <h4 class="card-title"><?= $item['name'] ?></h4>
                                            <p class="card-text">Price: &#8377<span class="price"><?= $item['price'] ?></span></p>
                                            <a href="#" data-name="<?= str_replace(' ', '&nbsp;', $item['name']) ?>" data-price="<?= $item['price'] ?>" class="add-to-cart btn btn-primary">Add to cart</a>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade <?php if($_REQUEST['action'] == 'cat_curries') echo 'show active' ?>" id="curries" role="tabpanel" aria-labelledby="curries-tab" tabindex="0">
                    <div class="container">
                        <div class="row">
                            <?php foreach ($curries_items as $item): ?>
                                <div class="col">
                                    <div class="card" style="width: 20rem;">
                                        <img class="card-img-top" src="view/img/items/curries/<?= strtolower($item['name']) . '.jpg' ?>" alt="Card image cap" style="padding-top: 0.4rem;">
                                        <div class="card-block">
                                            <h4 class="card-title"><?= $item['name'] ?></h4>
                                            <p class="card-text">Price: &#8377<span class="price"><?= $item['price'] ?></span></p>
                                            <a href="#" data-name="<?= str_replace(' ', '&nbsp;', $item['name']) ?>" data-price="<?= $item['price'] ?>" class="add-to-cart btn btn-primary">Add to cart</a>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade <?php if($_REQUEST['action'] == 'cat_snacks') echo 'show active' ?>" id="snacks" role="tabpanel" aria-labelledby="snacks-tab" tabindex="0">
                    <div class="container">
                        <div class="row">
                            <?php foreach ($snacks_items as $item): ?>
                                <div class="col">
                                    <div class="card" style="width: 20rem;">
                                        <img class="card-img-top" src="view/img/items/snacks/<?= strtolower($item['name']) . '.jpg' ?>" alt="Card image cap" style="padding-top: 0.4rem;">
                                        <div class="card-block">
                                            <h4 class="card-title"><?= $item['name'] ?></h4>
                                            <p class="card-text">Price: &#8377<span class="price"><?= $item['price'] ?></span></p>
                                            <a href="#" data-name="<?= str_replace(' ', '&nbsp;', $item['name']) ?>" data-price="<?= $item['price'] ?>" class="add-to-cart btn btn-primary">Add to cart</a>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade <?php if($_REQUEST['action'] == 'cat_beverages') echo 'show active' ?>" id="beverages" role="tabpanel" aria-labelledby="beverages-tab" tabindex="0">
                    <div class="container">
                        <div class="row">
                            <?php foreach ($beverages_items as $item): ?>
                                <div class="col">
                                    <div class="card" style="width: 20rem;">
                                        <img class="card-img-top" src="view/img/items/beverages/<?= strtolower($item['name']) . '.jpg' ?>" alt="Card image cap" style="padding-top: 0.4rem;">
                                        <div class="card-block">
                                            <h4 class="card-title"><?= $item['name'] ?></h4>
                                            <p class="card-text">Price: &#8377<span class="price"><?= $item['price'] ?></span></p>
                                            <a href="#" data-name="<?= str_replace(' ', '&nbsp;', $item['name']) ?>" data-price="<?= $item['price'] ?>" class="add-to-cart btn btn-primary">Add to cart</a>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade <?php if($_REQUEST['action'] == 'cat_desserts') echo 'show active' ?>" id="desserts" role="tabpanel" aria-labelledby="desserts-tab" tabindex="0">
                    <div class="container">
                        <div class="row">
                            <?php foreach ($desserts_items as $item): ?>
                                <div class="col">
                                    <div class="card" style="width: 20rem;">
                                        <img class="card-img-top" src="view/img/items/desserts/<?= strtolower($item['name']) . '.jpg' ?>" alt="Card image cap" style="padding-top: 0.4rem;">
                                        <div class="card-block">
                                            <h4 class="card-title"><?= $item['name'] ?></h4>
                                            <p class="card-text">Price: &#8377<span class="price"><?= $item['price'] ?></span></p>
                                            <a href="#" data-name="<?= str_replace(' ', '&nbsp;', $item['name']) ?>" data-price="<?= $item['price'] ?>" class="add-to-cart btn btn-primary">Add to cart</a>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="modal fade" id="cart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Cart</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table class="show-cart table">

                        </table>
                        <div>Total price: &#8377<span class="total-cart"></span></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <form method="post" action="<?= $_SERVER['PHP_SELF'] ?>">
                            <input type="hidden" name="total" id="total-input" value="">
                            <input type="hidden" class="cat_special" name="category" value="">
                            <input type="hidden" name="action" value="place_order">
                            <input type="hidden" name="cart" id="cartInput">
                            <button type="submit" class="btn btn-primary" id="order-now-btn">Order now</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </section>
</body>