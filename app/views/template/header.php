<?php
verificaSessao();
$ops = getUsuarioLogado();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
<title>BeautyFaces</title>
<link href="<?php echo ROOT?>assets/stylesheets/bootstrap.min.css" media="all" rel="stylesheet" type="text/css" />
<link href="<?php echo ROOT?>assets/stylesheets/jquery.dataTables.css" media="all" rel="stylesheet" type="text/css" />
<link href="<?php echo ROOT?>assets/stylesheets/application.css" media="all" rel="stylesheet" type="text/css" />
<?php include ROOT.'views/template/scripts.php';?>
</head>
<body>