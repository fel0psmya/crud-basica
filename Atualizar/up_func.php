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
	$nome = $_GET['nome'];
	$rg = $_GET['rg'];
	$data = $_GET['data_de_nascimento'];
	$contato = $_GET['contato'];
	$idfs = $_GET['id_func_sup'];
	$id_cargo = $_GET['id_cargo'];
	?>
</head>
<body>
	<?php
	try {
		$pdo->beginTransaction();
		$pdo->exec("UPDATE funcionario SET id=$id, nome='$nome', rg='$rg', data_de_nascimento='$data', contato='$contato', id_func_supervisor=$idfs, id_cargo=$id_cargo  WHERE id =".$_GET['id']);
		$pdo->commit();
		echo "<script>alert('Atualizado com sucesso!');</script>";
		header("location:http://localhost/Crud/Consultar/c_funcionario.php");
	} catch (Exception $e) {
		$pdo->rollback();
		throw $e;
	}
	?>
</body>
</html>