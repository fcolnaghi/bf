<?php

class ClienteController {
	
	public $cliente;
	public $clientes;
	
	public function index() {
		$this->clientes = Cliente::all();
	}
	
	public function show($id) {
		$this->cliente = Cliente::unique($id);
	}
	
	public function create($cliente) {
		if($id = Cliente::save($produto)) {
			header("Location: edit.php?id=".$id."&msg=".urlencode("Cliente incluido com sucesso!"));
		}
	}
	
	public function update($cliente) {
		if(Cliente::update($cliente)) {
			header("Location: edit.php?id=".$cliente->id."&msg=".urlencode("Cliente alterado com sucesso!"));
		}
	}
	
	public static function destroy($id) {
		Cliente::destroy($id);
	}
	
	public function search($name) {
		return Cliente::search($name);; 
	}
	
}

?>