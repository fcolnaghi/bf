<?php

	include_once "../../controllers/produto.php";

	$pc = new ProdutoController();
	
	$pc->show($_GET["id"]);
	
	$p = $pc->produto;
	
?>

<form action="bah">

	<p>Produto<p>
	<input type="text" name="nome" id="nome" value="<?php echo $p->nome; ?>">
	
	<p>Descrição<p>
	<textarea name="descricao" id="descricao" rows="5" cols="50"><?php echo $p->descricao; ?></textarea>
	
	<p>Valor<p>
	<input type="text" name="valor" id="valor" value="<?php echo $p->valor; ?>">
	
</form>