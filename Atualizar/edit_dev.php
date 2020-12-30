<!DOCTYPE html>
<html>
<head>
	<title>ALTERAÇÃO DESENVOLVE</title>
	<?php
	// utf-encode e consulta composta
	$dsn = "mysql:host=localhost;dbname=const01";
	$user = "root";
	$pswd = "";	

	$pdo = new PDO($dsn, $user, $pswd);
	$dev = $pdo->query("SELECT * FROM desenvolve WHERE id = ".$_GET['id']);
	?>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<center>
	<?php
	echo "<form action='up_dev.php'>";
	foreach ($dev as $atr) {
		echo "<input type='hidden' name='id' value='".$atr['id']."'"."<p></p>";
		echo "<b>Id funcionário:</b>";
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

		echo "<b>Id projeto:</b> <select name='id_proj'>";
		$proj = $pdo->query("SELECT * FROM projeto");
		foreach ($proj as $p) {
			$imp="";
			if($atr['id_proj']==$p['id']){
				$imp='selected';
			}
			echo "<option value='".$p['id']."' $imp>".$p['apelido']."</option>";
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