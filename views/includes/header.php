<header>
    <h1>
        <a href="<?php echo BASE_URL ?>views/index.php">LOGO</a>
    </h1>
    <?php
        if(!empty($_SESSION["username"])):
    ?>
        <a href="<?php echo BASE_URL ?>views/add-products.php">Adicionar produto</a>
        <a id="logout" href="<?php echo BASE_URL ?>helpers/logout.php">Logout</a>
    <?php else: ?>
        <a id="login" href="<?php echo BASE_URL ?>views/login.php">Login</a>  
    <?php endif; ?>
</header>