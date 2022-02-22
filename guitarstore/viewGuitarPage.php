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
}
catch (Exception $ex) {
    die($ex->getMessage());
}
?>
<!DOCTYPE html>
<html>

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
        <h4 class="infoBanner-text">Admin - View Guitar</h4>
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
                <h4 class="guitarHeading">Guitar Details</h4>
                <table class="table table-striped" id="table-guitar">
                    <tbody>
                        <tr>
                            <td>Guitar Name</td>
                            <td><?= $guitar->guitar_name ?></td>
                        </tr>
                        <tr>
                            <td>Price</td>
                            <td>€<?= $guitar->price ?></td>
                        </tr>
                        <tr>
                            <td>Handedness</td>
                            <td><?= Handed::find($guitar->handedness)->hand ?></td>
                        </tr>
                        <tr>
                            <td>Guitar Quote</td>
                            <td><?= $guitar->guitar_quote ?></td>
                        </tr>
                        <tr>
                            <td>Description</td>
                            <td><?= $guitar->description ?></td>
                        </tr>
                        <tr>
                            <td>Guitar image</td>
                            <td><img class="adminImage" src="<?= $guitar->image ?>" height="400px" /></td>
                        </tr>
                        <tr>
                            <td>Brand</td>
                            <td><?= Brand::find($guitar->brand)->name ?></td>
                        </tr>
                        <tr>
                            <td>Guitar Body</td>
                            <td><?= Guitarbody::find($guitar->guitar_body)->body ?></td>
                        </tr>
                        <tr>
                            <td>Colour</td>
                            <td><?= $guitar->colour ?></td>
                        </tr>
                        <tr>
                            <td>Material Type</td>
                            <td><?= $guitar->material_type ?></td>
                        </tr>
                        <tr>
                            <td>Number of Frets</td>
                            <td><?= $guitar->num_frets ?></td>
                        </tr>
                    </tbody>
                </table>
                <?php if ($user-> role_id !=2) { ?>
                <a href="adminPage.php"><button class="cancelButton">Cancel</button></a>
                <a href="editGuitarPage.php?id=<?= $guitar->id ?>"><button class="adminEditButton">Edit</button></a>
                <a href="guitar_delete.php?id=<?= $guitar->id ?>"><button class="adminDeleteButton">Delete</button></a>
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
