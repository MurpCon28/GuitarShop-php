<?php
require_once 'utils/functions.php';
require_once 'classes/Guitar.php';
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
        <h4 class="infoBanner-text">Admin</h4>
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
            <div class="col-lg-10 col-md-10 col-sm-10">
                <h4 class="guitarHeading">Product List</h4>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2">
                <a href="addGuitarPage.php"><button class="filterButton">Add Guitar</button></a>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <table class="table table-striped">
                    <thead class="thead">
                        <tr>
                            <th scope="col">Guitar ID</th>
                            <th scope="col">Guitar Name</th>
                            <th scope="col">Price</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($guitars as $guitar) { ?>
                        <tr data-id="<?= $guitar->id ?>">
                            <th scope="row"><?= $guitar->id ?></th>
                            <td><a class="tableLink" href="showGuitarPage.php?id=<?= $guitar->id ?>"><?= $guitar->guitar_name ?></a></td>
                            <td>€<?= $guitar->price ?></td>
                            <td></td>
                            <td><a href="editGuitarPage.php?id=<?= $guitar->id ?>"><button class="adminEditButton">Edit</button></a></td>
                            <td><a href="guitar_delete.php?id=<?= $guitar->id ?>"><button class="adminDeleteButton">Delete</button></a></td>
                            <?php } ?>
                        </tr>
                    </tbody>
                </table>
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
