<?php
require_once 'utils/functions.php';
require_once 'classes/User.php';
require_once 'classes/Gump.php';

start_session();

try {
    $validator = new GUMP();

    $sanitized_data = $validator->sanitize($_POST);

    $validation_rules = array(
        'first_name' => 'required|min_len,2|max_len,100',
        'last_name' => 'required|min_len,2|max_len,100',
        'email' => 'required|valid_email',
        'phone' => 'required|min_len,10|max_len,16',
	    'password' => 'required|min_len,4',
        'password_confirmation' => 'required|min_len,4'
    );
    $filter_rules = array(
    	'first_name' => 'trim|sanitize_string',
        'last_name' => 'trim|sanitize_string',
        'email' => 'trim|sanitize_email',
        'phone' => 'trim|sanitize_string',
    	'password' => 'trim',
        'password_confirmation' => 'trim'
    );

    $validator->validation_rules($validation_rules);
    $validator->filter_rules($filter_rules);

    $validated_data = $validator->run($sanitized_data);

    if ($validated_data === false) {
        $errors = $validator->get_errors_array();
    }
    else {
        $errors = array();

        $first_name = $validated_data['first_name'];
        $last_name = $validated_data['last_name'];
        $email = $validated_data['email'];
        $phone = $validated_data['phone'];
        $password = $validated_data['password'];
        $password_confirmation = $validated_data['password_confirmation'];

        if ($password !== $password_confirmation) {
            $errors['password_confirmation'] = "Password confirmation does not match";
        }
        else {
            $user = User::findByEmail($email);
            if ($user !== false) {
                $errors['email'] = "Email already registered";
            }
            else {
                $user = new User();
                $user->first_name = $first_name;
                $user->last_name = $last_name;
                $user->email = $email;
                $user->phone = $phone;
                $user->password = password_hash($password, PASSWORD_DEFAULT);
                $user->role_id = 2;
                $user->save();
            }
        }
    }

    if (!empty($errors)) {
        throw new Exception("There were errors. Please fix them.");
    }

    $home = 'index.php';

    $_SESSION['user'] = $user;

    header('Location: ' . $home);
    
    header("Location: index.php");
}
catch (Exception $ex) {
    require 'registerPage.php';
}
?>
