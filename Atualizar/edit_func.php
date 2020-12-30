<!DOCTYPE html>
<html>
<head>
	<title>ALTERAÇÃO FUNCIONÁRIO</title>
	<?php
	// utf-encode e consulta composta
	$dsn = "mysql:host=localhost;dbname=const01";
	$user = "root";
	$pswd = "";	

	$pdo = new PDO($dsn, $user, $pswd);
	$dev = $pdo->query("SELECT * FROM funcionario WHERE id = ".$_GET['id']);
	?>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<center>
	<?php
	echo "<form action='up_func.php'>";
	foreach ($dev as $atr) {
		echo "<input type='hidden' name='id' value='".$atr['id']."'"."<p></p>";

		echo "<b>Nome do funcionário:</b> <input type='text' name='nome' value='".$atr['nome']."'"."<p></p>";

		echo "<b>RG:</b> <input type='text' name='rg' value='".$atr['rg']."'"."<p></p>";
		echo "<b>Data de nascimento:</b> <input type='text' name='data_de_nascimento' value='".$atr['data_de_nascimento']."'"."<p></p>";
		echo "<b>Contato:</b> <input type='text' name='contato' value='".$atr['contato']."'"."<p></p>";
		echo "<b>Id do funcionário supervisor:</b> <input type='text' name='id_func_sup' value='".$atr['id_func_supervisor']."'"."<p></p>";
		echo "<b>Id do cargo: </b>";
		echo "<select name='id_cargo'>";
		$cargo = $pdo->query("SELECT * FROM cargo");
		foreach ($cargo as $c) {
			$imp="";
			if($atr['id_cargo']==$c['id'])
			{
				$imp="selected";
			}
			echo "<option value='".$c['id']."' $imp>".$c['titulo']."</option>";
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