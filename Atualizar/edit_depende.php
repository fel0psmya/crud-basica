<!DOCTYPE html>
<html>
<head>
	<title>ALTERAÇÃO DEPENDENTE</title>
	<?php
	// utf-encode e consulta composta
	
	$dsn = "mysql:host=localhost;dbname=const01";
	$user = "root";
	$pswd = "";	

	$pdo = new PDO($dsn, $user, $pswd);
	$dev = $pdo->query("SELECT * FROM dependente WHERE id = ".$_GET['id']);
	?>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<center>
	<?php
	echo "<form action='up_depende.php'>";
	foreach ($dev as $atr) {
		echo "<input type='hidden' name='id' value='".$atr['id']."'> <p></p>";

		echo "<b>Nome do dependente:</b> <input type='text' name='d_nome' value='".$atr['d_nome']."'"."<p></p>";
		echo "<b>Data de nascimento:</b> <input type='date' name='data_de_nascimento' value='".$atr['data_de_nascimento']."'"."<p></p>";
		echo "<b>Id do funcionário: </b>";
		echo "<select name='id_func'>";
		$func = $pdo->query("SELECT * FROM funcionario");
		foreach ($func as $f) {
			$imp="";
			if($atr['id_func']==$f['id'])
			{
				$imp="selected";
			}
			echo "<option value='".$f['id']."' $imp>".$f['nome']."</option>";
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