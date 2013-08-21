<?php
	/**
	 * Constantes usadas no sistema
	 * 
	 * @author Fernando Ribeiro
	 * @version 0.1
	 */
	
	/* Mostra apenas erros */
	error_reporting(E_ALL|E_STRICT);
	
	header('Content-Type: text/html; charset=utf-8');
	
	$diretorio = getcwd();
	
	if (  strpos($diretorio, "templates") || strpos($diretorio, "clientes") || strpos($diretorio, "produtos")  || strpos($diretorio, "servicos") ) {
		define('ROOT',"../../");
	} elseif (  strpos($diretorio, "views") ) {
		define('ROOT',"../");
	} else {
		define('ROOT',"");
	}
	
	/*
	if(strpos(getcwd(), "cadastros") || strpos(getcwd(), "ajax") > 0) {
		define('ROOT',"../../../");
	} else if(strpos($diretorio, "") || strpos(getcwd(), "includes") > 0){
		define('ROOT',"../");
	} else {
		define('ROOT',"");	
	}
	*/
?>