<?php
	include("../../constantes.php");
	verificaSessao();
	$pc = new ProdutoController();
	$pc->show($_POST['id_produto']);
	$pc->produto->valor = str_replace(",",".",$pc->produto->valor);
	
	echo json_encode( (array) $pc->produto );
?>