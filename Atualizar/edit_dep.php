<!DOCTYPE html>
<html>
<head>
	<title>ALTERAÇÃO DEPARTAMENTO</title>
	<?php
	// utf-encode e consulta composta
	$dsn = "mysql:host=localhost;dbname=const01";
	$user = "root";
	$pswd = "";	

	$pdo = new PDO($dsn, $user, $pswd);
	$dev = $pdo->query("SELECT * FROM departamento WHERE id = ".$_GET['id']);
	?>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<center>
	<?php
	echo "<form action='up_dep.php'>";
	foreach ($dev as $atr) {
		echo "<input type='hidden' name='id' value='".$atr['id']."'"."<p></p>";

		echo "<b>Nome do departamento:</b> <input type='text' name='nome' value='".$atr['nome']."'"."<p></p>";

		echo "<b>Sigla:</b> <input type='text' name='sigla' value='".$atr['sigla']."'"."<p></p>";
		echo "<b>Id do departamento principal:</b> <input type='text' name='id_dep_principal' value='".$atr['id_dep_principal']."'"."<p></p>";
	}
	echo "<input type='submit' />"."<p></p>";
	echo "</form>";
	?>
	<p></p>
	<a href="http://localhost/Crud/"><input type="button" value="Menu"></a>
	</center>
</body>
</html>