<?php
	include("../../constantes.php");

	AtendimentoController::destroy($_GET["id"]);
	
	header('Location: index.php');
?>