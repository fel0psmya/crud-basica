<!DOCTYPE html>
<html>
<head>
	<title>REMOÇÃO</title>
	<?php
	$dsn = "mysql:host=localhost;dbname=const01";
	$user = "root";
	$pswd = "";	

	$pdo = new PDO($dsn, $user, $pswd);
	?>
</head>
<body>
	<?php
	try {
		$pdo->beginTransaction();
		$pdo->exec("DELETE FROM cargo WHERE id =".$_GET['id']);
		$pdo->commit();
		echo "<script>alert('Deletado');</script>";
		header("location:http://localhost/Crud/Consultar/c_cargo.php");
	} catch (Exception $e) {
		$pdo->rollback();
		throw $e;
	}
	?>
</body>
</html>