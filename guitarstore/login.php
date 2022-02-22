<?php
require_once 'utils/functions.php';
require_once 'classes/User.php';
require_once 'classes/Gump.php';

start_session();

try {
    $validator = new GUMP();

    $_POST = $validator->sanitize($_POST);

    $validation_rules = array(
        'email' => 'required|valid_email',
	    'password' => 'required|min_len,6'
    );
    $filter_rules = array(
    	'email' => 'trim|sanitize_email',
    	'password' => 'trim'
    );

    $validator->validation_rules($validation_rules);
    $validator->filter_rules($filter_rules);

    $validated_data = $validator->run($_POST);

    if($validated_data === false) {
        $errors = $validator->get_errors_array();
    }
    else {
        $errors = array();

        $email = $validated_data['email'];
        $password = $validated_data['password'];

        $user = User::findByEmail($email);
        if ($user === false) {
            $errors['email'] = "Email not valid";
        }
        else {
            $hash = $user->password;
            if (!password_verify($password, $hash)) {
                $errors['password'] = "Password not valid";
            }
        }
    }

    if (!empty($errors)) {
        throw new Exception("There were errors. Please fix them.");
    }

    if ($user->role_id == 1) {
        $home = 'adminPage.php';
    }
    else if ($user->role_id == 2) {
        $home = 'index.php';
    }

    $_SESSION['user'] = $user;

    header('Location: ' . $home);
}
catch (Exception $ex) {
    require 'loginPage.php';
}
?>
