<?php
header('Content-Type: application/json');
// Init SESSION
session_start();

// Includes Classes
include("../system/class.products.php");
include("../system/class.cart.php");

// Declare Classes
$products = new Products("root", "", "loja");
$cart = new Cart();
$cart->product_exists($_GET['id']);

// session_destroy();