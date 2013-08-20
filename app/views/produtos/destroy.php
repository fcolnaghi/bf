<?php
	include_once "../../controllers/produto.php";

	$pc = new ProdutoController();
	
	$pc->show($_GET["id"]);
	
	print_r($pc->produto);

	header('Location: index.php');
?>