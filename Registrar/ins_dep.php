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
		$stm = $pdo->query("SELECT * from departamento");
		foreach ($stm as $v) {
			$c += 1; 
		}
		
		echo "$c"+1;
	} catch (Exception $e) {
		$pdo->rollback();
		throw $e;
	}
	?> 
	<p> </p>
	<b>Nome do departamento:</b> <input type="text" name="ndep"> <p></p>
	<b>Sigla:</b> <input type="text" name="sig"> <p></p>
	<b>Id departamento principal:</b> 
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
	</form>

	<a href="http://localhost/Crud/"><input type="button" value="Página inicial"></a>
	</center>
	
	<?php
		if (isset($_POST['ndep']) && isset($_POST['sig']) && isset($_POST['iddp'])) {
			if (!$_POST['ndep']=="" && !$_POST['sig']=="" && !$_POST['iddp']=="") {
			try {
				$pdo->beginTransaction();
				$stm = $pdo->exec("INSERT INTO departamento VALUES
					(default, '".$_POST['ndep']."','".$_POST['sig']."','".$_POST['iddp']."')");
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