<!DOCTYPE html>
<html lang="en">
<?php include('includes/head.php'); ?>
<?php 
    if(empty($_SESSION["username"])){
        echo "Usuário não está logado. Direcionando para a página de login.";
        header("Location:" . BASE_URL . "views/login.php");
    }
?>
<body>
	<?php include('includes/header.php'); ?>
	<main>
		<div class="container">
			<div class="row">
				<h2>Adicionar Produto</h2>
				<form id="add-product" action="<?php echo BASE_URL ?>helpers/validate-admin-add.php" method="POST" class="col-sm-12">
					<div class="form-group">
						<label for="add-name">Nome:</label>
						<textarea class="form-control" name="name" id="add-name" rows="3"></textarea>
					</div>
					<div class="form-group">
						<label for="add-price">Preço:</label>
						<div class="input-group mb-2 mb-sm-0">
							<div class="input-group-addon">R$</div>
							<input type="text" name="price" class="form-control" id="add-price" placeholder="Preço">
						</div>
					</div>
					<button type="submit" class="btn btn-primary btn-lg btn-block">Submit</button>
				</form>
			</div>
		</div>
	</main>
</body>
</html>