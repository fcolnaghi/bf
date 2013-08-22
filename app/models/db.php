<?php

class DB {
	
	private static $instance = null;
	
	public static function getInstance() {
		if(!isset(self::$instance)) {
			self::$instance = new PDO("sqlite:".ROOT_DB."db/development.db");
			self::$instance->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
		}
		
		return self::$instance;
	}	
	/*
	public function all() {
		
		try {
			
			$db = new PDO("sqlite:../../../db/development.db");
			$db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
			
			return $db->query('SELECT * FROM produto');
			
		} catch(PDOException $e) {
			echo $e->getMessage();
		}
		
	}
	
	public function unique($id) {
	
		try {
				
			$db = new PDO("sqlite:../../../db/development.db");
			$db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
			
			$result = $db->query('SELECT * FROM produto where id = '. $id);
			
			$p = new Produto();
			
			foreach($result as $row) {
				$p->id = $row[0];
				$p->nome = $row[1];
				$p->descricao = $row[2];
				$p->valor = $row[3];
				$p->qtd = 0;
			}
			
			return $p;
			
		} catch(PDOException $e) {
			echo $e->getMessage();
		}
	
	}
	
	public static function destroy($id) {
	
		try {
	
			$db = new PDO("sqlite:../../../db/development.db");
			$db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
			
			$db->query('delete FROM produto where id = '. $id);
			
		} catch(PDOException $e) {
			echo $e->getMessage();
		}
	
	}
	
	public static function update($produto) {
	
		try {
	
			$db = new PDO("sqlite:../../../db/development.db");
			$db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
			
			$db->query('update '. $produto->id);
	
		} catch(PDOException $e) {
			echo $e->getMessage();
		}
	
	}
	
	public static function save($produto) {
	
		try {
	
			$db = new PDO("sqlite:../../../db/development.db");
			$db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
			
			$db->query("insert into produto (nome, descricao, valor) values ('".$produto->nome."', '".$produto->descricao."', ".number_format($produto->valor, 2).")");
			
			return true;
		} catch(PDOException $e) {
			echo "Erro ao executar (".__METHOD__.")<br>[".$e->getMessage()."]";
			return false;
		}
	
	}
	*/
}

?>