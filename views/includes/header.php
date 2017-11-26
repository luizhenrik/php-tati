<header>
    <?php
        if(!empty($_SESSION["username"])):
    ?>
        <a href="<?php echo BASE_URL ?>views/dashboard/add-products.php">Adicionar produto</a>
        <a id="logout" href="<?php echo BASE_URL ?>helpers/logout.php">Logout</a>
    <?php else: ?>
        <a id="login" href="<?php echo BASE_URL ?>views/login.php">Login</a>  
    <?php endif; ?>
</header>