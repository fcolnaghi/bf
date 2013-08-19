<?php

include_once "../../models/produto.php";

class ProdutoController {
	
	public $produto;
	public $produtos;

	public function __construct() {

		$p = new Produto();
		
		$this->produtos = $p->all();
		
	}
	
	public function show($id) {
		
		$p = new Produto();
		
		$this->produto = $p->unique($id);
		
	}
	
	public function create() {
		
	}
	
	public function update() {
	
	}
	
	public function destroy() {
	
	}
	
}

?>