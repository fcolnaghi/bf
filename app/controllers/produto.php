<?php
class ProdutoController {
	
	public $produto;
	public $produtos;
	
	public function index() {
		$this->produtos = Produto::all();
	}
	
	public function show($id) {
		$this->produto = Produto::unique($id);
	}
	
	public function create($produto) {
		if($id = Produto::save($produto)) {
			header("Location: edit.php?id=".$id."&msg=".urlencode("Produto incluido com sucesso!"));
		}
	}
	
	public function update($produto) {
		if(Produto::update($produto)) {
			header("Location: edit.php?id=".$produto->id."&msg=".urlencode("Produto alterado com sucesso!"));
		}
	}
	
	public static function destroy($id) {
		Produto::destroy($id);
	}
	
}

?>