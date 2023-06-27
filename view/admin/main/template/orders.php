<?php
session_start();
if($_SESSION['account'] != 'admin')
{
    echo "You are not authorized to visit this page!";
    return;
}
date_default_timezone_set("Asia/Kolkata");

header('Content-Type: text/html; charset=utf-8');

require_once('../../../../model/canteen_db.php');
require_once('../../../../model/users.php');
require_once('../../../../model/items.php');
require_once('../../../../model/orders.php');
require_once('../../../../model/bills.php');

require_once('../../../../includes/helpers.php');
?>

<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Drora - Bootstrap Restaurant Admin Dashboard HTML Template</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../../assets/images/favicon.png">
    <!-- Custom Stylesheet -->
    <link href="../../assets/plugins/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
</head>

<body>

   
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="nk-sidebar">           
            <div class="nk-nav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="nav-label">Dashboard</li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-speedometer"></i><span class="nav-text">Dashboard</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="admin.php">Admin Overview</a></li>
                            <li><a href="students.php">Students</a></li>
                            <li><a href="employee.php">Bills</a></li>
                            <li><a href="menus.php">Menus</a></li>
                            <!--                            <li><a href="offers.php">Offer</a></li>-->
                            <!--                            <li><a href="reservation.php">Reservation</a></li>-->
                            <li><a href="employer.php">Employees</a></li>

                            <li><a href="orders.php">Order</a></li>
                            
                            
                        </ul>
                    </li>
                    
                  
                    

      

                </ul>
            </div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">


            <!-- row -->

            <div class="container-fluid">
                <div class="row justify-content-between mb-3">
					<div class="col-12 ">
						<h2 class="page-heading">Hi,Welcome Back!</h2>
						<p class="mb-0">Your restaurent admin template</p>
					</div>
                    <div class="col-xl-9 col-xxl-9 col-lg-8 mt-4 mt-lg-0">
                        <div class="steps">
                            <form action="../../../../index.php" method="post" id="logout" style="display: flex;">
                                <input type="hidden" name="action" value="logout">
                                <a class="btn badge-primary" style="display: flex;align-items: flex-end;white-space: nowrap;" href="javascript:$('#logout').submit(); ">LogOut</a>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="display table-responsive-xl" style="min-width: 845px">
                                        <thead>
                                            <tr>
                                                <th scope="col" id="order_head">Order ID</th>
                                                <th scope="col">Customer Name</th>
                                                <th scope="col">Account Type</th>
                                                <th scope="col">Ordered On</th>
                                                <th scope="col">Items</th>
                                                <th scope="col">Action</th>
                                                <th scope="col">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $orders = all_orders();
                                            foreach ($orders as $order):?>
                                                <tr>
                                                    <td>
                                                        <?= $order['order_id'] ?>
                                                    </td>
                                                    <td>
                                                        <?= $order['name'] ?>
                                                    </td>
                                                    <td>
                                                        <?php if(isset($order['tokens']))
                                                                echo "Student";
                                                            else
                                                                echo "Teacher";
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?= $order['ordered_on'] ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        $items = order_summary($order['order_id']);
                                                        $lastKey = array_key_last($items); // Get the last key of the array
                                                        foreach ($items as $key => $item): ?>
                                                            <?= $item['item_name'] ?>( &#8377;<?= $item['item_price']?> ) X <?= $item['item_quantity'] ?>
                                                            <?= "<br>" ?>
                                                            <?php if($key == $lastKey): // Check if the current key is the last key ?>
                                                                <?= "<hr>" ?>
                                                                Total: &#8377;<?= order_price($order['order_id'])['total'] ?>
                                                            <?php endif ?>
                                                        <?php endforeach; ?>

                                                    </td>
                                                    <td>
                                                        <form action="../../../../index.php" method="post" class="order-form">
                                                            <div class="form-group">
                                                                <div class="form-check form-check-inline">
                                                                    <label class="form-check-label">
                                                                        <input name="preparing" type="checkbox" id="checkbox<?php echo $order['order_id']; ?>preparing" class="form-check-input" value="<?php if($order['preparing']) echo '1'; else echo '0'; ?>" <?php if($order['preparing']) echo 'checked';?> onclick="submitForm(this)" >Preparing
                                                                    </label>
                                                                    <?php if($order['preparing']):?>
                                                                        <input name="preparing" type="hidden" value="1">
                                                                    <?php endif ?>
                                                                    <input name="action" type="hidden" value="order_status">
                                                                    <input name="order_id" type="hidden" value="<?= $order['order_id'] ?>">
                                                                </div>
                                                            </div>
                                                        </form>
                                                        <form action="../../../../index.php" method="post" class="order-form">
                                                            <div class="form-group">
                                                                <div class="form-check form-check-inline">
                                                                    <label class="form-check-label">
                                                                        <input name="prepared" type="checkbox" id="checkbox<?php echo $order['order_id']; ?>prepared" class="form-check-input" value="<?php if($order['prepared']) echo '1'; else echo '0'; ?>" <?php if($order['prepared']) echo 'checked';?> onclick="submitForm(this)" >Prepared
                                                                    </label>
                                                                    <?php if($order['prepared']):?>
                                                                        <input name="prepared" type="hidden" value="1">
                                                                    <?php endif ?>
                                                                    <input name="action" type="hidden" value="order_status">
                                                                    <input name="order_id" type="hidden" value="<?= $order['order_id'] ?>">
                                                                </div>
                                                            </div>
                                                        </form>
                                                        <form action="../../../../index.php" method="post" class="order-form">
                                                            <div class="form-group">
                                                                <div class="form-check form-check-inline">
                                                                    <label class="form-check-label">
                                                                        <input name="delivered" type="checkbox" id="checkbox<?php echo $order['order_id']; ?>delivered" class="form-check-input" value="<?php if($order['delivered']) echo '1'; else echo '0'; ?>" <?php if($order['delivered']) echo 'checked';?> onclick="submitForm(this)" >Delivered
                                                                    </label>
                                                                    <?php if($order['delivered']):?>
                                                                        <input name="delivered" type="hidden" value="1">
                                                                    <?php endif ?>
                                                                    <input name="action" type="hidden" value="order_status">
                                                                    <input name="order_id" type="hidden" value="<?= $order['order_id'] ?>">
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </td>
                                                    <td>
                                                        <?php if ($order['delivered']): ?>
                                                            <span class="badge badge-xs badge-success">Delivered</span>
                                                        <?php elseif($order['prepared']): ?>
                                                            <span class="badge badge-xs badge-primary">Prepared</span>
                                                        <?php else: ?>
                                                            <span class="badge badge-xs badge-warning">Preparing</span>
                                                        <?php endif ?>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
        
        
        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p><a href="templatespoint.net">Templates Point</a></p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->

        
        <!--**********************************
            Right sidebar start
        ***********************************-->
        <div class="sidebar-right">
            <a class="sidebar-right-trigger gradient-5-x" href="javascript:void(0)">
                <span><i class="fa fa-cog fa-spin"></i></span>
            </a>
            <div class="sidebar-right-inner">
                <div class="admin-settings">
                    <h4>Pick your style</h4>
                    <div>
                        <p>Background</p>
                        <select class="form-control" name="theme_version" id="theme_version">
                            <option value="light">Light</option>
                            <option value="dark">Dark</option>
                        </select>
                    </div>
                    <div>
                        <p>Layout</p>
                        <select class="form-control" name="theme_layout" id="theme_layout">
                            <option value="vertical">Vertical</option>
                            <option value="horizontal">Horizontal</option>
                        </select>
                    </div>
                    <div>
                        <p>Sidebar</p>
                        <select class="form-control" name="sidebar_style" id="sidebar_style">
                            <option value="full">Full</option>
                            <option value="mini">Mini</option>
                            <option value="compact">Compact</option>
                            <option value="overlay">Overlay</option>
                        </select>
                    </div>
                    <div>
                        <p>Sidebar position</p>
                        <select class="form-control" name="sidebar_position" id="sidebar_position">
                            <option value="static">Static</option>
                            <option value="fixed">Fixed</option>
                        </select>
                    </div>
                    <div>
                        <p>Header position</p>
                        <select class="form-control" name="header_position" id="header_position">
                            <option value="static">Static</option>
                            <option value="fixed">Fixed</option>
                        </select>
                    </div>
                    <div>
                        <p>Container</p>
                        <select class="form-control" name="container_layout" id="container_layout">
                            <option value="wide">Wide</option>
                            <option value="boxed">Boxed</option>
                            <option value="wide-boxed">Wide Boxed</option>
                        </select>
                    </div>
                    <div>
                        <p>Direction</p>
                        <select class="form-control" name="theme_direction" id="theme_direction">
                            <option value="ltr">LTR</option>
                            <option value="rtl">RTL</option>
                        </select>
                    </div>
                    <div>
                        <p>Navigation Header</p>
                        <div>
                            <span>
                                <input type="radio" name="navigation_header" value="color_1" class="filled-in chk-col-primary" id="nav_header_bg_1">
                                <label for="nav_header_bg_1"></label>
                            </span>
                            <span>
                                <input type="radio" name="navigation_header" value="color_2" class="filled-in chk-col-primary" id="nav_header_bg_2">
                                <label for="nav_header_bg_2"></label>
                            </span>
                            <span>
                                <input type="radio" name="navigation_header" value="color_3" class="filled-in chk-col-primary" id="nav_header_bg_3">
                                <label for="nav_header_bg_3"></label>
                            </span>
                            <span>
                                <input type="radio" name="navigation_header" value="color_4" class="filled-in chk-col-primary" id="nav_header_bg_4">
                                <label for="nav_header_bg_4"></label>
                            </span>
                            <span>
                                <input type="radio" name="navigation_header" value="color_5" class="filled-in chk-col-primary" id="nav_header_bg_5">
                                <label for="nav_header_bg_5"></label>
                            </span>
                            <span>
                                <input type="radio" name="navigation_header" value="color_6" class="filled-in chk-col-primary" id="nav_header_bg_6">
                                <label for="nav_header_bg_6"></label>
                            </span>
                            <span>
                                <input type="radio" name="navigation_header" value="color_7" class="filled-in chk-col-primary" id="nav_header_bg_7">
                                <label for="nav_header_bg_7"></label>
                            </span>
                            <span>
                                <input type="radio" name="navigation_header" value="color_8" class="filled-in chk-col-primary" id="nav_header_bg_8">
                                <label for="nav_header_bg_8"></label>
                            </span>
                            <span>
                                <input type="radio" name="navigation_header" value="color_9" class="filled-in chk-col-primary" id="nav_header_bg_9">
                                <label for="nav_header_bg_9"></label>
                            </span>
                            <span>
                                <input type="radio" name="navigation_header" value="color_10" class="filled-in chk-col-primary" id="nav_header_bg_10">
                                <label for="nav_header_bg_10"></label>
                            </span>
                        </div>
                    </div>
                    <div>
                        <p>Header</p>
                        <div>
                            <span>
                                <input type="radio" name="header_bg" value="color_1" class="filled-in chk-col-primary" id="header_bg_1">
                                <label for="header_bg_1"></label>
                            </span>
                            <span>
                                <input type="radio" name="header_bg" value="color_2" class="filled-in chk-col-primary" id="header_bg_2">
                                <label for="header_bg_2"></label>
                            </span>
                            <span>
                                <input type="radio" name="header_bg" value="color_3" class="filled-in chk-col-primary" id="header_bg_3">
                                <label for="header_bg_3"></label>
                            </span>
                            <span>
                                <input type="radio" name="header_bg" value="color_4" class="filled-in chk-col-primary" id="header_bg_4">
                                <label for="header_bg_4"></label>
                            </span>
                            <span>
                                <input type="radio" name="header_bg" value="color_5" class="filled-in chk-col-primary" id="header_bg_5">
                                <label for="header_bg_5"></label>
                            </span>
                            <span>
                                <input type="radio" name="header_bg" value="color_6" class="filled-in chk-col-primary" id="header_bg_6">
                                <label for="header_bg_6"></label>
                            </span>
                            <span>
                                <input type="radio" name="header_bg" value="color_7" class="filled-in chk-col-primary" id="header_bg_7">
                                <label for="header_bg_7"></label>
                            </span>
                            <span>
                                <input type="radio" name="header_bg" value="color_8" class="filled-in chk-col-primary" id="header_bg_8">
                                <label for="header_bg_8"></label>
                            </span>
                            <span>
                                <input type="radio" name="header_bg" value="color_9" class="filled-in chk-col-primary" id="header_bg_9">
                                <label for="header_bg_9"></label>
                            </span>
                            <span>
                                <input type="radio" name="header_bg" value="color_10" class="filled-in chk-col-primary" id="header_bg_10">
                                <label for="header_bg_10"></label>
                            </span>
                        </div>
                    </div>
                    <div>
                        <p>Sidebar</p>
                        <div>
                            <span>
                                <input type="radio" name="sidebar_bg" value="color_1" class="filled-in chk-col-primary" id="sidebar_bg_1">
                                <label for="sidebar_bg_1"></label>
                            </span>
                            <span>
                                <input type="radio" name="sidebar_bg" value="color_2" class="filled-in chk-col-primary" id="sidebar_bg_2">
                                <label for="sidebar_bg_2"></label>
                            </span>
                            <span>
                                <input type="radio" name="sidebar_bg" value="color_3" class="filled-in chk-col-primary" id="sidebar_bg_3">
                                <label for="sidebar_bg_3"></label>
                            </span>
                            <span>
                                <input type="radio" name="sidebar_bg" value="color_4" class="filled-in chk-col-primary" id="sidebar_bg_4">
                                <label for="sidebar_bg_4"></label>
                            </span>
                            <span>
                                <input type="radio" name="sidebar_bg" value="color_5" class="filled-in chk-col-primary" id="sidebar_bg_5">
                                <label for="sidebar_bg_5"></label>
                            </span>
                            <span>
                                <input type="radio" name="sidebar_bg" value="color_6" class="filled-in chk-col-primary" id="sidebar_bg_6">
                                <label for="sidebar_bg_6"></label>
                            </span>
                            <span>
                                <input type="radio" name="sidebar_bg" value="color_7" class="filled-in chk-col-primary" id="sidebar_bg_7">
                                <label for="sidebar_bg_7"></label>
                            </span>
                            <span>
                                <input type="radio" name="sidebar_bg" value="color_8" class="filled-in chk-col-primary" id="sidebar_bg_8">
                                <label for="sidebar_bg_8"></label>
                            </span>
                            <span>
                                <input type="radio" name="sidebar_bg" value="color_9" class="filled-in chk-col-primary" id="sidebar_bg_9">
                                <label for="sidebar_bg_9"></label>
                            </span>
                            <span>
                                <input type="radio" name="sidebar_bg" value="color_10" class="filled-in chk-col-primary" id="sidebar_bg_10">
                                <label for="sidebar_bg_10"></label>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--**********************************
            Right sidebar end
        ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <script src="../../assets/plugins/common/common.min.js"></script>
    <script src="../js/custom.min.js"></script>
    <script src="../js/settings.js"></script>
    <script src="../js/quixnav.js"></script>
    <script src="../js/styleSwitcher.js"></script>


    <!-- Datatable -->
    <script src="../../assets/plugins/datatables/js/jquery.dataTables.min.js"></script>

    <!-- Init files -->
    <script src="../js/plugins-init/datatables.init.js"></script>

    <script>
        function submitForm(checkbox) {
            var form = checkbox.closest('.order-form');
            form.submit();
        }
        document.addEventListener('DOMContentLoaded', function() {
            // Simulate a click on the "Order ID" table header
            var orderIDHeader = document.querySelector('#order_head');
            var clickEvent = new MouseEvent('click', {
                bubbles: true,
                cancelable: true
            });
            orderIDHeader.dispatchEvent(clickEvent);
        });
    </script>
</body>


</html>