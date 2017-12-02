<?php
header('Content-Type: application/json');

// Variables
$handler = isset($_GET['handler']);

// Init SESSION
session_start();

// Includes Classes
include("../system/class.cart.php");

// Declare Classes
$cart = new Cart();

if(!$handler){
    die(json_encode(array('success' => 0, 'message' => "handler da requisição é Obrigatória")));
}

// Qdo queremos zerar o carrinho
if($_GET['handler'] == "truncate_cart"){
    $cart->truncate_cart();
    echo json_encode(array('success' => 1, 'message' => "Produto deletado com sucesso"));
}
