<?php 
header('Content-Type: application/json');

// Includes Classes
include("../system/class.products.php");

// Declare Classes
$products = new Products("root", "", "loja");

$id = empty($_GET['id']);

if($id){
    die(json_encode(array('success' => 0, 'message' => "Nome do produto Obrigatório")));
}

if(!$products->product_exists_id($_GET['id'])){
    die(json_encode(array('success' => 0, 'message' => "Produto não existe")));
}

$products->delete($_GET['id']);
echo json_encode(array('success' => 1, 'message' => "Produto Deletado com sucesso"));