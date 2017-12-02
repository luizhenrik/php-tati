<!DOCTYPE html>
<html lang="en">
<?php include('includes/head.php'); ?>
<?php

    // Includes Classes
    include("../system/class.products.php");

    // Declare Classes
    $products = new Products("root", "", "loja");
?>
<body>
    <?php include('includes/header.php'); ?>
    <main>
        <div class="container">
                <?php  

                    // Trazer Produtos do carrinho
                    // verifica se existe valor na variavel onde guardamos todos os produtos selecionados.
                    if(isset($_SESSION['test'])):

                        // Chamando Metodo da classe onde temos o SELECT
                        $cart_products= $products->getAllInArray('"' . implode('","', array_keys($_SESSION['test'])) . '"');

                        // Verifica se contem produtos nessa resposta
                        if($cart_products->num_rows > 0):

                            // faz o laço para mostrar produtos
                            while($row = $cart_products->fetch_assoc()):
                ?>
                                <p>
                                    <strong>Nome do produto:</strong>
                                    <br>
                                    <?php echo $row['nome'];?>
                                </p>
                                <p>
                                    <strong>Valor do produto:</strong>
                                    <br>
                                    <?php echo $row['valor'];?>
                                </p>
                                <p>
                                    <strong>QTD do produto:</strong>
                                    <br>
                                    <?php echo $_SESSION['test'][$row['id']]['qtd_product'];?>
                                </p>
                                <p>
                                    <strong>Valor total do produto:</strong>
                                    <br>
                                    <?php echo $row['valor'] * $_SESSION['test'][$row['id']]['qtd_product'];?>
                                </p>

                                <a class='button-cart' href='../helpers/validate-cart.php' data-handler='add_product' data-id='<?php echo $row["id"] ?>'>Adicionar</a>
                                <br>
                                <a class='button-cart' href='../helpers/validate-cart.php' data-handler='remove_product' data-id='<?php echo $row["id"] ?>'>Retirar</a>
                                <br>
                                <a class='button-cart' href='../helpers/validate-cart.php' data-handler='del_product' data-id='<?php echo $row["id"] ?>'>Remover</a>
                                
                        <?php 
                            endwhile; 
                        ?>
                        <br>
                        <br>
                        <br>
                        <a class='button-cart--truncate' href='../helpers/validate-cart-truncate.php' data-handler='truncate_cart'>Limpar carrinho</a>
                        <br>
                <?php
                        else:
                ?>
                        <h2>Seu carrinho esta vazio.</h2>
                <?php
                        endif;

                        // Trazer soma total de produtos no carrinho
                        $sql_total = $products->getSumTotalPricesInArray('"' . implode('","', array_keys($_SESSION['test'])) . '"');

                        // verifica se o resultado existe
                        if($sql_total->num_rows > 0):

                            // coloco a variavel final com um valor default
                            $total = 0;

                            // Realizo um loop para todos os valores de produtos
                            while($row_values = $sql_total->fetch_assoc()):
                                $total = $total + ($row_values['valor'] * $_SESSION['test'][$row_values['id']]['qtd_product']);
                            endwhile;
                ?>
                            <p>Total: R$ <?php echo $total ?></p>
                            <br>
                <?php
                        endif;
                    else:
                ?>
                        <h2>Seu carrinho esta vazio.</h2>
                <?php
                    endif;
                ?>
                <a href="<?php echo BASE_URL ?>views/index.php">Continuar comprando</a>
        </div>
    </main>
</body>
</html>