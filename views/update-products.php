<!DOCTYPE html>
<html lang="en">
<?php include('includes/head.php'); ?>
<?php 
	include('../system/class.products.php');
	$product = new products("root", "", "loja");
	$data = $product->getProduct($_GET['id']);
	$row = $data->fetch_assoc();
?>
<?php 
    if(empty($_SESSION["username"]) || (!isset($_GET['id']) || !$product->product_exists_id($_GET['id']))){
        echo "Usuário não está logado. Direcionando para a página de login.";
        header("Location:" . BASE_URL . "views/login.php");
    }
?>
<body>
	<?php include('includes/header.php'); ?>
	<main>
		<div class="container">
			<div class="row">
				<h2>Atualizar Produto</h2>
				<form id="update-product" action="<?php echo BASE_URL ?>helpers/validate-admin-update.php" method="POST" class="col-sm-12">
					<div class="form-group">
						<label for="update-name">Nome:</label>
						<textarea class="form-control" name="name" id="update-name" rows="3"><?php echo $row['nome'];?></textarea>
						<input type="hidden" name="id" value="<?php echo $row['id'] ?>">
					</div>
					<div class="form-group">
						<label for="update-price">Preço:</label>
						<div class="input-group mb-2 mb-sm-0">
							<div class="input-group-addon">R$</div>
							<input type="text" name="price" class="form-control" id="update-price" placeholder="Preço" value="<?php echo $row['valor'];?>">
						</div>
					</div>
					<button type="submit" class="btn btn-primary btn-lg btn-block">Atualizar</button>
				</form>
			</div>
		</div>
	</main>
</body>
</html>