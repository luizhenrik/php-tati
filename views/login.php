<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="../assets/lib/jquery-3.2.1.min.js"></script>
    <script src="../assets/script/login.js"></script>
    <title>Document</title>
</head>
<body>
    <h1>Pagina de Login de usuario</h1>
    <form id="form-login" action="../helpers/validate-login.php" method="POST">
        <input type="text" name="username">
        <input type="password" name="pass">
        <input type="submit" name="submit" value="Vai">
    </form>
</body>
</html>