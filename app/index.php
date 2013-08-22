<?php 
include_once ("constantes.php");
if ( $_POST ) {
	if(OperadorController::login( $_POST['usuario'] , $_POST['password'] ) ){
		header("Location: ".ROOT."home.php");
	} else {
		$msg = "Usuário ou Senha inválidos";
	}
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
<title>bf</title>
<link href="assets/stylesheets/reset.css" media="all" rel="stylesheet" type="text/css" />
<link href="assets/stylesheets/bootstrap.min.css" media="all" rel="stylesheet" type="text/css" />
<link href="assets/stylesheets/application.css" media="all" rel="stylesheet" type="text/css" />
</head>
<body>
	<div class="container">
		<div class="row">
			<div id="legend">
				<h2>BeautyFaces</h2>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4 col-md-offset-8">
				<?php if (isset($msg)) :?>
				<div class="alert alert-danger"><?php echo $msg;?></div>
				<?php endif; ?>
				<form method="post">
					<div class="form-group">
						<label for="usuario">Usuário</label>
						<input type="text" class="form-control" id="usuario" name="usuario" placeholder="entre com seu usuário">
					</div>
					<div class="form-group">
						<label for="password">Senha</label>
						<input type="password" class="form-control" name="password" id="password" placeholder="digite sua senha">
					</div>
					<button type="submit" class="btn btn-primary">Entrar no Sistema</button>
				</form>
			</div>
		</div>
	</div>
</body>
</html>