<?php
	include("../../constantes.php");

	ServicoController::destroy($_GET["id"]);
	
	header('Location: index.php');
?>