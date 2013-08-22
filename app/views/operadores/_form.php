<?php
$cc = new OperadorController();

if( isset ( $_POST['id'] )) {
	$operador = new Operador();
	
	$operador->nome = $_POST['nome'];
	$operador->usuario = $_POST['usuario'];
	$operador->password = $_POST['password'];
	
	if($_POST['id'] != "") {
		$operador->id = $_POST['id'];
		$cc->update($operador);
	} else {
		$cc->create($operador);
	}
}

if (isset ( $_GET["id"] )) {
	$cc->show( $_GET ["id"] );
	$c = $cc->operador;
	$form_title = "Edição de Operador";
} else {
	$c = new Operador ();
	$form_title = "Cadastro de Operador";
}

?>
<div class="panel panel-default">
	
	<div class="panel-heading">
		<h3 class="panel-title"><?php echo $form_title; ?></h3>
	</div>
	<form method="POST">
	<div class="panel-body">
			<div class="form-group">
				<label class="control-label" for="nome">Nome</label> <input type="text" class="form-control required" name="nome" id="nome" value="<?php echo $c->nome; ?>">
			</div>
			<div class="form-group">
				<label for="usuario">Usuário</label>
				<input type="usuario" class="form-control required" name="usuario" id="usuario" value="<?php echo $c->usuario; ?>">
			</div>
			<div class="form-group">
				<label for="password">Senha</label>
				<input type="password" class="form-control" name="password" id="password">
			</div>
			<div class="form-group">
				<label for="password">Repita a Senha</label>
				<input type="password" class="form-control" name="password_confirm" id="password_confirm">
			</div>
			<input type="hidden" name="id" id="id" value="<?php echo $c->id; ?>">
	</div>
	<div class="panel-footer">
		<input type="submit" id="salvar" class="btn btn-primary" value="Salvar">
	</div>
	</form>
</div>