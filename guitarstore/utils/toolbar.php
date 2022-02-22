<nav class="navbar navbar-expand-lg navbar bg">
    <div class="container-fluid">
        <div class="container">
            <a class="navbar-brand" href="index.php"><img src="image/logo.png"></a>
            <button class="navbar-toggler menuIcon" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"><p>-<br>-<br>-</p></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">

                    <?php
        require_once 'utils/functions.php';
        
        if (!is_logged_in()) {
            
            echo '<li class="nav-item active">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>';
                    echo '<li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="guitarsPage.php" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Guitars
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="guitarsPage.php">All Guitars</a>
                            <a class="dropdown-item" href="guitarsPage.php">Acoustic</a>
                            <a class="dropdown-item" href="guitarsPage.php">Gibson</a>
                            <a class="dropdown-item" href="guitarsPage.php">Fender</a>
                            <a class="dropdown-item" href="guitarsPage.php">Martin</a>
                        </div>
                    </li>';
                    echo '<li class="nav-item">
                        <a class="nav-link" href="loginPage.php">Login</a>
                    </li>';
                    echo '<li class="nav-item">
                        <a class="nav-link" href="registerPage.php">Register</a>
                    </li>';
                    echo '<li class="nav-item">
                        <a data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1"><i class="nav-link fas fa-cart-plus"></i></a>
                        <!--                            <a class="nav-link" href="checkout.html"><img class="shoppingCart" src="image/shoppingcart.png"></a>-->
                        <div class="row">
                            <div class="col">
                                <div class="collapse multi-collapse" id="multiCollapseExample1">
                                    <div class="card card-body">
                    <p class="cartText">1 item in<br>shopping cart</p>
                    <p class="cartText">1968 Les Paul<br>Custom Reissue<br>€5800</p>
                    <p class="cartText">Total:€5800</p>
                    <a href="checkout.php"><button type="submit" class="add-to-cart-buttonCheckout">Go To Checkout</button></a>
            </div>
        </div>
    </div>
    </div>
    </li>';
    }
    else {
    $user = $_SESSION['user'];
    if ($user->role_id == 1) {
    $home = 'adminPage.php';
    }
    else if ($user->role_id == 2) {
    $home = 'cartReview.php';
    }

    echo '<li class="nav-item active">
        <a class="nav-link" href="index.php">Home</a>
    </li>';
    echo '<li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="guitarsPage.php" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Guitars
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="guitarsPage.php">All Guitars</a>
            <a class="dropdown-item" href="guitarsPage.php">Acoustic</a>
            <a class="dropdown-item" href="guitarsPage.php">Gibson</a>
            <a class="dropdown-item" href="guitarsPage.php">Fender</a>
            <a class="dropdown-item" href="guitarsPage.php">Martin</a>
        </div>
    </li>';
    echo '<li class="nav-item">
        <a class="nav-link" href="' . $home. '">Profile</a>
    </li>';
    echo '<li class="nav-item">
        <a class="nav-link" href="logout.php">Logout</a>
    </li>';
    echo '<li class="nav-item">
        <a data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1"><i class="nav-link fas fa-cart-plus"></i></a>
        <!--                            <a class="nav-link" href="checkout.html"><img class="shoppingCart" src="image/shoppingcart.png"></a>-->
        <div class="row">
            <div class="col">
                <div class="collapse multi-collapse" id="multiCollapseExample1">
                    <div class="card card-body">
                        <p class="cartText">1 item in<br>shopping cart</p>
                    <p class="cartText">1968 Les Paul<br>Custom Reissue<br>€5800</p>
                    <p class="cartText">Total:€5800</p>
                    <a href="checkout.php"><button type="submit" class="add-to-cart-buttonCheckout">Go To Checkout</button></a>
                    </div>
                </div>
            </div>
        </div>
    </li>';
    }
    ?>
                </ul>
            </div>
        </div>
    </div>
</nav>
