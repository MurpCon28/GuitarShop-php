<?php
require_once 'utils/functions.php';
require_once 'classes/Guitar.php';
require_once 'classes/User.php';

session_start();
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
        <h4 class="infoBanner-text">Checkout</h4>
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
            <div class="col-lg-8 col-md-8 col-sm-8">
                <h4 class="guitarHeading">Contact Information</h4>
                <form class="needs-validation" action="confimationPage.php" role="form" enctype="multipart/form-data" method="POST">
                    <div class="form-row">
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <label for="validationCustom01" class="checkoutLables">First Name</label>
                            <input type="text" class="form-control" placeholder="First name" required>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <label for="validationCustom02" class="checkoutLables">Last Name</label>
                            <input type="text" class="form-control" placeholder="Last name" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <label for="validationCustom03" class="checkoutLables">Email</label>
                            <input type="email" class="form-control" id="inputEmail4" placeholder="email@gmail.com" required>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <label for="validationCustom04" class="checkoutLables">Phone Number</label>
                            <input type="text" class="form-control" placeholder="eg. 08783434213" required>
                        </div>
                    </div>
                    <h4 class="guitarHeading addressInfoH4">Shipping Address</h4>
                    <div class="form-group">
                        <label for="validationCustom05" class="checkoutLables">Address</label>
                        <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St" required>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-lg-4 col-md-12 col-sm-12">
                            <label for="validationCustom06" class="checkoutLables">Country</label>
                            <select id="inputState" class="form-control" required>
                                <option value="">Choose...</option>
                                <option value="1">Ireland</option>
                                <option value="2">UK</option>
                                <option value="3">Germany</option>
                                <option value="4">France</option>
                            </select>
                        </div>
                        <div class="form-group col-lg-4 col-md-12 col-sm-12">
                            <label for="validationCustom06" class="checkoutLables">County/State</label>
                            <select id="inputState" class="form-control" required>
                                <option value="">Choose...</option>
                                <option value="1">Antrim</option>
                                <option value="2">Armagh</option>
                                <option value="3">Carlow</option>
                                <option value="4">Cavan</option>
                                <option value="5">Clare</option>
                                <option value="6">Cork</option>
                                <option value="7">Derry</option>
                                <option value="8">Donegal</option>
                                <option value="9">Down</option>
                                <option value="10">Dublin</option>
                                <option value="11">Fermanagh</option>
                                <option value="12">Galway</option>
                                <option value="13">Kerry</option>
                                <option value="14">Kildare</option>
                                <option value="15">Kilkenny</option>
                                <option value="16">Laois</option>
                                <option value="17">Leitrim</option>
                                <option value="18">Limerick</option>
                                <option value="19">Longford</option>
                                <option value="20">Louth</option>
                                <option value="21">Mayo</option>
                                <option value="22">Meath</option>
                                <option value="23">Monaghan</option>
                                <option value="24">Roscommon</option>
                                <option value="25">Sligo</option>
                                <option value="26">Tipperary</option>
                                <option value="27">Tyrone</option>
                                <option value="28">Waterford</option>
                                <option value="29">Westmeath</option>
                                <option value="30">Wexford</option>
                                <option value="31">Wicklow</option>
                                <option value="32">London</option>
                                <option value="33">Manchester</option>
                                <option value="34">Bristol</option>
                                <option value="35">Liverpool</option>
                                <option value="36">Berlin</option>
                                <option value="37">Paris</option>
                            </select>
                        </div>
                        <div class="form-group col-lg-4 col-md-12 col-sm-12">
                            <label for="validationCustom07" class="checkoutLables">Town/City</label>
                            <input type="text" class="form-control" id="inputCity" placeholder="eg. Greystones" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-8 col-md-8 col-sm-8 addressInfoH4">
                            <a href="guitarsPage.php"><button type="button" class="local-shop-buttonCheckout">Return Shopping</button></a>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 addressInfoH4">
                            <button type="submit" class="add-to-cart-buttonCheckout">Confim Purchase</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4">
                <h4 class="guitarHeading">Cart Summary</h4>
                <div class="row">
                        <?php
                        $items = $_SESSION['cart'];
                        $cartitems = explode(",", $items);
                        
                        
                        
                        ?>
                        <?php
                        $total = 0;
                        $i = 1;
                        foreach ($cartitems as $key => $id) {
                                if($id != ''){

                                $guitar = Guitar::find($id);

                                ?>
                    <div class="col-lg-4 col-md-12 col-sm-12 gapSpace">
                        <div class="my-card">
                            <a href="">
                                <img src="<?= $guitar->image ?>" class="img-fluid checkout-card-image">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-12 col-sm-12 gapSpace">
                        <p class="guitarDes"><?php echo $guitar->guitar_name ?> €<?php echo $guitar->price; ?></p>
                        <div class="col-6">
                            <a href="del_cart.php?remove=<?php echo $key; ?>"><button class="removeButton">Remove</button></a>
                        </div>
                    </div>
                        <?php
                                $total = $total + $guitar->price;
                                $i++;
                            }
                        }
                        ?>
                    <h4 class="guitarPricingCheckout">Total : €<?php echo $total; ?></h4>
                </div>
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
