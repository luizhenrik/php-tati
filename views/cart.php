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
            <div class="row">
                <?php  

                    // Trazer Produtos do carrinho
                    if(isset($_SESSION['test'])){
                        $cart_products= $products->getAllInArray(implode(",", array_keys($_SESSION['test'])));
                        if($cart_products->num_rows >= 1){
                            while($row = $cart_products->fetch_assoc()){
                                echo 'Nome do produto: ' . "<br>" . $row['nome'] . "<br>";
                                echo 'Valor do produto: ' . "<br>" . $row['valor'] . "<br>";
                                echo 'QTD do produto: ' . "<br>" . $_SESSION['test'][$row['id']]['qtd_product'] . "<br>";
                                echo "<a class='button-cart' href='../helpers/validate-cart.php' data-handler='add_product' data-id='" . $row['id'] . "'>+</a>" . "<br>";
                                echo "<a class='button-cart' href='../helpers/validate-cart.php' data-handler='remove_product' data-id='" . $row['id'] . "'>-</a>" . "<br>";
                                echo "<a class='button-cart' href='../helpers/validate-cart.php' data-handler='del_product' data-id='" . $row['id'] . "'>trash</a>" . "<br>";
                            }
                        }else{
                            echo "<h2>Seu carrinho esta vazio.</h2>";
                        }
                        // Trazer soma total de produtos no carrinho
                        if($products->getSumTotalPricesInArray(implode(",", array_keys($_SESSION['test']))) !== false){ 
                            echo 'Total R$' . $products->getSumTotalPricesInArray(implode(",", array_keys($_SESSION['test'])));
                        }
                }else{
                    echo "<h2>Seu carrinho esta vazio.</h2>";
                }

                ?>
            </div>
        </div>
    </main>
</body>
</html>