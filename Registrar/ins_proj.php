<!DOCTYPE html>
<html>
<head>
	<title>INSERÇÃO</title>
	<?php
	$dsn = "mysql:host=localhost;dbname=const01";
	$user = "root";
	$pswd = "";

	$pdo = new PDO($dsn, $user, $pswd);
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
		$stm = $pdo->query("SELECT * from projeto");
		foreach ($stm as $v) {
			$c += 1; 
		}
		
		echo "$c"+1;
	} catch (Exception $e) {
		$pdo->rollback();
		throw $e;
	}
	?> <p> </p>
	<b>Apelido do projeto:</b> <input type="text" name="ap"> <p></p>
	<b>Descrição:</b> <input type="text" name="desc"> <p></p>
	<b>Id departamento:</b> 
	<select name="iddp">
		<?php
		try {
			$stm = $pdo->query("SELECT * FROM departamento");
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
	<b>Id funcionário líder:</b> 
	<select name="idfl">
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
	<input type="submit">
	<p></p><p></p>
	
	</form>

	<a href="http://localhost/Crud/"><input type="button" value="Página inicial"></a>

	</center>

	<?php
		if (isset($_POST['ap']) && isset($_POST['desc']) && isset($_POST['iddp']) && isset($_POST['idfl'])) {

			if (!$_POST['ap']=="" && !$_POST['desc']=="" && !$_POST['iddp']=="" && !$_POST['idfl']=="") {
			try {
				$pdo->beginTransaction();
				$stm = $pdo->exec("INSERT INTO projeto VALUES
					(default, '".$_POST['ap']."','".$_POST['desc']."','".$_POST['iddp']."','".$_POST['idfl']."')");
				echo "<script>alert('Cadastrado com sucesso!')</script>";
				$pdo->commit();
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