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
	$titulo = $_GET['titulo'];
	$si = $_GET['salario_inicial'];
	$id_dep = $_GET['id_dep'];
	?>
</head>
<body>
	<?php
	try {
		$pdo->beginTransaction();
		$pdo->exec("UPDATE cargo SET id=$id, titulo='$titulo', salario_inicial=$si, id_dep=$id_dep  WHERE id =".$_GET['id']."
			");
		$pdo->commit();
		echo "<script>alert('Atualizado com sucesso!');</script>";
		header("location:http://localhost/Crud/Consultar/c_cargo.php");
	} catch (Exception $e) {
		$pdo->rollback();
		throw $e;
	}
	?>
</body>
</html>