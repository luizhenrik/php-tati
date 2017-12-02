<?php
header('Content-Type: application/json');
// Init SESSION
session_start();

// Includes Classes
include("../system/class.products.php");
include("../system/class.cart.php");

if(isset($_GET['id'])){
    // Declare Classes
    $products = new Products("root", "", "loja");
    $cart = new Cart();
    $cart->product_exists($_GET['id']);
    
    // Trazer soma total de produtos no carrinho 
    $products->getSumTotalPricesInArray(implode(",", array_keys($_SESSION['test'])));

    // Trazer Produtos do carrinho
    $products->getAllInArray(implode(",", array_keys($_SESSION['test'])));
}else{
    echo 'ERRo';
}

session_destroy();
