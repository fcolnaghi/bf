<?php
$opc = new ProdutoController();

if( isset ( $_POST['id'] )) {
	$produto = new Produto();
	
	$produto->nome = $_POST['nome'];
	$produto->descricao = $_POST['descricao'];
	$produto->valor = $_POST['valor'];
	$produto->qtd_estoque = $_POST['qtd'];
	
	if($_POST['id'] != "") {
		$produto->id = $_POST['id'];
		$opc->update($produto);
	} else {
		$opc->create($produto);
	}
}

if (isset ( $_GET["id"] )) {
	$opc->show( $_GET ["id"] );
	$p = $opc->produto;
	$form_title = "Edição de Produto";
} else {
	$p = new Produto ();
	$form_title = "Cadastro de Produto";
}

?>
<div class="panel panel-default">
	
	<div class="panel-heading">
		<h3 class="panel-title"><?php echo $form_title; ?></h3>
	</div>
	<form method="POST">
	<div class="panel-body">
			<div class="form-group">
				<label class="control-label" for="nome">Produto</label> <input type="text" class="form-control required" name="nome" id="nome" value="<?php echo $p->nome; ?>">
			</div>
			<div class="form-group">
				<label for="nome">Descrição</label>
				<textarea class="form-control required" name="descricao" id="descricao"  rows="5" cols="50"><?php echo $p->descricao; ?></textarea>
			</div>
			<div class="row">
				<div class="form-group col-md-2">
					<label for="nome">Valor</label> <input class="form-control money required" type="text" name="valor" id="valor" value="<?php echo $p->valor; ?>">
				</div>
				<div class="form-group col-md-2">
					<label for="nome">Quantidade</label><input class="form-control qtd required" type="text" name="qtd" id="qtd" value="<?php echo $p->qtd_estoque; ?>">
				</div>
			</div>
			<input type="hidden" name="id" id="id" value="<?php echo $p->id; ?>">
	</div>
	<div class="panel-footer">
		<input type="submit" id="salvar" class="btn btn-primary" value="Salvar">
	</div>
	</form>
</div>