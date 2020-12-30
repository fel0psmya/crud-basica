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
	$id_func = $_GET['id_func'];
	$id_proj = $_GET['id_proj'];
	?>
</head>
<body>
	<?php
	try {
		$pdo->beginTransaction();
		$pdo->exec("UPDATE desenvolve SET id=$id, id_func=$id_func, id_proj=$id_proj  WHERE id =".$_GET['id']."");
		$pdo->commit();
		echo "<script>alert('Atualizado com sucesso!');</script>";
		header("location:http://localhost/Crud/Consultar/c_dev.php");
	} catch (Exception $e) {
		$pdo->rollback();
		throw $e;
	}
	?>
</body>
</html>