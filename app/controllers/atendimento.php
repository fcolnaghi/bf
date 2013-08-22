<?php
class AtendimentoController {
	
	public $atendimento;
	public $atendimentos;
	
	public function index() {
		$this->atendimentos = Atendimento::all();
	}
	
	public function show($id) {
		$this->atendimento = Atendimento::unique($id);
	}
	
	public function create($atendimento) {
		if($id = Atendimento::save($atendimento)) {
			header("Location: edit.php?id=".$id."&msg=".urlencode("Atendimento incluido com sucesso!"));
		}
	}
	
	public function update($atendimento) {
		if(Atendimento::update($atendimento)) {
			header("Location: edit.php?id=".$atendimento->id."&msg=".urlencode("Atendimento alterado com sucesso!"));
		}
	}
	
	public static function destroy($id) {
		Atendimento::destroy($id);
	}
	
}

?>