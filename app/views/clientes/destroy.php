<?php
	include("../../constantes.php");
	verificaSessao();
	
	ClienteController::destroy($_GET["id"]);
	
	header('Location: index.php');
?>