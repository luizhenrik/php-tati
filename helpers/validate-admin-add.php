<?php 
header('Content-Type: application/json');

// Includes Classes
include("../system/class.products.php");

// Declare Classes
$products = new Products("root", "", "loja");

$name = empty($_GET['name']);
$price = empty($_GET['price']);

if($name){
    die(json_encode(array('success' => 0, 'message' => "Nome do produto Obrigatório")));
}

if($price){
    die(json_encode(array('success' => 0, 'message' => "Preço do produto Obrigatório")));
}

if($products->product_exists_name($_GET['name'])){
    die(json_encode(array('success' => 0, 'message' => "Produto Já existe")));
}

$products->add($_GET['name'], $_GET['price']);
echo json_encode(array('success' => 1, 'message' => "Produto adicionado com sucesso"));