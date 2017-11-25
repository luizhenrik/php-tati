<?php 
    session_start();
    if(empty($_SESSION["username"])){
        echo "Usuário não está logado. Direcionando para a página de login.";
        header('Location: http://localhost/projeto-php/views/login.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="../assets/lib/jquery-3.2.1.min.js"></script>
    <script src="../assets/script/dashboard.js"></script>
    <title>Document</title>
</head>
<body>
    <h1>pagina de Produtos - ADMIN</h1>
    <a id="logout" href="../helpers/logout.php">Logout</a>
</body>
</html>