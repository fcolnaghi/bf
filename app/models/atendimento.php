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
			
			return $db->query('SELECT a.id, c.nome, a.data_atendimento, a.total FROM atendimento as a JOIN cliente as c ON a.id_cliente = c.id');
			
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
				$p->subtotal = number_format(str_replace(",",".",$row[3]), 2, ',', '.');
				$p->desconto =number_format(str_replace(",",".",$row[4]), 2, ',', '.');
				$p->total = number_format(str_replace(",",".",$row[5]), 2, ',', '.');
				$p->data_atendimento = self::parseDataShow($row[6]);
			}
			
			$result_cliente = $db->query('SELECT id, nome FROM cliente where id = '. $p->id_cliente);
			
			$p->cliente = new Cliente();
			foreach($result_cliente as $row_cliente) {
				$p->cliente->id = $row_cliente[0];
				$p->cliente->nome = $row_cliente[1];
			}
			
			$result_servicos = $db->query('SELECT * FROM servicos_atendimento as sa where sa.id_atendimento = '. $p->id);
				
			$p->servicos = array();
			foreach($result_servicos as $row_servicos) {
				$serv = Servico::unique($row_servicos[1]);
				
				$servico = new stdClass();
				$servico->id = $row_servicos[1];
				$servico->nome = $serv->nome;
				$servico->quantidade = $row_servicos[2];
				$servico->total = number_format(str_replace(",",".",$row_servicos[3]), 2, ',', '.');
				
				array_push($p->servicos, $servico);
				
			}
			
			$result_produtos = $db->query('SELECT * FROM produtos_atendimento as pa where pa.id_atendimento = '. $p->id);
				
			$p->produtos = array();
			foreach($result_produtos as $row_produtos) {
				$prod = Produto::unique($row_produtos[1]);
				
				$produto = new stdClass();
				$produto->id = $row_produtos[1];
				$produto->nome = $prod->nome;
				$produto->quantidade = $row_produtos[2];
				$produto->total = number_format(str_replace(",",".",$row_produtos[3]), 2, ',', '.');
				
				array_push($p->produtos, $produto);
				
			}
			
			return $p;
			
		} catch(PDOException $e) {
			echo $e->getMessage();
		}
	
	}
	
	public static function destroy($id) {
	
		try {
	
			$db = DB::getInstance();
			
			$db->query('delete FROM atendimento where id = '. $id);
			
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
			
			$subtotal = str_replace(",", ".",str_replace(".","",$atendimento->subtotal));
			if($atendimento->desconto != "") {
				$desconto = str_replace(",", ".",str_replace(".","",$atendimento->desconto));
			} else {
				$desconto = "0.00";
			}
			$total = str_replace(",", ".",str_replace(".","",$atendimento->total));
			
			$db_date = self::parseDataDB($atendimento->data_atendimento);
			$db->query("insert into atendimento (id_cliente, id_operador, subtotal, desconto, total, data_atendimento) values ('".$atendimento->id_cliente."', '".$atendimento->id_operador."' , ".$subtotal.", ".$desconto.", ".$total.", '".$db_date."')");

			if( $db->lastInsertId() ) {
				$atendimento_id = $db->lastInsertId();
				
				foreach ($atendimento->servicos as $servico) {
						
					$servico = explode("|", $servico);
					$id_servico = $servico[0];
					$qtd_servico = $servico[1];
					
					$serv = Servico::unique($id_servico);
					$servValor = str_replace(",", ".",str_replace(".","",$serv->valor));
					$totalServico = $servValor * $qtd_servico;
					$db->query("insert into servicos_atendimento (id_atendimento, id_servico, quantidade, valor) values ('".$atendimento_id."', '".$id_servico."' , ".$qtd_servico.", ".$totalServico.")");					
					
				}
				
				foreach ($atendimento->produtos as $produto) {
				
					$produto = explode("|", $produto);
					$id_produto = $produto[0];
					$qtd_produto = $produto[1];
					
					$prod = Produto::unique($id_produto);
					$prodValor = str_replace(",", ".",str_replace(".","",$prod->valor));
					$totalProduto = $prodValor * $qtd_produto;
					$db->query("insert into produtos_atendimento (id_atendimento, id_produto, quantidade, valor) values ('".$atendimento_id."', '".$id_produto."' , ".$qtd_produto.", ".$totalProduto.")");
					
					self::removerEstoqueProduto($id_produto, $qtd_produto);
				}
							
			}
			
			return true;
			
		} catch(PDOException $e) {
			echo "<div class='alert alert-danger'>Erro ao executar (".__METHOD__.")<br>[".$e->getMessage()."]</div>";
			print_r($e);
			return false;
		}
	
	}
	
	protected function removerEstoqueProduto($id, $qtd) {
		try {
		
			$db = DB::getInstance();
			return $db->query("update produto set qtd_estoque = qtd_estoque - ".$qtd." where id = ". $id);
				
		} catch(PDOException $e) {
			echo "<div class='alert alert-danger'>Erro ao executar (".__METHOD__.")<br>[".$e->getMessage()."]</div>";
			print_r($e);
			die();
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