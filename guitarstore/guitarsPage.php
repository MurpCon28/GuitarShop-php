<?php
require_once 'utils/functions.php';
require_once 'classes/Connection.php';
require_once 'classes/Guitar.php';
require_once 'classes/Brand.php';
require_once 'classes/Guitarbody.php';
require_once 'classes/Hand.php';
require_once 'classes/User.php';
try {
    $guitars = Guitar::all();
}
catch (Exception $ex) {
    die($ex->getMessage());
}
?>

<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8">
    <title>Rock'N'Roll Shack</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/mystyle.css">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
</head>

<body>

    <?php require 'utils/toolbar.php'; ?>

    <div class="infoBanner">
        <h4 class="infoBanner-text">Explore Our Guitar Collection</h4>
    </div>

    <div class="bottomGap">
        <div class="theme-switch-wrapper dmButton">
            <label class="theme-switch" for="checkbox">
                <input type="checkbox" id="checkbox" />
                <div class="slider round"></div>
            </label>
            <em>Enable Dark Mode!</em>
        </div>
    </div>

    <div class="container bottomGap">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-4">
                <h4 class="guitarHeading">Electric Guitar</h4>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4">
                <h4 class="filter">Sort By
                    <button class="filterButton dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Choose Type
                    </button>
                    <div class="dropdown-menu filterOption" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">Highest Price</a>
                        <a class="dropdown-item" href="#">Lowest Price</a>
                        <a class="dropdown-item" href="#">Fender</a>
                        <a class="dropdown-item" href="#">Gibson</a>
                        <a class="dropdown-item" href="#">Martin</a>
                        <a class="dropdown-item" href="#">Newest</a>
                        <a class="dropdown-item" href="#">Most Popular</a>
                    </div>
                </h4>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-1">
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3">
                <?php
                if (!is_logged_in()) {
                }
                else {
                    $user = $_SESSION['user'];
            if ($user->role_id == 1) {
                $addButton = '<a href="addGuitarPage.php"><button class="filterButton">Add Guitar</button></a>';
            }
            else if ($user->role_id == 2) {
                $addButton='';
            } 
                    echo "$addButton";
                }
                ?>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="topGapSpace">
            </div>
            <?php if (count($guitars) == 0) { ?>
            <p>There are no guitars</p>
            <?php } else { ?>
            <div class="row">
                <?php foreach ($guitars as $guitar) { ?>
                <div class="col-lg-4 col-md-4 col-sm-12 gapSpace">
                    <a class="card-link-text" href="productPage.php?id=<?= $guitar->id ?>">
                        <div class="my-card">
                            <img src="<?= $guitar->image ?>" class="img-fluid card-image datebase-card-image">
                            <p class="card-text"><?= $guitar->guitar_name ?></p>
                            <p class="card-text">€<?= $guitar->price ?></p>
                        </div>
                    </a>
                </div>
                <?php } ?>
            </div>
            <?php } ?>
        </div>
    </div>
    <div class="endPageGapSpace">
    </div>

    <?php require 'utils/footer.php'; ?>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="js/javascript.js"></script>
</body>

</html>
