<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<?php include('./includes/head.php'); ?>
<body>
    <h1>Pagina de Login de usuario</h1>
    <form id="form-login" action="../helpers/validate-login.php" method="POST">
        <input type="text" name="username">
        <input type="password" name="pass">
        <input type="submit" name="submit" value="Vai">
    </form>
</body>
</html>