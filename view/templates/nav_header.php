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
        <div class="navbar-collapse collapse" id="navbarCollapse">
            <ul class="navbar-nav ms-auto ">
                <li class="nav-item ">
                    <a class="nav-link px-2 text-dark" href="<?= $_SERVER['PHP_SELF'] ?> ">Home</a>
                </li>
                <li class="nav-item">
                    <a href="#food_menu" class="nav-link px-2 text-dark">Menu List</a>
                </li>
                <?php if (!isset($_SESSION['user_id'])): ?>
                    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post" id="register" style="display: flex">
                        <input type="hidden" name="action" value="register_page">
                        <a class="btn btn-dark btn-sm me-2" href="javascript:$('#register').submit(); ">Sign Up</a>
                    </form>

                    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post" id="login" style="display: flex">
                        <input type="hidden" name="action" value="login_page">
                        <a class="btn btn-dark btn-sm" href="javascript:$('#login').submit(); " >Log In</a>
                    </form>
                <?php else: ?>
                    <span style="display: flex;align-items: center;">&nbsp;&nbsp;&nbsp;&nbsp;Welcome, <?= $_SESSION['name'] ?>&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <?php if(isset($_SESSION['tokens'])): ?>
                        <button type="button" class="btn btn-primary">
                            Tokens <span class="badge badge-light" style="background-color: brown;"><?= $_SESSION['tokens'] ?></span>
                        </button>&nbsp;&nbsp;&nbsp;&nbsp;
                    <?php endif ?>
                    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post" id="logout" style="display: flex">
                        <input type="hidden" name="action" value="logout">
                        <a class="btn btn-dark btn-sm me-2" href="javascript:$('#logout').submit(); ">Log Out</a>
                    </form>
                <?php endif ?>
            </ul>
        </div>
    </div>
</header>