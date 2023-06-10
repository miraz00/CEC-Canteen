<body>
    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">On the way</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Delivered</button>
        </li>
    </ul>
    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
            <?php if(isset($orders)) ?>
                <?php foreach ($orders as $order): ?>
                    <?php if(!$order['delivered']): ?>
                        <?php $items = get_items($order['id']) ?>
                        <h1 style="text-align: center;text-transform: capitalize;">order id#<?= $order['id'] ?></h1>
                        <div class="card card-timeline px-2 border-none">
                            <ul class="bs4-order-tracking">
                                <li class="step active">
                                    <div><i class="fas fa-user"></i></div>
                                    Order Placed
                                </li>
                                <li class="step <?php if($order['preparing']) echo "active" ?>">
                                    <div><i class="fas fa-bread-slice"></i></div>
                                    Preparing your food
                                </li>
                                <li class="step <?php if($order['prepared']) echo "active" ?>">
                                    <div><i class="fas fa-truck"></i></div>
                                    Ready to serve
                                </li>
                                <li class="step <?php if($order['delivered']) echo "active" ?>">
                                    <div><i class="fas fa-birthday-cake"></i></div>
                                    Delivered
                                </li>
                            </ul>
                            <h5 class="text-center">
                                <b>In transit</b>. The order has been shipped!
                            </h5>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
        </div>
        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">

        </div>
    </div>

