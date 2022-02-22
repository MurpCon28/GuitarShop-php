<?php
require_once 'utils/functions.php';
require_once 'classes/User.php';
require_once 'classes/Guitar.php';
require_once 'classes/Hand.php';
require_once 'classes/GuitarBody.php';
require_once 'classes/Brand.php';
require_once 'classes/Gump.php';
try {
    $handedness = Handed::all();
    $guitarbodys = Guitarbody::all();
    $brands = Brand::all();
}
catch (Exception $ex) {
    die($ex->getMessage());
}

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

        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
//            echo 'GET';
            $_GET = $validator->sanitize($_GET);
            $validated_data = $validator->run($_GET);
        } else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//            echo 'POST';
            $_POST = $validator->sanitize($_POST);
            $validated_data = $validator->run($_POST);
        }

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
        <h4 class="infoBanner-text">Admin - Edit Guitar</h4>
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
                <form method="POST" class="needs-validation" action="guitar_update.php" role="form" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $guitar->id ?>" />
                    <h4 class="guitarHeading addressInfoH4">General Information</h4>
                    <div class="form-row">
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <label for="validationCustom01" class="checkoutLables">Guitar Name</label>
                            <input type="text" class="form-control" placeholder="Les Paul Standard '50s" required id="guitar" name="guitar" value="<?= old('guitar', $guitar->guitar_name) ?>">

                            <div class="col-lg-6 col-md-12 col-sm-12 error">
                                <?php error('guitar'); ?>
                            </div>

                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <label for="validationCustom02" class="checkoutLables">Price</label>
                            <input type="text" class="form-control" placeholder="eg €5,000" required id="price" name="price" value="<?= old('price', $guitar->price) ?>">

                            <div class="col-lg-6 col-md-12 col-sm-12 error">
                                <?php error('price'); ?>
                            </div>

                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <label for="validationCustom03" class="checkoutLables">Handedness</label>
                            <select id="inputHand handedness" class="form-control" required name="handedness">
                                <option value="">Choose...</option>
                                <?php foreach ($handedness as $handedness) { ?>
                                <option value="<?= $handedness->id ?>" <?php if($handedness->id == $guitar->handedness) echo 'selected'?>> <?= $handedness->hand ?> </option>
                                <?php } ?>
                            </select>

                            <div class="col-lg-6 col-md-12 col-sm-12 error">
                                <?php error('handedness'); ?>
                            </div>

                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <label for="validationCustom04" class="checkoutLables">Guitar Quote</label>
                            <input type="text" class="form-control" placeholder="Beauty...and a Beast!" required id="quote" name="quote" value="<?= old('quote', $guitar->guitar_quote) ?>">

                            <div class="col-lg-6 col-md-12 col-sm-12 error">
                                <?php error('quote'); ?>
                            </div>

                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <label for="validationCustom05" class="checkoutLables">Description</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1 description" rows="12" required name="description" value="<?= old('description', $guitar->description) ?>"><?php echo ($guitar->description);?></textarea>

                            <div class="col-lg-12 col-md-12 col-sm-12 error">
                                <?php error('description'); ?>
                            </div>

                        </div>
                    </div>
                    <div class="form-group imagePadTop">
                        <label class="checkoutLables" for="exampleFormControlFile1 validationCustom06">Guitar image</label>
                        <img src="<?= $guitar->image ?>" height="400px" />
                        <input type="file" class="form-control-file" id="exampleFormControlFile1 image" required name="image" value="">

                        <div class="col-lg-12 col-md-12 col-sm-12 error">
                            <?php error('image'); ?>
                        </div>

                    </div>
                    <h4 class="guitarHeading addressInfoH4">Specifications</h4>
                    <div class="form-row">
                        <div class="form-group col-lg-6 col-md-12 col-sm-12">
                            <label for="validationCustom07" class="checkoutLables">Brand Type</label>
                            <select id="inputBrandType brand" class="form-control" required name="brand">
                                <option value="">Choose...</option>
                                <?php foreach ($brands as $brand) { ?>
                                <option value="<?= $brand->id ?>" <?php if($brand->id == $guitar->brand) echo 'selected'?>> <?= $brand->name ?> </option>
                                <?php } ?>
                            </select>

                            <div class="col-lg-6 col-md-12 col-sm-12 error">
                                <?php error('brand'); ?>
                            </div>

                        </div>
                        <div class="form-group col-lg-6 col-md-12 col-sm-12">
                            <label for="validationCustom08" class="checkoutLables">Body Type</label>
                            <select id="inputBodyType body" class="form-control" required name="body">
                                <option value="">Choose...</option>
                                <?php foreach ($guitarbodys as $guitarbody) { ?>
                                <option value="<?= $guitarbody->id ?>" <?php if($guitarbody->id == $guitar->guitar_body) echo 'selected'?>> <?= $guitarbody->body ?> </option>
                                <?php } ?>
                            </select>

                            <div class="col-lg-6 col-md-12 col-sm-12 error">
                                <?php error('body'); ?>
                            </div>

                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-lg-4 col-md-12 col-sm-12">
                            <label for="validationCustom09" class="checkoutLables">Colour</label>
                            <input type="text" class="form-control" placeholder="Gold" required id="colour" name="colour" value="<?= old('colour', $guitar->colour) ?>">

                            <div class="col-lg-4 col-md-12 col-sm-12 error">
                                <?php error('colour'); ?>
                            </div>

                        </div>
                        <div class="form-group col-lg-4 col-md-12 col-sm-12">
                            <label for="validationCustom010" class="checkoutLables">Material Type</label>
                            <input type="text" class="form-control" placeholder="Solid Mahogany" required id="material" name="material" value="<?= old('material', $guitar->material_type) ?>">

                            <div class="col-lg-4 col-md-12 col-sm-12 error">
                                <?php error('material'); ?>
                            </div>

                        </div>
                        <div class="form-group col-lg-4 col-md-12 col-sm-12">
                            <label for="validationCustom011" class="checkoutLables">Number Of Frets</label>
                            <input type="text" class="form-control" placeholder="24" required id="frets" name="frets" value="<?= old('frets', $guitar->num_frets) ?>">

                            <div class="col-lg-4 col-md-12 col-sm-12 error">
                                <?php error('frets'); ?>
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-10 col-md-10 col-sm-10 addressInfoH4">
                            <a href="adminPage.php"><input type="button" class="cancelButton" value="Cancel"></a>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-2 addressInfoH4">
                            <input type="submit" class="createUserButton" value="Edit Guitar">
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
