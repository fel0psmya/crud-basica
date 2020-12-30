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
	$sigla = $_GET['sigla'];
	$id_dep_principal = $_GET['id_dep_principal'];
	?>
</head>
<body>
	<?php
	try {
		$pdo->beginTransaction();
		$pdo->exec("UPDATE departamento SET id=$id, nome='$nome', sigla='$sigla', id_dep_principal=$id_dep_principal  WHERE id =".$_GET['id']."
			");
		$pdo->commit();
		echo "<script>alert('Atualizado com sucesso!');</script>";
		header("location:http://localhost/Crud/Consultar/c_departamento.php");
	} catch (Exception $e) {
		$pdo->rollback();
		throw $e;
	}
	?>
</body>
</html>