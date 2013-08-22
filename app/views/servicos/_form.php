<?php
$sc = new ServicoController();

if( isset ( $_POST['id'] )) {
	$servico = new Servico();
	
	$servico->nome = $_POST['nome'];
	$servico->descricao = $_POST['descricao'];
	$servico->valor = $_POST['valor'];
	
	if($_POST['id'] != "") {
		$servico->id = $_POST['id'];
		$sc->update($servico);
	} else {
		$sc->create($servico);
	}
}

if (isset ( $_GET["id"] )) {
	$sc->show( $_GET ["id"] );
	$servico = $sc->servico;
	$form_title = "Edição de Serviço";
} else {
	$servico = new Servico ();
	$form_title = "Cadastro de Serviço";
}

?>
<div class="panel panel-default">
	
	<div class="panel-heading">
		<h3 class="panel-title"><?php echo $form_title; ?></h3>
	</div>
	<form method="POST">
	<div class="panel-body">
			<div class="form-group">
				<label class="control-label" for="nome">Serviço</label> <input type="text" class="form-control required" name="nome" id="nome" value="<?php echo $servico->nome; ?>">
			</div>
			<div class="form-group">
				<label for="nome">Descrição</label>
				<textarea class="form-control required" name="descricao" id="descricao"  rows="5" cols="50"><?php echo $servico->descricao; ?></textarea>
			</div>
			<div class="row">
				<div class="form-group col-md-2">
					<label for="nome">Valor</label> <input class="form-control money required" type="text" name="valor" id="valor" value="<?php echo $servico->valor; ?>">
				</div>
			</div>
			<input type="hidden" name="id" id="id" value="<?php echo $servico->id; ?>">
	</div>
	<div class="panel-footer">
		<input type="submit" id="salvar" class="btn btn-primary" value="Salvar">
	</div>
	</form>
</div>