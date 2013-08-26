<?php
	include("../../constantes.php");
	verificaSessao();
	$sc = new ServicoController();
	$sc->show($_POST['id_servico']);
	$sc->servico->valor = str_replace(",",".",$sc->servico->valor);
	
	echo json_encode( (array) $sc->servico );
?>