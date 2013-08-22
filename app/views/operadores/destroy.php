<?php
	include("../../constantes.php");

	OperadorController::destroy($_GET["id"]);
	
	header('Location: index.php');
?>