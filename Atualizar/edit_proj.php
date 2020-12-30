	<!DOCTYPE html>
<html>
<head>
	<title>ALTERAÇÃO PROJETO</title>
	<?php
	// utf-encode e consulta composta
	$dsn = "mysql:host=localhost;dbname=const01";
	$user = "root";
	$pswd = "";	

	$pdo = new PDO($dsn, $user, $pswd);
	$dev = $pdo->query("SELECT * FROM projeto WHERE id = ".$_GET['id']);
	?>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<center>
	<?php
	echo "<form action='up_proj.php'>";
	foreach ($dev as $atr) {
		echo "<input type='hidden' name='id' value='".$atr['id']."'"."<p></p>";

		echo "<b>Apelido do projeto:</b> <input type='text' name='apelido' value='".$atr['apelido']."'"."<p></p>";
		echo "<b>Descrição:</b> <input type='text' name='descricao' value='".$atr['descricao']."'"."<p></p>";
		echo "<b>Id departamento: </b>";
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

		echo "<b>Id func líder: </b>";
		echo "<select name='id_func_lider'>";
		$func = $pdo->query("SELECT * FROM funcionario");
		foreach ($func as $f) {
			$imp="";
			if($atr['id_func_lider']==$f['id'])
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