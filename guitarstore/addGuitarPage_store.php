<?php
require_once 'classes/Guitar.php';
require_once 'classes/Hand.php';
require_once 'classes/Brand.php';
require_once 'classes/GuitarBody.php';
require_once 'classes/Gump.php';
require_once 'utils/functions.php';

try {
    $validator = new GUMP();

    $_POST = $validator->sanitize($_POST);

    $validation_rules = array(
        'guitar' => 'required|min_len,4|max_len,200',
        'price' => 'required|float|min_numeric,0',
        'handedness' => 'required|integer|min_numeric,1',
        'quote' => 'required|min_len,7|max_len,125',
        'description' => 'required|min_len,70|max_len,2000',
        'brand' => 'required|integer|min_numeric,1',
        'body' => 'required|integer|min_numeric,1',
        'colour' => 'required|min_len,3|max_len,90',
        'material' => 'required|min_len,3|max_len,200',
        'frets' => 'required|numeric|min_numeric,0'
    );
    $filter_rules = array(
        'guitar' => 'trim|sanitize_string',
        'price' => 'trim',
        'handedness' => 'trim',
        'quote' => 'trim|sanitize_string',
        'description' => 'trim|sanitize_string',
        'brand' => 'trim',
        'body' => 'trim',
        'colour' => 'trim|sanitize_string',
        'material' => 'trim|sanitize_string',
        'frets' => 'trim'
    );

    $validator->validation_rules($validation_rules);
    $validator->filter_rules($filter_rules);

    $validated_data = $validator->run($_POST);

    if($validated_data === false) {
        $errors = $validator->get_errors_array();
    }
    else {
        $errors = array();
        $handedness = $validated_data['handedness'];
        $handedness = Handed::find($handedness);
        if ($handedness === false) {
            $errors['handedness'] = "Invalid hand";
        }
        
        $brand = $validated_data['brand'];
        $brand = Brand::find($brand);
        if ($brand === false) {
            $errors['brand'] = "Invalid brand";
        }
        
        $body = $validated_data['body'];
        $guitarbody = Guitarbody::find($body);
        if ($guitarbody === false) {
            $errors['body'] = "Invalid guitar body";
        }
        
        try {
            $imageGuitarFile = imageFileUpload('image', true, 1000000, array('jpg', 'jpeg', 'png', 'gif'));
        }
        catch (Exception $e) {
            $errors['image'] = $e->getMessage();
        }
    }

    if (!empty($errors)) {
        var_dump($errors);
        throw new Exception("There were errors. Please fix them.");
    }

    $guitar = new Guitar();
    $guitar->guitar_name = $validated_data['guitar'];
    $guitar->price = $validated_data['price'];
    $guitar->handedness = $validated_data['handedness'];
    $guitar->guitar_quote = $validated_data['quote'];
    $guitar->description = $validated_data['description'];
    $guitar->image = $imageGuitarFile;
    $guitar->brand = $validated_data['brand'];
    $guitar->guitar_body = $validated_data['body'];
    $guitar->colour = $validated_data['colour'];
    $guitar->material_type = $validated_data['material'];
    $guitar->num_frets = $validated_data['frets'];
    $guitar->save();

    header("Location: adminPage.php");
}
catch (Exception $ex) {
//echo $ex;
    require 'addGuitarPage.php';
}
?>
