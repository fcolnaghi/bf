<?php
	header('Content-Type: text/html; charset=utf-8');
	include_once "../../controllers/produto.php";
?>

<h1>Listar produtos</h1>

<script type="text/javascript" src="../../assets/javascripts/application.js"></script>

<table>
<?php

	$pc = new ProdutoController();
		
	foreach($pc->produtos as $row) {
		echo "<tr><td>{$row[0]} :: {$row[1]} [<a href='show.php?id={$row[0]}'>show</a>] [<a href='edit.php?id={$row[0]}'>edit</a>] [<a href=javascript:destroy({$row[0]})>destroy</a>]</td></tr>";
	}

?>
</table>

<hr>
<a href="new.php">novo produto</a>