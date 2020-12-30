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
		$stm = $pdo->query("SELECT * from funcionario");
		foreach ($stm as $v) {
			$c += 1; 
		}
		
		echo "$c"+1;
	} catch (Exception $e) {
		$pdo->rollback();
		throw $e;
	}
	?> <p> </p>
	<b>Nome do funcionário:</b> <input type="text" name="nf"> <p></p>
	<b>RG:</b> <input type="text" name="rg"> <p></p>
	<b>Data de nascimento:</b> <input type="text" name="data"> <p></p>
	<b>Contato:</b> <input type="text" name="ct"> <p></p>
	<b>Id funcionário supervisor:</b>
	<select name="idfs">
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
	<b>Id cargo:</b>
	<select name="idc">
		<?php
		try {
			$stm = $pdo->query("SELECT * FROM cargo");
			foreach ($stm as $v) {
				echo "<option value='".$v['id']."'>".$v['titulo']."</option>";
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
		if (isset($_POST['nf']) && isset($_POST['rg']) && isset($_POST['data']) && isset($_POST['ct']) && isset($_POST['idfs']) && isset($_POST['idc'])) {

			if (!$_POST['nf']=="" && !$_POST['rg']=="" && !$_POST['data']=="" && !$_POST['ct']=="" && !$_POST['idfs']=="" && !$_POST['idc']=="") {
			try {
				$pdo->beginTransaction();
				$stm = $pdo->exec("INSERT INTO funcionario VALUES
					(default, '".$_POST['nf']."','".$_POST['rg']."','".$_POST['data']."','".$_POST['ct']."','".$_POST['idfs']."', '".$_POST['idc']."')");
				echo "<script>alert('Castrado com sucesso!')</script>";
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