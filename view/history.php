<?php
session_start();

$title = "Order History";

require("templates/header.php");

date_default_timezone_set("Asia/Kolkata");

header('Content-Type: text/html; charset=utf-8');

require_once('../model/canteen_db.php');
require_once('../model/users.php');
require_once('../model/items.php');
require_once('../model/orders.php');

require_once('../includes/helpers.php');

$_SESSION['orders'] = get_orders();
$orders = $_SESSION['orders'];
?>
<body xmlns="http://www.w3.org/1999/html">
    <nav class="navbar">
        <div class="container">
            <a class="navbar-brand" href="../index.php">
                <i class="fa fa-home">home</i>
            </a>
        </div>
    </nav>
    <ul class="nav nav-pills mb-3 justify-content-center" id="pills-tab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">On the way</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Delivered</button>
        </li>
    </ul>
    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
                <?php foreach ($orders as $order): ?>
                    <?php if(!$order['delivered']): ?>
                        <?php $items = get_items($order['id']) ?>
                        <div class="card card-timeline px-2 border-none order">
                            <h1 class="order_head">order id#<?= $order['id'] ?></h1>
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
                                <li class="step">
                                    <div><i class="fas fa-birthday-cake"></i></div>
                                    Delivered
                                </li>
                            </ul>
                            <div class="text-center">
                                <?php if($order['prepared']): ?>
                                    <p style="font-size: 16px; color: #0000008f">
                                        <span style="font-weight: bold;font-size: 18px; color: #41597c">Ready to serve: </span>Your food is ready to serve!
                                    </p>
                                <?php elseif($order['preparing']): ?>
                                    <p style="font-size: 16px; color: #0000008f">
                                        <span style="font-weight: bold;font-size: 18px; color: #41597c">Processing order: </span>Our team is now preparing your food!
                                    </p>
                                <?php else: ?>
                                    <p style="font-size: 16px; color: #0000008f">
                                        <span style="font-weight: bold;font-size: 18px; color: #41597c">Order placed: </span>Your order has been placed successfully!
                                    </p>
                                <?php endif; ?>
                            </div>
                            <div class="accordion" id="accordionExample<?= $order['id'] ?>">
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?= $order['id'] ?>" aria-expanded="true" aria-controls="collapse<?= $order['id'] ?>">
                                            View order summary
                                        </button>
                                    </h2>
                                    <div id="collapse<?= $order['id'] ?>" class="accordion-collapse collapse" data-bs-parent="#accordionExample<?= $order['id'] ?>">
                                        <div class="accordion-body">
                                            <table class="table table-striped table-bordered">
                                                <thead>
                                                <tr>
                                                    <th scope="col">Item</th>
                                                    <th scope="col">Price</th>
                                                    <th scope="col">Quantity</th>
                                                    <th scope="col">Total</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php foreach ($items as $item): ?>
                                                    <tr>
                                                        <th scope="row"><?= $item['item_name'] ?></th>
                                                        <td>&#8377;<?= $item['item_price'] ?></td>
                                                        <td><?= $item['item_quantity'] ?></td>
                                                        <td>&#8377;<?= number_format($item['item_price'] * $item['item_quantity'], 2) ?></td>
                                                        <?php $total += $item['item_price'] * $item['item_quantity'] ?>
                                                    </tr>
                                                <?php endforeach; ?>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <td style="border-right: none;"></td>
                                                        <td style="border: none;"></td>
                                                        <td style="border: none;"></td>
                                                        <td><strong>Grand Total: </strong>&#8377;<?= number_format($total, 2); $total = 0; ?></td>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
        </div>
        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
            <?php foreach ($orders as $order): ?>
                <?php if($order['delivered']): ?>
                    <?php $items = get_items($order['id']) ?>
                    <div class="card card-timeline px-2 border-none order">
                        <h1 class="order_head">order id#<?= $order['id'] ?></h1>
                        <ul class="bs4-order-tracking">
                            <li class="step active">
                                <div><i class="fas fa-user"></i></div>
                                Order Placed
                            </li>
                            <li class="step active">
                                <div><i class="fas fa-bread-slice"></i></div>
                                Preparing your food
                            </li>
                            <li class="step active">
                                <div><i class="fas fa-truck"></i></div>
                                Ready to serve
                            </li>
                            <li class="step active">
                                <div><i class="fas fa-birthday-cake"></i></div>
                                Delivered
                            </li>
                        </ul>
                        <div class="text-center">
                            <p style="font-size: 16px; color: #0000008f">
                                <span style="font-weight: bold;font-size: 18px; color: #41597c">Delivered: </span>Your order was served! Thank you!
                            </p>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>
    <script>
        // Get the active tab on page load
        window.addEventListener('load', function() {
            const activeTab = localStorage.getItem('activeTab');
            if (activeTab) {
                const tab = document.querySelector(`[data-bs-target="${activeTab}"]`);
                if (tab) {
                    tab.click();
                }
            }
        });

        // Store the active tab in local storage on tab change
        const tabs = document.querySelectorAll('.nav-link');
        tabs.forEach(tab => {
            tab.addEventListener('click', function() {
                localStorage.setItem('activeTab', this.getAttribute('data-bs-target'));
            });
        });
    </script>
<?php
require("templates/footer.php");
?>
