<?php

class Produto {
	
	public $id;
	public $nome;
	public $descricao; 
	
	public function all() {
		
		try {
			
			$db = new PDO("sqlite:../../../db/development.db");
			
			return $db->query('SELECT * FROM produto');
			
		} catch(PDOException $e) {
			echo $e->getMessage();
		}
		
	}
	
	public function unique($id) {
	
		try {
				
			$db = new PDO("sqlite:../../../db/development.db");
			
			$result = $db->query('SELECT * FROM produto where id = '. $id);
			
			$p = new Produto();
			
			foreach($result as $row) {
				$p->id = $row[0];
				$p->nome = $row[1];
				$p->descricao = $row[2];
			}
			
			return $p;
			
		} catch(PDOException $e) {
			echo $e->getMessage();
		}
	
	}
	
}

?>