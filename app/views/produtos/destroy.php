<?php
	include_once "../../controllers/produto.php";

	ProdutoController::destroy($_GET["id"]);
	
	header('Location: index.php');
?>