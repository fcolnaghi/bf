<?php
	include("../../constantes.php");
	verificaSessao();
	$cc = new ClienteController();
	echo $cc->search($_POST['nome_cliente']);
?>