<?php

class Servico {
	
	public $id;
	public $nome;
	public $descricao;
	public $valor;
	
	public static function all() {
		
		try {
			
			$db = DB::getInstance();
			
			return $db->query('SELECT * FROM servico');
			
		} catch(PDOException $e) {
			echo $e->getMessage();
		}
		
	}
	
	public static function unique($id) {
	
		try {
				
			$db = DB::getInstance();
			
			$result = $db->query('SELECT * FROM servico where id = '. $id);
			
			$p = new Servico();
			
			foreach($result as $row) {
				$p->id = $row[0];
				$p->nome = $row[1];
				$p->descricao = $row[2];
				$p->valor = number_format(str_replace(",",".",$row[3]), 2, ',', '.');
			}
			
			return $p;
			
		} catch(PDOException $e) {
			echo $e->getMessage();
		}
	
	}
	
	public static function destroy($id) {
	
		try {
	
			$db = DB::getInstance();
			
			$db->query('delete FROM servico where id = '. $id);
			
		} catch(PDOException $e) {
			echo $e->getMessage();
		}
	
	}
	
	public static function update($servico) {
	
		try {
	
			$db = DB::getInstance();
			$valor = str_replace(",", ".",str_replace(".","",$servico->valor));
			return $db->query("update servico set nome = '".$servico->nome."', descricao = '".$servico->descricao."', valor = ".$valor." where id = ". $servico->id);
			
		} catch(PDOException $e) {
			echo "<div class='alert alert-danger'>Erro ao executar (".__METHOD__.")<br>[".$e->getMessage()."]</div>";
			print_r($e);
			die();
			return false;
		}
	
	}
	
	public static function save($servico) {
	
		try {
	
			$db = DB::getInstance();
			$valor = str_replace(",", ".",str_replace(".","",$servico->valor));
			
			$db->query("insert into servico (nome, descricao, valor) values ('".$servico->nome."', '".$servico->descricao."', '".$valor."')");

			return $db->lastInsertId();
			
		} catch(PDOException $e) {
			echo "<div class='alert alert-danger'>Erro ao executar (".__METHOD__.")<br>[".$e->getMessage()."]</div>";
			return false;
		}
	
	}
}

?>