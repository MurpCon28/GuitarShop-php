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
    $newGuitars = Guitar::newest(3);
    $popGuitars = Guitar::popular(3);
//    $newGuitar = Guitar::newestOne();
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


    <div class="theme-switch-wrapper dmButton">
        <label class="theme-switch" for="checkbox">
            <input type="checkbox" id="checkbox" />
            <div class="slider round"></div>
        </label>
        <em>Enable Dark Mode!</em>
    </div>
    <div class="container">
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <!-- Card head-->
            <div class="carousel-inner">
                <!--carousel-innner div-->
                <div class="carousel-item active">
                    <!--                    carousel-item div-->
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/xAnWpBhHkdk" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>
                <!--closing carousel-item div-->
                <div class="carousel-item">
                    <!--carousel-item div-->
                    <div class="embed-responsive embed-responsive-16by9">
                        <!--embeded div-->
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/aDuedEe2vPM" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        <!--iframe code for youtube video of trailer-->
                    </div>
                    <!--closes embeded div-->
                </div>
                <div class="carousel-item">
                    <!--carousel-item div-->
                    <div class="embed-responsive embed-responsive-16by9">
                        <!--embeded div-->
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/0ePPS_glKnE" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        <!--iframe code for youtube video of trailer-->
                    </div>
                    <!--closes embeded div-->
                </div>
                <!--closes carousel-item div-->
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>
    <div class="gapSpace">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <h4 class="guitarHeading">New Products</h4>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
            </div>
        </div>
        <?php if (count($newGuitars) == 0) { ?>
        <p>There are no guitars</p>
        <?php } else { ?>
        <div class="row"> 
            <?php foreach ($newGuitars as $guitar) { ?>
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
        <div class="gapSpace">
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <h4 class="guitarHeading">Popular Guitars</h4>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
            </div>
        </div>
        <?php if (count($popGuitars) == 0) { ?>
        <p>There are no guitars</p>
        <?php } else { ?>
        <div class="row">
            <?php foreach ($popGuitars as $guitar) { ?>
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
    <div class="gapSpace">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-7 col-sm-12 banner">
                <a href="https://www.gibson.com/Events/Winter-NAMM-2020"><img src="image/namm.PNG" class="img-fluid"></a>
                <h2 class="bannerText1">Gibson At<br><span class="biggerBannerText1">Winter NAMM<br></span>2020</h2>
                <a href="https://www.gibson.com/Events/Winter-NAMM-2020"><button class="btn bannerButton bannerButton1">Learn More</button></a>
            </div>
            <div class="col-lg-5 col-md-5 col-sm-12 banner">
                <a href="productPage.php?id=7"><img src="image/JumboBanner2.png" class="img-fluid"></a>
                <h2 class="bannerText2">Gibson Acoustic<br><span class="biggerBannerText2">Orignal Collection<br></span>50s J-45 Orignal</h2>
                <a href="productPage.php?id=7"><button class="btn bannerButton bannerButton2">Learn More</button></a>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 banner">
                <a href="https://www.fender.com/articles/gear/fenders-2020-namm-in-review"><img src="image/fender-next-2020.PNG" class="img-fluid"></a>
                <h2 class="bannerText3">25 Artists Expanding The World Of Guitars<br><span class="biggerBannerText3">Fender Next 2020<br></span></h2>
                <a href="https://www.fender.com/articles/gear/fenders-2020-namm-in-review"><button class="btn bannerButton bannerButton3">Learn More</button></a>
            </div>
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
