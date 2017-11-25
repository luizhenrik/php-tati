<?php 
    session_start();
    if(empty($_SESSION["username"])){
        echo "Usuário não está logado. Direcionando para a página de login.";
        header('Location: http://localhost/projeto-php/views/login.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<?php include('./includes/head.php'); ?>
<body>
    <h1>pagina de Produtos - ADMIN</h1>
    <a id="logout" href="../helpers/logout.php">Logout</a>
</body>
</html>