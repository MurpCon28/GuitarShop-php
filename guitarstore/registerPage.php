<?php
require_once 'utils/functions.php';
require_once 'classes/Guitar.php';
require_once 'classes/User.php';
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
        <h4 class="infoBanner-text">Register</h4>
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
                <form action="register.php" method="POST" class="needs-validation">
                    <div class="form-row">
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <label for="validationCustom01" class="checkoutLables">First Name</label>
                            <input type="text" class="form-control" placeholder="First name" required id="first_name" name="first_name" value="<?= old('first_name') ?>">
                            <div class="col-lg-6 col-md-12 col-sm-12 error">
                                <?php error('first_name'); ?>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <label for="validationCustom02" class="checkoutLables">Last Name</label>
                            <input type="text" class="form-control" placeholder="Last name" required id="last_name" name="last_name" value="<?= old('last_name') ?>">
                            <div class="col-lg-6 col-md-12 col-sm-12 error">
                                <?php error('last_name'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <label for="validationCustom03" class="checkoutLables">Email</label>
                            <input type="email" class="form-control" id="inputEmail4" placeholder="email@gmail.com" required id="email" name="email" value="<?= old('email') ?>">
                            <div class="col-lg-6 col-md-12 col-sm-12 error">
                                <?php error('email'); ?>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <label for="validationCustom04" class="checkoutLables">Phone Number</label>
                            <input type="text" class="form-control" placeholder="eg. 08783434213" required id="phone" name="phone" value="<?= old('phone') ?>">
                            <div class="col-lg-6 col-md-12 col-sm-12 error">
                                <?php error('phone'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <label class="checkoutLables" for="validationCustom05 password">Password</label>
                            <input type="password" class="form-control" id="password" placeholder="Enter password" name="password" required value="">
                            <div class="col-lg-6 col-md-12 col-sm-12 error">
                                <?php error('password'); ?>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <label for="validationCustom06 password_confirmation" class="checkoutLables">Password Confirmation</label>
                            <input type="password" class="form-control" id="password_confirmation" placeholder="Confirm password" name="password_confirmation" value="" required>
                            <div class="col-lg-6 col-md-12 col-sm-12 error">
                                <?php error('password_confirmation'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-11 col-md-11 col-sm-11">
                            <!--                            <a href="index.php"><button type="button" class="cancelButton">Cancel</button></a>-->
                        </div>
                        <div class="col-lg-1 col-md-1 col-sm-1"><input type="submit" class="createUserButton" value="Create User">
                        </div>
                    </div>
                </form>
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
