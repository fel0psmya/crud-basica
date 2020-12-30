<!DOCTYPE html>
<html>
<head>
	<title>INSERÇÃO</title>
	<?php
	$dsm = "mysql:host=localhost;dbname=const01";
	$user = "root";
	$psd = "";

	$pdo = new PDO($dsm, $user, $psd);
	?>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<center>
	<form method="POST">
	
	<b>ID:</b>
	<?php 
	try {
		$c = 0;
		$stm = $pdo->query("SELECT * from desenvolve");
		foreach ($stm as $v) {
			$c += 1; 
		}
		
		echo "$c"+1;
	} catch (Exception $e) {
		$pdo->rollback();
		throw $e;
	}
	?> <p> </p>
	<b>Id funcionário:</b> 
	<select name="idf">
		<?php
		try {
			$stm = $pdo->query("SELECT * FROM funcionario");
			foreach ($stm as $v) {
				echo "<option value='".$v['id']."'>".$v['nome']."</option>";
			}
		} catch (Exception $e) {
			$pdo->rollback();
			throw $e;
		}
		?>
	</select>
	<p></p>
	<b>Id do projeto:</b>
	<select name="idp">
		<?php
		try {
			$stm = $pdo->query("SELECT * FROM projeto");
			foreach ($stm as $v) {
				echo "<option value='".$v['id']."'>".$v['apelido']."</option>";
			}
		} catch (Exception $e) {
			$pdo->rollback();
			throw $e;
		}
		?>
	</select>
	<p></p>
	<input type="submit">
	<p></p>
	</form>

	<a href="http://localhost/Crud/"><input type="button" value="Página inicial"></a>
	</center>
	
	<?php
		if (isset($_POST['idf']) && isset($_POST['idp'])) {
			if (!$_POST['idf']=="" && !$_POST['idp']=="") {
			try {
				$pdo->beginTransaction();
				$stm = $pdo->exec("INSERT INTO desenvolve VALUES
					(default, '".$_POST['idf']."','".$_POST['idp']."')");
				$pdo->commit();
				echo "<script>alert('Cadastrado com sucesso!')</script>";
			} catch (Exception $e) {
				$pdo->rollback();
				throw $e;
			}
			} else {
				echo "<script>alert('ERRO: Campos vazios')</script>";
			}
		}
	?>
</body>
</html>