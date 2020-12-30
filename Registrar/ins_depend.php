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
	<h3>
	<b>ID:</b>
	<?php 
	try {
		$c = 0;
		$stm = $pdo->query("SELECT * from dependente");
		foreach ($stm as $v) {
			$c += 1; 
		}
		
		echo "$c"+1;
	} catch (Exception $e) {
		$pdo->rollback();
		throw $e;
	}
	?> <p> </p>
	<b>Nome do dependente:</b> <input type="text" name="ndep"> <p></p>
	<b>Data de nascimento:</b> <input type="date" name="data"> <p></p>
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
	<input type="submit">
	</form>
	<p></p>
	<a href="http://localhost/Crud/"><input type="button" value="Página inicial"></a>
	</center>

	<?php
		if (isset($_POST['ndep']) && isset($_POST['data']) && isset($_POST['idf'])) {
			if (!$_POST['ndep']=="" && !$_POST['data']=="" && !$_POST['idf']=="") {
			try {
				$pdo->beginTransaction();
				$stm = $pdo->exec("INSERT INTO dependente VALUES
					(default, '".$_POST['ndep']."','".$_POST['data']."','".$_POST['idf']."')");
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