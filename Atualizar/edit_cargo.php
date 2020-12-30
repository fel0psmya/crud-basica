<!DOCTYPE html>
<html>
<head>
	<title>ALTERAÇÃO CARGO</title>
	<?php
	// utf-encode e consulta composta
	$dsn = "mysql:host=localhost;dbname=const01";
	$user = "root";
	$pswd = "";	

	$pdo = new PDO($dsn, $user, $pswd);
	$dev = $pdo->query("SELECT * FROM cargo WHERE id = ".$_GET['id']);
	?>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<center>
	<?php
	echo "<form action='up_cargo.php'>";
	foreach ($dev as $atr) {
		echo "<input type='hidden' name='id' value='".$atr['id']."'"."<p></p>";

		echo "<b>Título do cargo:</b> <input type='text' name='titulo' value='".$atr['titulo']."'"."<p></p>";

		echo "<b>Salário inicial:</b> <input type='text' name='salario_inicial' value='".$atr['salario_inicial']."'"."<p></p>";
		echo "<b>Id do departamento: </b>";
		echo "<select name='id_dep'>";
		$dep = $pdo->query("SELECT * FROM departamento");
		foreach ($dep as $d) {
			$imp="";
			if($atr['id_dep']==$d['id'])
			{
				$imp="selected";
			}
			echo "<option value='".$d['id']."' $imp>".$d['nome']."</option>";
		}
		echo "</select> <p></p>";
	}
	echo "<input type='submit' />"."<p></p>";
	echo "</form>";
	?>
	<p></p>
	<a href="http://localhost/Crud/"><input type="button" value="Menu"></a>
	</center>
</body>
</html>