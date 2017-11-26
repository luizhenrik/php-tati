<?php 
header('Content-Type: application/json');

// Includes Classes
include("../system/class.products.php");

// Declare Classes
$products = new Products("root", "", "loja");

$id = empty($_GET['id']);
$name = empty($_GET['name']);
$price = empty($_GET['price']);

if($id){
    die(json_encode(array('success' => 0, 'message' => "id do produto Obrigatório")));
}

if($name){
    die(json_encode(array('success' => 0, 'message' => "Nome do produto Obrigatório")));
}

if($price){
    die(json_encode(array('success' => 0, 'message' => "Preço do produto Obrigatório")));
}

$products->update($_GET['id'], $_GET['name'], $_GET['price']);
echo json_encode(array('success' => 1, 'message' => "Produto atualizado com sucesso"));