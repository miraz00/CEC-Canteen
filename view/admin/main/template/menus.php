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
                            <li><a href="employee.php">Employee Overview</a></li>
                            <li><a href="menus.php">Menus</a></li>
                            <li><a href="offers.php">Offer</a></li>
                            <li><a href="reservation.php">Reservation</a></li>
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

            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="breadcrumb-range-picker">
                        <span><i class="icon-calender"></i></span>
                        <span class="ml-1">August 08, 2017 - August 08, 2017</span>
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Components</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->

            <div class="container-fluid">
                <div class="row justify-content-between mb-3">
					<div class="col-12 ">
						<h2 class="page-heading">Hi,Welcome Back!</h2>
						<p class="mb-0">Your restaurent admin template</p>
					</div>
                </div>
                
                <div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header pb-0">
                <h4 class="card-title">Items</h4>
            </div>
            <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="table-responsive">
                                    <table id="example2" class="display" style="width:100%">
                                    
                        <thead>
                            <tr>
                                <th scope="col">Category</th>
                                <th scope="col">Id</th>
                                <th scope="col">Name</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $items = all_items();
                            foreach ($items as $item): ?>
                                <tr>
                                <td>
                                        <span class="data"><?= $item['category_id'] ?></span>
                                        <form class="edit-form" style="display: none;">
                                            <input type="number" name="category_id" value="<?= $item['category_id'] ?>">
                                        </form>
                                    </td>
                                
                                    <td>
                                        <span class="data"><?= $item['id'] ?></span>
                                        <form class="edit-form" style="display: none;">
                                            <input type="number" name="id" value="<?= $item['id'] ?>">
                                        </form>
                                    </td>

                                    <td>
                                        <span class="data"><?= $item['name'] ?></span>
                                        <form class="edit-form" style="display: none;">
                                            <input type="text" name="name" value="<?= $item['name'] ?>">
                                        </form>
                                    </td>
                                    <td>
                                        <span class="data"><?= $item['price'] ?></span>
                                        <form class="edit-form" style="display: none;">
                                            <input type="number" name="price" value="<?= $item['price'] ?>">
                                        </form>
                                    </td>
                                    <td>
                                        <span class="data"><?= $item['quantity'] ?></span>
                                        <form class="edit-form" style="display: none;">
                                            <input type="number" name="quantity" value="<?= $item['quantity'] ?>">
                                        </form>
                                    </td>
                                    <td>
                                        <div class="actions">
                                            <button class="btn btn-sm btn-primary edit-button">Edit</button>
                                            <button class="btn btn-sm btn-success save-button" style="display: none;">Save</button>
                                            <button class="btn btn-sm btn-danger delete-button">Delete</button>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                        
                    </table>
                    <div class="d-flex  justify-content-center">
                    <button class=" btn btn-success btn-lg add-button">ADD ITEM</button>
                </div>
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
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <script src="../../assets/plugins/common/common.min.js"></script>
    <script src="../js/custom.min.js"></script>
    <script src="../js/settings.js"></script>
    <script src="../js/quixnav.js"></script>
    <script src="../js/styleSwitcher.js"></script>
    
    <!-- Datatables -->
    <script src="../../assets/plugins/datatables/js/jquery.dataTables.min.js"></script>


    <!-- Init files -->
    <script src="../js/dashboard/dashboard-5.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <script>
    $(document).ready(function () {
        $('.edit-button').click(function () {
            var row = $(this).closest('tr');
            row.find('.data').hide();
            row.find('.edit-form').show();
            row.find('.edit-button').hide();
            row.find('.save-button').show();
        });

        $('.save-button').click(function () {
            var row = $(this).closest('tr');
            var form = row.find('.edit-form');
            var data = form.serialize();
            $.ajax({
                url: '../../../../index.php?action=save_item_data',
                method: 'POST',
                data: data,
                success: function (response) {
                    if (response === "Data updated successfully.") {
                        // Display a success message or perform any desired action
                        row.find('.data').show().text(form.find('input').val());
                        form.hide();
                        row.find('.edit-button').show();
                        row.find('.save-button').hide();
                    } else {
                        // Display an error message or perform any desired action
                        alert("Failed to update data.");
                    }
                },
                error: function () {
                    // Handle the error if the AJAX request fails
                    alert("Failed to update data. Please try again.");
                }
            });
        });
    });
</script>

<script>
$(document).ready(function () {
    $('.delete-button').click(function () {
        var row = $(this).closest('tr');
        var category_id = row.find('.data-category_id').text();

        // Confirm deletion with user
        if (confirm("Are you sure you want to delete this user?")) {
            var data = {
                action: 'delete_user_data',
                category_id: category_id
            };

            $.ajax({
                url: '../../../../index.php?action=delete_item',
                method: 'POST',
                data: data,
                success: function (response) {
                    // Handle the response from the server if needed
                    // For example, you can display a success message or refresh the table
                    row.remove();
                    alert("User deleted successfully.");
                },
                error: function (xhr, status, error) {
                    // Handle the error if the AJAX request fails
                    alert("Failed to delete user.");
                }
            });
        }
    });
});
</script>

<script>
   $(document).ready(function() {
    // Add User button click event using event delegation
    $(document).on('click', '.add-button', function() {
        // Create a new row HTML
        var newRow = '<tr>' +
            
            '<td><input type="number" name="new_category_id" class="form-control" placeholder="Category"></td>' +
            '<td><input type="number" name="new_id" class="form-control" placeholder="Id"></td>' +
            '<td><input type="text" name="new_name" class="form-control" placeholder="Name"></td>' +
            '<td><input type="number" name="new_price" class="form-control" placeholder="Price"></td>' +
            '<td><input type="number" name="new_quantity" class="form-control" placeholder="Quantity"></td>' +
            
            '<td>' +
            '<div class="actions">' +
            '<button class="btn btn-sm btn-success save-button">Save</button>' +
            '</div>' +
            '</td>' +
            '</tr>';

        // Append the new row to the table body
        $('#example2 tbody').append(newRow);
    });

    // Save button click event for dynamically added rows
    $(document).on('click', '.save-button', function() {
        var row = $(this).closest('tr');
        var category_id = row.find('[name="new_category_id"]').val();
        var id = row.find('[name="new_id"]').val();
        var name = row.find('[name="new_username"]').val();
        var price = row.find('[name="new_price"]').val();
        var quantity = row.find('[name="new_quantity"]').val();
       

        // Perform validation on the entered data if needed

        // Send the AJAX request to save the new user data
        $.ajax({
            url: '../../../../index.php?action=add_item',
            method: 'POST',
            data: {
                category_id: category_id,
                id: id,
                name: name,
                price: price,
                quantity: quantity
            },
            success: function(response) {
                // Handle the response from the server if needed
                // For example, display a success message or refresh the table
                alert("Item added successfully.");
            },
            error: function(xhr, status, error) {
                // Handle the error if the AJAX request fails
                alert("Failed to add item.");
            }
        });

        // Remove the new row from the table
        row.remove();
    });
});
</script>



</body>

</html>