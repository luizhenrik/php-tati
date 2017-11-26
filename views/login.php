<!DOCTYPE html>
<html lang="en">
<?php include('includes/head.php'); ?>
<?php 
    if(!empty($_SESSION["username"])){
        echo "Usuário já esta logado. Direcionando para a página inicial.";
        header("Location:" . BASE_URL . "views/index.php");
    }
?>
<body>
    <?php include('includes/header.php'); ?>
    <h1>Pagina de Login de usuario</h1>
    <form id="form-login" action="<?php echo BASE_URL ?>helpers/validate-login.php" method="POST">
        <input type="text" name="username">
        <input type="password" name="pass">
        <input type="submit" name="submit" value="Vai">
    </form>
</body>
</html>