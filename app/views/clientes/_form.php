<?php
$cc = new ClienteController();

if( isset ( $_POST['id'] )) {
	$cliente = new Cliente();
	
	$cliente->nome = $_POST['nome'];
	$cliente->tel_res = $_POST['tel_res'];
	$cliente->tel_cel = $_POST['tel_cel'];
	$cliente->tel_com = $_POST['tel_com'];
	$cliente->email = $_POST['email'];
	
	if($_POST['id'] != "") {
		$cliente->id = $_POST['id'];
		$cc->update($cliente);
	} else {
		$cc->create($cliente);
	}
}

if (isset ( $_GET["id"] )) {
	$cc->show( $_GET ["id"] );
	$cliente = $cc->cliente;
	$form_title = "Edição de Cliente";
} else {
	$cliente = new Cliente ();
	$form_title = "Cadastro de Cliente";
}

?>
<div class="panel panel-default">
	
	<div class="panel-heading">
		<h3 class="panel-title"><?php echo $form_title; ?></h3>
	</div>
	<form method="POST">
	<div class="panel-body">
			<div class="form-group">
				<label class="control-label" for="nome">Nome</label> <input type="text" class="form-control required" name="nome" id="nome" value="<?php echo $cliente->nome; ?>">
			</div>
			<div class="form-group">
				<label for="email">E-mail</label>
				<input type="email" class="form-control required" name="email" id="email" value="<?php echo $cliente->email; ?>">
			</div>
			<div class="row">
				<div class="form-group col-md-2">
					<label for="tel_res">Tel. Residencial</label> <input class="form-control tel" type="text" name="tel_res" id="tel_res" value="<?php echo $cliente->tel_res; ?>">
				</div>
				<div class="form-group col-md-2">
					<label for="tel_cel">Tel. Celular</label> <input class="form-control tel" type="text" name="tel_cel" id="tel_res" value="<?php echo $cliente->tel_cel; ?>">
				</div>
				<div class="form-group col-md-2">
					<label for="tel_com">Tel. Comercial</label> <input class="form-control tel" type="text" name="tel_com" id="tel_com" value="<?php echo $cliente->tel_com; ?>">
				</div>
			</div>
			<input type="hidden" name="id" id="id" value="<?php echo $cliente->id; ?>">
	</div>
	<div class="panel-footer">
		<input type="submit" id="salvar" class="btn btn-primary" value="Salvar">
	</div>
	</form>
</div>