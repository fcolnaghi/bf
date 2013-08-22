<?php

class Produto {
	
	public $id;
	public $nome;
	public $descricao;
	public $valor;
	public $qtd_estoque;
	
	public static function all() {
		
		try {
			
			$db = DB::getInstance();
			
			return $db->query('SELECT * FROM produto');
			
		} catch(PDOException $e) {
			echo $e->getMessage();
		}
		
	}
	
	public static function unique($id) {
	
		try {
				
			$db = DB::getInstance();
			
			$result = $db->query('SELECT * FROM produto where id = '. $id);
			
			$p = new Produto();
			
			foreach($result as $row) {
				$p->id = $row[0];
				$p->nome = $row[1];
				$p->descricao = $row[2];
				$p->valor = number_format(str_replace(",",".",$row[3]), 2, ',', '.');
				$p->qtd_estoque = $row[4];
			}
			
			return $p;
			
		} catch(PDOException $e) {
			echo $e->getMessage();
		}
	
	}
	
	public static function destroy($id) {
	
		try {
	
			$db = DB::getInstance();
			
			$db->query('delete FROM produto where id = '. $id);
			
		} catch(PDOException $e) {
			echo $e->getMessage();
		}
	
	}
	
	public static function update($produto) {
	
		try {
	
			$db = DB::getInstance();
			$valor = str_replace(",", ".",str_replace(".","",$produto->valor));
			return $db->query("update produto set nome = '".$produto->nome."', descricao = '".$produto->descricao."', valor = ".$valor.", qtd_estoque=".$produto->qtd_estoque." where id = ". $produto->id);
			
		} catch(PDOException $e) {
			echo "<div class='alert alert-danger'>Erro ao executar (".__METHOD__.")<br>[".$e->getMessage()."]</div>";
			print_r($e);
			die();
			return false;
		}
	
	}
	
	public static function save($produto) {
	
		try {
	
			$db = DB::getInstance();
			$valor = str_replace(",", ".",str_replace(".","",$produto->valor));
			
			$db->query("insert into produto (nome, descricao, valor, qtd_estoque) values ('".$produto->nome."', '".$produto->descricao."', '".$valor."', '".$produto->qtd_estoque."')");

			return $db->lastInsertId();
			
		} catch(PDOException $e) {
			echo "<div class='alert alert-danger'>Erro ao executar (".__METHOD__.")<br>[".$e->getMessage()."]</div>";
			return false;
		}
	
	}
}

?>