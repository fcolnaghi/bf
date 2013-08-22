<?php
class OperadorController {
	
	public $operador;
	public $operadores;
	
	public function index() {
		$this->operadores = Operador::all();
	}
	
	public function show($id) {
		$this->operador = Operador::unique($id);
	}
	
	public function create($operador) {
		if($id = Operador::save($operador)) {
			header("Location: edit.php?id=".$id."&msg=".urlencode("Operador incluido com sucesso!"));
		}
	}
	
	public function update($operador) {
		if(Operador::update($operador)) {
			header("Location: edit.php?id=".$operador->id."&msg=".urlencode("Operador alterado com sucesso!"));
		}
	}
	
	public static function destroy($id) {
		Operador::destroy($id);
	}
	
	public static function login($usuario, $senha) {
		return Operador::login($usuario, $senha);
	}
	
}

?>