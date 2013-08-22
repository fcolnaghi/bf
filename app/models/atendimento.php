<?php

class Atendimento {
	
	public $id;
	public $id_cliente;
	public $id_operador;
	public $data_atendimento;
	
	public $cliente;
	
	public static function all() {
		
		try {
			
			$db = DB::getInstance();
			
			return $db->query('SELECT * FROM atendimento');
			
		} catch(PDOException $e) {
			echo $e->getMessage();
		}
		
	}
	
	public static function unique($id) {
	
		try {
				
			$db = DB::getInstance();
			
			$result = $db->query('SELECT * FROM atendimento where id = '. $id);
			
			$p = new Atendimento();
			
			foreach($result as $row) {
				$p->id = $row[0];
				$p->id_cliente = $row[1];
				$p->id_operador = $row[2];
				$p->data_atendimento = self::parseDataShow($row[3]);
			}
			
			$result_cliente = $db->query('SELECT id, nome FROM cliente where id = '. $p->id_cliente);
			
			$p->cliente = new Cliente();
			foreach($result_cliente as $row_cliente) {
				$p->cliente->id = $row_cliente[0];
				$p->cliente->nome = $row_cliente[1];
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
	
	public static function update($atendimento) {
	
		try {
	
			$db = DB::getInstance();
			$valor = str_replace(",", ".",str_replace(".","",$atendimento->valor));
			return $db->query("update atendimento set nome = '".$atendimento->nome."', descricao = '".$atendimento->descricao."', valor = ".$valor." where id = ". $atendimento->id);
			
		} catch(PDOException $e) {
			echo "<div class='alert alert-danger'>Erro ao executar (".__METHOD__.")<br>[".$e->getMessage()."]</div>";
			print_r($e);
			die();
			return false;
		}
	
	}
	
	public static function save($atendimento) {
	
		try {
	
			$db = DB::getInstance();
			
			//$valor = str_replace(",", ".",str_replace(".","",$atendimento->valor));
			$db_date = self::parseDataDB($atendimento->data_atendimento);

			$db->query("insert into atendimento (id_cliente, id_operador, data_atendimento) values ('".$atendimento->id_cliente."', '".$atendimento->id_operador."', '".$db_date."')");

			return $db->lastInsertId();
			
		} catch(PDOException $e) {
			echo "<div class='alert alert-danger'>Erro ao executar (".__METHOD__.")<br>[".$e->getMessage()."]</div>";
			return false;
		}
	
	}
	
	private static function parseDataDB($data) {
		$dataHora = explode(" ",$data);
		$data = explode("/",$dataHora[0]);
		$hora = explode(":",$dataHora[1]);
		
		return date("Y-m-d H:i:s", mktime($hora[0],$hora[1],$hora[2],$data[1],$data[0],$data[2]));
	}
	
	public static function parseDataShow($data_db) {
		$dataHora = explode(" ",$data_db);
		$data = explode("-",$dataHora[0]);
		$hora = explode(":",$dataHora[1]);
	
		return date("d/m/Y H:i:s", mktime($hora[0],$hora[1],$hora[2],$data[1],$data[2],$data[0]));
	}
}

?>