<!DOCTYPE html>
<html>
<head>
	<title>AAA</title>
	<?php
	$dsn = "mysql:host=localhost;dbname=const01";
	$user = "root";
	$pswd = "";	

	$pdo = new PDO($dsn, $user, $pswd);
	
	$id = $_GET['id'];
	$apelido = $_GET['apelido'];
	$descricao = $_GET['descricao'];
	$id_dep = $_GET['id_dep'];
	$id_func_lider = $_GET['id_func_lider'];
	?>
</head>
<body>
	<?php
	try {
		$pdo->beginTransaction();
		$pdo->exec("UPDATE projeto SET id=$id, apelido='$apelido', descricao='$descricao', id_dep=$id_dep, id_func_lider=$id_func_lider  WHERE id =".$_GET['id']."
			");
		$pdo->commit();
		echo "<script>alert('Atualizado com sucesso!');</script>";
		header("location:http://localhost/Crud/Consultar/c_proj.php");
	} catch (Exception $e) {
		$pdo->rollback();
		throw $e;
	}
	?>
</body>
</html>