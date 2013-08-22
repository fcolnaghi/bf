<?php
	/* Mostra apenas erros */
	error_reporting(E_ALL|E_STRICT);
	
	header('Content-Type: text/html; charset=utf-8');
	
	$diretorio = getcwd();
	if (  strpos($diretorio, "templates") || strpos($diretorio, "clientes")|| strpos($diretorio, "atendimentos") || strpos($diretorio, "produtos")  || strpos($diretorio, "servicos") || strpos($diretorio, "operadores") ) {
		define('ROOT',"../../");
		define('ROOT_DB',"../../../");
	} elseif (  strpos($diretorio, "views") ) {
		define('ROOT',"../");
		define('ROOT_DB',"../../");
	} else {
		define('ROOT_DB',"../");
		define('ROOT',"");
	}
	
	/**
	 * loader.php
	 *
	 * Arquivo responsavel por realizar a construcao dinamica dos objetos;
	 *
	 */
	
	if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip')) {
		ob_start("ob_gzhandler");
	} else {
		ob_start();
	}
	
	/* Inicializa a sessão */
	session_start();
	
	/* Cria as classes conforme o padrao */
	function __autoload($classe) {
		//$arquivo = ROOT."app/controllers/".strtolower($classe).".php";
		
		if (!preg_match("#(Controller){1}$#", $classe, $fragment)) {
			$arquivo = ROOT."models/".strtolower($classe).".php";
		} else {
			$classe = strtolower($classe);
			$controller = strtolower(substr($classe,0,strlen($classe) - strlen($fragment[0])));
			$arquivo = ROOT."controllers/".$controller.".php";
		}
	
		require_once $arquivo;
	}
	
	function verificaSessao() {
		if (!isset($_SESSION["operador"])) {
			header("Location: ".ROOT."index.php");
		} else {
			return true;
		}
	}
	
	function getUsuarioLogado() {	
		if(isset($_SESSION["operador"])) {
			return Operador::unique($_SESSION["operador"]->id); 
		} else {
			return null;
		}
	}
	
?>