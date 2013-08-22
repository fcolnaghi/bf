<?php
class ServicoController {
	
	public $servico;
	public $servicos;
	
	public function index() {
		$this->servicos = Servico::all();
	}
	
	public function show($id) {
		$this->servico = Servico::unique($id);
	}
	
	public function create($servico) {
		if($id = Servico::save($servico)) {
			header("Location: edit.php?id=".$id."&msg=".urlencode("Servico incluido com sucesso!"));
		}
	}
	
	public function update($servico) {
		if(Servico::update($servico)) {
			header("Location: edit.php?id=".$servico->id."&msg=".urlencode("Servico alterado com sucesso!"));
		}
	}
	
	public static function destroy($id) {
		Servico::destroy($id);
	}
	
}

?>