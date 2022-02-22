<?php
//require_once 'utils/functions.php';
//require_once 'classes/User.php';
//require_once 'classes/Gump.php';

session_start();

//$_SESSION['user'] = $user;

if (isset($_SESSION['cart']) & !empty($_SESSION['cart'])) {
    $items = $_SESSION['cart'];
    $cartitems = explode(",", $items);
    $items .= "," . $_GET['id'];
    $_SESSION['cart'] = $items;
    header('location: cartReview.php?status=success');
} else {
    $items = $_GET['id'];
    $_SESSION['cart'] = $items;
    header('location: cartReview.php?status=success');
}

$items = $_SESSION['cart'];
$cartitems = explode(",", $items);
if(in_array($_GET['id'], $cartitems)){
	header('location: cartReview.php?status=incart');
}else{
	$items .= "," . $_GET['id'];
	$_SESSION['cart'] = $items;
	header('location: cartReview.php?status=success');
	
}
?>