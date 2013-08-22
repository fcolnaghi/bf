<?php

class Cliente {
	
	public $id;
	public $nome;
	public $email;
	public $tel_res;
	public $tel_cel;
	public $tel_com;
	
	public static function all() {
	
		try {
				
			$db = DB::getInstance();
				
			return $db->query('SELECT * FROM cliente');
				
		} catch(PDOException $e) {
			echo $e->getMessage();
		}
	
	}
	
	public static function unique($id) {
	
		try {
	
			$db = DB::getInstance();
				
			$result = $db->query('SELECT * FROM cliente where id = '. $id);
				
			$c = new Cliente();
				
			foreach($result as $row) {
				$c->id = $row[0];
				$c->nome = $row[1];
				$c->tel_res = $row[2];
				$c->tel_cel = $row[3];
				$c->tel_com = $row[4];
				$c->email = $row[5];
			}
				
			return $c;
				
		} catch(PDOException $e) {
			echo $e->getMessage();
		}
	
	}
	
	public static function destroy($id) {
	
		try {
	
			$db = DB::getInstance();
				
			$db->query('delete FROM cliente where id = '. $id);
				
		} catch(PDOException $e) {
			echo $e->getMessage();
		}
	
	}
	
	public static function update($cliente) {
	
		try {
	
			$db = DB::getInstance();

			return $db->query("update cliente set nome = '".$cliente->nome."', tel_res = '".$cliente->tel_res."', tel_cel = '".$cliente->tel_cel."', tel_com = '".$cliente->tel_com."',  email = '".$cliente->email."' where id = ". $cliente->id);
				
		} catch(PDOException $e) {
			echo "<div class='alert alert-danger'>Erro ao executar (".__METHOD__.")<br>[".$e->getMessage()."]</div>";
			print_r($e);
			die();
			return false;
		}
	
	}
	
	public static function save($cliente) {
	
		try {
	
			$db = DB::getInstance();
				
			$db->query("insert into cliente (nome, tel_res, tel_cel, tel_com, email) values ('".$cliente->nome."', '".$cliente->tel_res."', '".$cliente->tel_cel."', '".$cliente->tel_com."','".$cliente->email."')");
	
			return $db->lastInsertId();
				
		} catch(PDOException $e) {
			echo "<div class='alert alert-danger'>Erro ao executar (".__METHOD__.")<br>[".$e->getMessage()."]</div>";
			return false;
		}
	
	}
	
}

?>