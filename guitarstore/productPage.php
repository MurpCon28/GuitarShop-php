<?php
require_once 'classes/Guitar.php';
require_once 'classes/Hand.php';
require_once 'classes/Brand.php';
require_once 'classes/GuitarBody.php';
require_once 'classes/Gump.php';
require_once 'classes/User.php';

try {
    $validator = new GUMP();

    $_GET = $validator->sanitize($_GET);

    $validation_rules = array(
        'id' => 'required|integer|min_numeric,1'
    );
    $filter_rules = array(
    	'id' => 'trim|sanitize_numbers'
    );

    $validator->validation_rules($validation_rules);
    $validator->filter_rules($filter_rules);

    $validated_data = $validator->run($_GET);

    if($validated_data === false) {
        $errors = $validator->get_errors_array();
        throw new Exception("Invalid guitar id: " . $errors['id']);
    }

    $id = $validated_data['id'];
    $guitar = Guitar::find($id);
    
    $guitars = Guitar::all();
    $popGuitars = Guitar::popular(4);
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
        <h4 class="infoBanner-text"><?= $guitar->guitar_name ?></h4>
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

    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-12">
                <!--                <img src="image/1968-Les-Paul-Custom--Reissue.png" class="img-fluid">-->
                <img src="<?= $guitar->image ?>" class="img-product-page">
            </div>
            <div class="col-lg-8 col-md-8 col-sm-12">
                <h4 class="guitarHeading"><?= $guitar->guitar_quote ?></h4>
                <p class="guitarDes"><?= $guitar->description ?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-12">
            </div>
            <div class="col-lg-8 col-md-8 col-sm-12 underline">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-12">
            </div>
            <div class="col-lg-8 col-md-8 col-sm-12">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <h4 class="guitarHeading">Handedness</h4>
                        <button class="handButton"><?= Handed::find($guitar->handedness)->hand ?></button>
                    </div>
                    <div class="ccol-lg-6 col-md-6 col-sm-12">
                        <h4 class="guitarHeading">Specifications</h4>
                        <div class="row">
                            <div class="col-lg-7 col-md-7 col-sm-7">
                                <p class="specDes">Body Type</p>
                                <p class="specDes">Colour</p>
                                <p class="specDes">Material</p>
                                <p class="specDes">Number of Frets</p>
                            </div>
                            <div class="col-lg-5 col-md-5 col-sm-5">
                                <p class="guitarDes"><?= Guitarbody::find($guitar->guitar_body)->body ?></p>
                                <p class="guitarDes"><?= $guitar->colour ?></p>
                                <p class="guitarDes"><?= $guitar->material_type ?></p>
                                <p class="guitarDes"><?= $guitar->num_frets ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-12">
            </div>
            <div class="col-lg-8 col-md-8 col-sm-12 underline">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-1 col-sm-0">
            </div>
            <div class="col-lg-1 col-md-1 col-sm-0">
            </div>
            <div class="col-lg-7 col-md-10 col-sm-12">
                <h4 class="guitarPricing middle">€<?= $guitar->price ?></h4>
                <a href="https://www.gibson.com"><button class="local-shop-button">Local Shop</button></a><a href="add_to_cart.php?id=<?= $guitar->id ?>"><button class="add-to-cart-button">Add to Cart</button></a>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-12">
            </div>
            <div class="col-lg-8 col-md-8 col-sm-12 underline">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <h4 class="guitarHeading">You Might Also Like</h4>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="row">
                    <?php if (count($popGuitars) == 0) { ?>
                    <p>There are no guitars</p>
                    <?php } else { ?>
                    <?php foreach ($popGuitars as $guitar) { ?>
                    <div class="col-lg-3 col-md-12 col-sm-12 gapSpace">
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
