<?php
header('Content-Type: application/json');

// Variables
$id_product = isset($_GET['id']);
$handler = isset($_GET['handler']);

// Init SESSION
session_start();

// Includes Classes
include("../system/class.products.php");
include("../system/class.cart.php");

// Declare Classes
$products = new Products("root", "", "loja");
$cart = new Cart();

if(!isset($id_product)){
    die(json_encode(array('success' => 0, 'message' => "id do produto Obrigatório")));
}

if(!isset($handler)){
    die(json_encode(array('success' => 0, 'message' => "handler da requisição é Obrigatória")));
}

// Qdo clicamos e adicionar ao carrinho
if($_GET['handler'] == "new_product"){
    $cart->product_exists($_GET['id']);
    echo json_encode(array('success' => 1, 'message' => "Produto adicionado com sucesso"));
}

// Qdo clicamos no botao adicionar mais qtd do produto
if($_GET['handler'] == "add_product"){
    $cart->add_product($_GET['id']);
    echo json_encode(array('success' => 1, 'message' => "Produto acrescentado com sucesso"));
}

// Qdo clicamos no botao remover qtd do produto
if($_GET['handler'] == "remove_product"){
    $cart->remove_product($_GET['id']);
    echo json_encode(array('success' => 1, 'message' => "Produto desacrescentado com sucesso"));
}

// Qdo queremos remover o produto do carrinho
if($_GET['handler'] == "del_product"){
    $cart->del_product($_GET['id']);
    echo json_encode(array('success' => 1, 'message' => "Produto deletado com sucesso"));
}



// session_destroy();
