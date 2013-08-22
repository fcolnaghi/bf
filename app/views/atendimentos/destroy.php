<?php
	include("../../constantes.php");

	ProdutoController::destroy($_GET["id"]);
	
	header('Location: index.php');
?>