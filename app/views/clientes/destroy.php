<?php
	include("../../constantes.php");

	ClienteController::destroy($_GET["id"]);
	
	header('Location: index.php');
?>