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
		$stm = $pdo->query("SELECT * from cargo");
		foreach ($stm as $v) {
			$c += 1; 
		}
		
		echo "$c"+1;
	} catch (Exception $e) {
		$pdo->rollback();
		throw $e;
	}
	?> <p> </p>
	<b>Nome do cargo:</b> <input type="text" name="nc"> <p></p>
	<b>Salário inicial:</b> <input type="number" name="si"> <p></p>
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
	<input type="submit">
	<p></p>
	</form>

	<a href="http://localhost/Crud/"><input type="button" value="Página inicial"></a>
	</center>
	<?php
		if (isset($_POST['nc']) && isset($_POST['si']) && isset($_POST['iddp'])) {
			if (!$_POST['nc']=="" && !$_POST['si']=="" && !$_POST['iddp']=="") {
			try {
				$pdo->beginTransaction();
				$stm = $pdo->exec("INSERT INTO cargo VALUES
					(default, '".$_POST['nc']."','".$_POST['si']."','".$_POST['iddp']."')");
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