
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
                    <div class="col-xl-3 col-sm-6 col-xxl-6">
                        <div class="card vertical-card__menu">
                            <span class="ribbon ribbon__two vertical-card__menu--offer">50%</span>
                            <div class="card-header p-0">
                                <div class="vertical-card__menu--image">
                                    <img src="../../assets/images/menu/granny-menu11.jpg" alt="Menu">
                                </div>
                            </div>
                            <div class="card-body p-0">
                                <div class="vertical-card__menu--desc p-3">
                                    <div class="d-flex justify-content-between">
                                        <h4 class="vertical-card__menu--title">Fried Egg Sandwich</h4>
                                        <div class="vertical-card__menu--fav">
                                            <a href="javascript:void()"><i class="fa fa-heart-o"></i></a>
                                        </div>
                                    </div>
                                    <p>Apple Juice, Beef Roast, Cheese Burger</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h2 class="vertical-card__menu--price"> <span>$60</span> <span class="prev_price">$54</span></h2>
                                        <div class="vertical-card__menu--rating c-pointer">
                                            <span class="icon"><i class="fa fa-star"></i></span>
                                            <span class="icon"><i class="fa fa-star"></i></span>
                                            <span class="icon"><i class="fa fa-star"></i></span>
                                            <span class="icon"><i class="fa fa-star"></i></span>
                                            <span class="icon"><i class="fa fa-star-o"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-between align-items-center">
                                <div class="vertical-card__menu--location">
                                    <div class="d-block">
                                        <span class="icon"><i class="fa fa-map-marker"></i></span>
                                        Bristol, Bristol
                                    </div>
                                    <div>
                                        <span class="icon"><i class="fa fa-motorcycle"></i></span>
                                        <span>10 min</span>
                                        <span class="icon ml-2"><i class="fa fa-clock-o"></i></span>
                                        <span>15min</span>
                                    </div>
                                </div>
                                <div class="vertical-card__menu--button">
                                    <button class="btn btn-primary">Order Now</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-xxl-6">
                        <div class="card vertical-card__menu">
                            <span class="ribbon ribbon__two vertical-card__menu--offer">20%</span>
                            <div class="card-header p-0">
                                <div class="vertical-card__menu--image">
                                    <img src="../../assets/images/menu/granny-menu12.jpg" alt="Menu">
                                </div>
                            </div>
                            <div class="card-body p-0">
                                <div class="vertical-card__menu--desc p-3">
                                    <div class="d-flex justify-content-between">
                                        <h4 class="vertical-card__menu--title">Chicken Grill</h4>
                                        <div class="vertical-card__menu--fav">
                                            <a href="javascript:void()"><i class="fa fa-heart-o"></i></a>
                                        </div>
                                    </div>
                                    <p>Apple Juice, Beef Roast, Cheese Burger</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h2 class="vertical-card__menu--price"> <span>$60</span> <span class="prev_price">$54</span></h2>
                                        <div class="vertical-card__menu--rating c-pointer">
                                            <span class="icon"><i class="fa fa-star"></i></span>
                                            <span class="icon"><i class="fa fa-star"></i></span>
                                            <span class="icon"><i class="fa fa-star"></i></span>
                                            <span class="icon"><i class="fa fa-star"></i></span>
                                            <span class="icon"><i class="fa fa-star-o"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-between align-items-center">
                                <div class="vertical-card__menu--location">
                                    <div class="d-block">
                                        <span class="icon"><i class="fa fa-map-marker"></i></span>
                                        Bristol, Bristol
                                    </div>
                                    <div>
                                        <span class="icon"><i class="fa fa-motorcycle"></i></span>
                                        <span>10 min</span>
                                        <span class="icon ml-2"><i class="fa fa-clock-o"></i></span>
                                        <span>15min</span>
                                    </div>
                                </div>
                                <div class="vertical-card__menu--button">
                                    <button class="btn btn-primary">Order Now</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-xxl-6">
                        <div class="card vertical-card__menu">
                            <span class="ribbon ribbon__two vertical-card__menu--offer">60%</span>
                            <div class="card-header p-0">
                                <div class="vertical-card__menu--image">
                                    <img src="../../assets/images/menu/granny-menu13.jpg" alt="Menu">
                                </div>
                            </div>
                            <div class="card-body p-0">
                                <div class="vertical-card__menu--desc p-3">
                                    <div class="d-flex justify-content-between">
                                        <h4 class="vertical-card__menu--title">Chicken Roll</h4>
                                        <div class="vertical-card__menu--fav">
                                            <a href="javascript:void()"><i class="fa fa-heart-o"></i></a>
                                        </div>
                                    </div>
                                    <p>Apple Juice, Beef Roast, Cheese Burger</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h2 class="vertical-card__menu--price"> <span>$60</span> <span class="prev_price">$54</span></h2>
                                        <div class="vertical-card__menu--rating c-pointer">
                                            <span class="icon"><i class="fa fa-star"></i></span>
                                            <span class="icon"><i class="fa fa-star"></i></span>
                                            <span class="icon"><i class="fa fa-star"></i></span>
                                            <span class="icon"><i class="fa fa-star"></i></span>
                                            <span class="icon"><i class="fa fa-star-o"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-between align-items-center">
                                <div class="vertical-card__menu--location">
                                    <div class="d-block">
                                        <span class="icon"><i class="fa fa-map-marker"></i></span>
                                        Bristol, Bristol
                                    </div>
                                    <div>
                                        <span class="icon"><i class="fa fa-motorcycle"></i></span>
                                        <span>10 min</span>
                                        <span class="icon ml-2"><i class="fa fa-clock-o"></i></span>
                                        <span>15min</span>
                                    </div>
                                </div>
                                <div class="vertical-card__menu--button">
                                    <button class="btn btn-primary">Order Now</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-xxl-6">
                        <div class="card vertical-card__menu">
                            <span class="ribbon ribbon__two vertical-card__menu--offer">25%</span>
                            <div class="card-header p-0">
                                <div class="vertical-card__menu--image">
                                    <img src="../../assets/images/menu/granny-menu5.jpg" alt="Menu">
                                </div>
                            </div>
                            <div class="card-body p-0">
                                <div class="vertical-card__menu--desc p-3">
                                    <div class="d-flex justify-content-between">
                                        <h4 class="vertical-card__menu--title">Chicken Wings</h4>
                                        <div class="vertical-card__menu--fav">
                                            <a href="javascript:void()"><i class="fa fa-heart-o"></i></a>
                                        </div>
                                    </div>
                                    <p>Apple Juice, Beef Roast, Cheese Burger</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h2 class="vertical-card__menu--price"> <span>$60</span> <span class="prev_price">$54</span></h2>
                                        <div class="vertical-card__menu--rating c-pointer">
                                            <span class="icon"><i class="fa fa-star"></i></span>
                                            <span class="icon"><i class="fa fa-star"></i></span>
                                            <span class="icon"><i class="fa fa-star"></i></span>
                                            <span class="icon"><i class="fa fa-star"></i></span>
                                            <span class="icon"><i class="fa fa-star-o"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-between align-items-center">
                                <div class="vertical-card__menu--location">
                                    <div class="d-block">
                                        <span class="icon"><i class="fa fa-map-marker"></i></span>
                                        Bristol, Bristol
                                    </div>
                                    <div>
                                        <span class="icon"><i class="fa fa-motorcycle"></i></span>
                                        <span>10 min</span>
                                        <span class="icon ml-2"><i class="fa fa-clock-o"></i></span>
                                        <span>15min</span>
                                    </div>
                                </div>
                                <div class="vertical-card__menu--button">
                                    <button class="btn btn-primary">Order Now</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

     

                <div class="row">
                    <div class="col-xl-3 col-xxl-4 col-md-4 col-sm-6">
                        <div class="card">
                            <span class="ribbon ribbon__three">25%</span>
                            <div class="image-wrapper">
                                <img class="img-fluid" src="../../assets/images/menu/18.jpg" alt="food menu">
                            </div>
                            <div class="card-body justify-content-between d-flex">
                                <h4 class="d-inline-block">Chicken Fried</h4>
                                <h4 class="d-inline-block">
                                    <span class="text-primary">$56</span>
                                </h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-xxl-4 col-md-4 col-sm-6">
                        <div class="card">
                            <span class="ribbon ribbon__three">25%</span>
                            <div class="image-wrapper">
                                <img class="img-fluid" src="../../assets/images/menu/19.jpg" alt="food menu">
                            </div>
                            <div class="card-body justify-content-between d-flex">
                                <h4 class="d-inline-block">Chicken Fried</h4>
                                <h4 class="d-inline-block">
                                    <span class="text-primary">$56</span>
                                </h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-xxl-4 col-md-4 col-sm-6">
                        <div class="card">
                            <span class="ribbon ribbon__three">25%</span>
                            <div class="image-wrapper">
                                <img class="img-fluid" src="../../assets/images/menu/14.jpg" alt="food menu">
                            </div>
                            <div class="card-body justify-content-between d-flex">
                                <h4 class="d-inline-block">Chicken Fried</h4>
                                <h4 class="d-inline-block">
                                    <span class="text-primary">$56</span>
                                </h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-xxl-4 col-md-4 col-sm-6">
                        <div class="card">
                            <span class="ribbon ribbon__three">25%</span>
                            <div class="image-wrapper">
                                <img class="img-fluid" src="../../assets/images/menu/15.jpg" alt="food menu">
                            </div>
                            <div class="card-body justify-content-between d-flex">
                                <h4 class="d-inline-block">Chicken Fried</h4>
                                <h4 class="d-inline-block">
                                    <span class="text-primary">$56</span>
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="card overflow-hidden">
                            <span class="ribbon ribbon__five">45%</span>
                            <div class="image-wrapper">
                                <img class="w-100" src="../../assets/images/menu/blog-image-10.jpg" alt="food menu">
                            </div>
                            <div class="card-body text-center">
                                <div class="c-pointer">
                                    <span class="icon"><i class="fa fa-star"></i></span>
                                    <span class="icon"><i class="fa fa-star"></i></span>
                                    <span class="icon"><i class="fa fa-star"></i></span>
                                    <span class="icon"><i class="fa fa-star"></i></span>
                                    <span class="icon"><i class="fa fa-star-o"></i></span>
                                </div>
                                <h4 class="my-2">Cras Neque</h4>
                                <h4>
                                    <span class="present_price">$56</span>
                                    <span class="prev_price">$70</span>
                                </h4>
                                <button class="btn btn-primary mt-2">Add To Cart</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card overflow-hidden">
                            <span class="ribbon ribbon__five">45%</span>
                            <div class="image-wrapper">
                                <img class="w-100" src="../../assets/images/menu/blog-image-8.jpg" alt="food menu">
                            </div>
                            <div class="card-body text-center">
                                <div class="c-pointer">
                                    <span class="icon"><i class="fa fa-star"></i></span>
                                    <span class="icon"><i class="fa fa-star"></i></span>
                                    <span class="icon"><i class="fa fa-star"></i></span>
                                    <span class="icon"><i class="fa fa-star"></i></span>
                                    <span class="icon"><i class="fa fa-star-o"></i></span>
                                </div>
                                <h4 class="my-2">Cras Neque</h4>
                                <h4>
                                    <span class="present_price">$56</span>
                                    <span class="prev_price">$70</span>
                                </h4>
                                <button class="btn btn-primary mt-2">Add To Cart</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card overflow-hidden">
                            <span class="ribbon ribbon__five">45%</span>
                            <div class="image-wrapper">
                                <img class="w-100" src="../../assets/images/menu/blog-image-7.jpg" alt="food menu">
                            </div>
                            <div class="card-body text-center">
                                <div class="c-pointer">
                                    <span class="icon"><i class="fa fa-star"></i></span>
                                    <span class="icon"><i class="fa fa-star"></i></span>
                                    <span class="icon"><i class="fa fa-star"></i></span>
                                    <span class="icon"><i class="fa fa-star"></i></span>
                                    <span class="icon"><i class="fa fa-star-o"></i></span>
                                </div>
                                <h4 class="my-2">Cras Neque</h4>
                                <h4>
                                    <span class="present_price">$56</span>
                                    <span class="prev_price">$70</span>
                                </h4>
                                <button class="btn btn-primary mt-2">Add To Cart</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card overflow-hidden">
                            <span class="ribbon ribbon__five">45%</span>
                            <div class="image-wrapper">
                                <img class="w-100" src="../../assets/images/menu/blog-image-5.jpg" alt="food menu">
                            </div>
                            <div class="card-body text-center">
                                <div class="c-pointer">
                                    <span class="icon"><i class="fa fa-star"></i></span>
                                    <span class="icon"><i class="fa fa-star"></i></span>
                                    <span class="icon"><i class="fa fa-star"></i></span>
                                    <span class="icon"><i class="fa fa-star"></i></span>
                                    <span class="icon"><i class="fa fa-star-o"></i></span>
                                </div>
                                <h4 class="my-2">Cras Neque</h4>
                                <h4>
                                    <span class="present_price">$56</span>
                                    <span class="prev_price">$70</span>
                                </h4>
                                <button class="btn btn-primary mt-2">Add To Cart</button>
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
    

</body>


</html>