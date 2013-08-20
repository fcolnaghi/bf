<?php

	include_once "../../controllers/produto.php";
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>bf</title>
</head>

<body>

<h1>Mostrar um único produto</h1>

<?php

	$pc = new ProdutoController();
	
	$pc->show($_GET["id"]);
	
	print_r($pc->produto);
	
	/*echo $pc[0];
	echo "<br>";
	echo $pc[1];*/
	
?>

<hr>
<a href="edit.php?id=<?php echo $_GET["id"]?>">editar</a> | <a href="index.php">voltar</a>

</body>
</html>
