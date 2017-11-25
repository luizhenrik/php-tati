<?php
header('Content-Type: application/json');

include("../system/class.login.php");
$validate = new Login("root", "", "loja");

$username = empty($_GET['username']);
$password = empty($_GET['pass']);


if($username){
    die(json_encode(array('success' => 0, 'message' => "User Obrigatório")));
}

if($password){
    die(json_encode(array('success' => 0, 'message' => "Senha Obrigatória")));
}

if(!$validate->user_exists($_GET['username'])){
    die(json_encode(array('success' => 0, 'message' => "username nao cadastrado")));
}

if(!$validate->pass_exists($_GET['pass'])){
    die(json_encode(array('success' => 0, 'message' => "senha incorreta")));
}

session_start();
$_SESSION['username'] = $_GET['username'];
echo json_encode(array('success' => 1, 'message' => "Login Feito com Sucesso"));


