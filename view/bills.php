<body xmlns="http://www.w3.org/1999/html" style="padding: 1rem;">
    <nav class="navbar">
        <div class="container">
            <a class="navbar-brand" href=".">
                <i class="fa fa-home">home</i>
            </a>
        </div>
    </nav>
    <ul class="nav nav-pills mb-3 justify-content-center" id="pills-tab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">This month</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">View past bills</button>
        </li>
    </ul>
    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0" >
                <?php
                $timezone = new DateTimeZone('Asia/Kolkata');
                $datetime = new DateTime('now', $timezone);
                $monthNumber = $datetime->format('n');
                $yearNumber = $datetime->format('y');
                ?>
                <?php $bills = get_bills(); foreach ($bills as $bill): ?>
                    <?php if($bill['month'] == $monthNumber && $bill['year'] == $yearNumber): ?>
                        <div class="card card-timeline px-2 border-none order" style="padding: 1rem">
                            <h1 class="order_head">Current month summary</h1>
                            <ul class="bs4-order-tracking">
                                <span>Total amount: &#8377;</span><?= $bill['billed_amt']; ?>
                            </ul>

                            <div class="accordion" id="accordionExample<?= $bill['bill_id'] ?>">
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?= $bill['bill_id'] ?>" aria-expanded="true" aria-controls="collapse<?= $bill['bill_id'] ?>">
                                            View transactions
                                        </button>
                                    </h2>
                                    <div id="collapse<?= $bill['bill_id'] ?>" class="accordion-collapse collapse" data-bs-parent="#accordionExample<?= $bill['bill_id'] ?>">
                                        <?php $orders_summary = orders_summary($monthNumber, $yearNumber)?>
                                        <div class="accordion-body">
                                            <table class="table table-striped table-bordered">
                                                <thead>
                                                <tr>
                                                    <th scope="col">Order ID</th>
                                                    <th scope="col">Price</th>
                                                    <th scope="col">Time</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php foreach ($orders_summary as $order_summary): ?>
                                                    <tr>
                                                        <th scope="row"><?= $order_summary['order_id'] ?></th>
                                                        <td>&#8377;<?= $order_summary['order_price'] ?></td>
                                                        <td><?= $order_summary['order_time'] ?></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                                </tbody>
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
        <?php $bills = get_bills(); foreach ($bills as $bill): ?>
            <?php if(!($bill['month'] == $monthNumber && $bill['year'] == $yearNumber)): ?>
                <div class="card card-timeline px-2 border-none order" style="padding: 1rem; background-color: <?php if($bill['paid']) echo "#006400b0"; else echo "#ff0000c9" ?>">
                    <h1 style="text-align: center;">Bill id#<?= $bill['bill_id'] ?></h1>
                    <div style="display: flex; flex-direction: row-reverse;justify-content: space-between;">
                        <h2 style="color: white;"><?= $bill['formatted_date'] ?></h2>
                        <h3>Bill amount: &#8377;<?= $bill['billed_amt'] ?></h3>
                    </div>

                    <div class="accordion" id="accordionExample<?= $bill['bill_id'] ?>">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?= $bill['bill_id'] ?>" aria-expanded="true" aria-controls="collapse<?= $bill['bill_id'] ?>">
                                    View transactions
                                </button>
                            </h2>
                            <div id="collapse<?= $bill['bill_id'] ?>" class="accordion-collapse collapse" data-bs-parent="#accordionExample<?= $bill['bill_id'] ?>">
                                <?php $orders_summary = orders_summary($bill['month'], $bill['year'])?>
                                <div class="accordion-body">
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            <th scope="col">Order ID</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Time</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($orders_summary as $order_summary): ?>
                                            <tr>
                                                <th scope="row"><?= $order_summary['order_id'] ?></th>
                                                <td>&#8377;<?= $order_summary['order_price'] ?></td>
                                                <td><?= $order_summary['order_time'] ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
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