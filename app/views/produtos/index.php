<?php
	header('Content-Type: text/html; charset=utf-8');
	include_once "../../controllers/produto.php";
?>

<h1>Listar produtos</h1>

<table>
<?php

	$pc = new ProdutoController();
		
	foreach($pc->produtos as $row) {
		echo "<tr><td>{$row[0]} :: {$row[1]}</td></tr>";
	}

?>
</table>

<hr>
<a href="new.php">novo produto</a>