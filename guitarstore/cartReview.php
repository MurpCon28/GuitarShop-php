<?php
require_once 'classes/Guitar.php';
require_once 'classes/Hand.php';
require_once 'classes/Brand.php';
require_once 'classes/GuitarBody.php';
require_once 'classes/Gump.php';
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
        <h4 class="infoBanner-text">Cart List</h4>
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
            <div class="col-lg-12 col-md-12 col-sm-12">
                <table class="table table-striped" id="table-guitar">
                    <tbody>
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
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $guitar->guitar_name ?></td>
                            <td><img class="adminImage" src="<?= $guitar->image ?>" height="250px" /></td>
                            <td>€<?php echo $guitar->price; ?></td>
                            <td><a href="del_cart.php?remove=<?php echo $key; ?>"><button class="removeButton">Remove</button></a></td>
                        </tr>
                        <?php
                                $total = $total + $guitar->price;
                                $i++;
                            }
                        }
                        ?>
                        <tr>
                            <td>Total Price</td>
                            <td>€<?php echo $total; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-8 addressInfoH4">
                    <a href="guitarsPage.php"><button class="local-shop-buttonCheckout">Continue Shopping</button></a>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 addressInfoH4"><a href="checkout.php"><button class="add-to-cart-buttonCheckout">Checkout</button></a>
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
