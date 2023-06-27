<header class="navbar navbar-expand-md navbar-light fixed-top bg-light shadow-sm mb-auto">
    <div class="container-fluid mx-4">
        <a href=" <?= $_SERVER['PHP_SELF'] ?> ">
            <img src="view/img/cec_logo.jpg" width="300" class="me-2" height="300" alt="CEC Logo" style="width: 20%; height: auto;">
        </a>
        <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar navbar-expand" id="navbarCollapse">
            <ul class="navbar-nav ms-auto ">

                    <a class="btn btn-dark w-75 me-4 rounded-pill" style="display: flex;align-items: center;white-space: nowrap;justify-content: center" href="<?= $_SERVER['PHP_SELF'] ?> ">Home</a>

                    <a href="view/history.php" class="btn btn-dark w-75 me-4 rounded-pill" style="display: flex;align-items: center;white-space: nowrap;justify-content: center">Orders</a>

                <?php if (!isset($_SESSION['user_id'])): ?>
                    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post" id="register" style="display: flex">
                        <input type="hidden" name="action" value="register_page">
                        <a class="btn btn-dark w-75 me-4 rounded-pill" style="display: flex;align-items: center;white-space: nowrap;" href="javascript:$('#register').submit(); ">SignUp</a>
                    </form>

                    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post" id="login" style="display: flex">
                        <input type="hidden" name="action" value="login_page">
                        <a class="btn btn-dark w-75 me-4 rounded-pill" style="display: flex;align-items: center;white-space: nowrap;" href="javascript:$('#login').submit(); " >LogIn</a>
                    </form>
                <?php else: ?>
<!--                    <span class="btn btn-dark w-75 me-4 rounded-pill" style="display: flex;align-items: center;white-space: nowrap;"><i class="fas fa-user-circle" style="font-size:25px"></i>&nbsp;Profile</span>-->


                    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post" id="logout" style="display: flex">
                        <input type="hidden" name="action" value="logout">
                        <a class="btn btn-dark w-75 me-4 rounded-pill" style="display: flex;align-items: center;white-space: nowrap;" href="javascript:$('#logout').submit(); ">LogOut</a>
                    </form>
                    <?php if(isset($_SESSION['tokens'])): ?>
                    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                        <button type="submit" class="btn btn-primary">
                            Tokens <span class="badge badge-light" style="background-color: brown;"><?= $_SESSION['tokens'] ?></span>
                            <input type="hidden" name="action" value="add_tokens">
                        </button>
                    </form>
                    <?php else: ?>
                        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post" id="bills" style="display: flex">
                            <input type="hidden" name="action" value="bills">
                            <a class="btn btn-dark w-75 me-4 rounded-pill" style="display: flex;align-items: center;white-space: nowrap;" href="javascript:$('#bills').submit(); ">Bills</a>
                        </form>
                    <?php endif ?>
                <?php endif ?>
            </ul>
        </div>
    </div>
</header>