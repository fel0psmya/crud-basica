<!DOCTYPE html>
<html>
<head>
	<title>CONSULTA DEPARTAMENTO</title>
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
	<?php
	$rs = $pdo->query("SELECT * FROM departamento d order by d.id");
	echo "<table border=1>";
	echo "<tr style=background-color:white;color:black>
		<td><b> ID </b></td>
		<td><b> Nome do departamento </b></td>
		<td><b> Sigla </b></td> 
		<td><b> Id Departamento Principal </b></td>
	</tr>";
	foreach ($rs as $d) {
		echo "<tr>";
	 	echo "<td>".$d['id']."</td><td>".$d['nome']."</td><td>".$d['sigla']."</td><td>".$d['id_dep_principal']."
	 		</td><td><a href='http://localhost/Crud/Remover/rem_dep.php?id=".$d['id']."'> <input type='button' value='Remover' /> </a></td><td><a href='http://localhost/Crud/Atualizar/edit_dep.php?id=".$d['id']."'> <input type='button' value='Alterar' /> </a></td>";
	 	echo "</tr>";
	} 
	echo "</table>";
	?>
	<p></p>
	<a href="http://localhost/Crud/"><input type="button" value="Menu"></a>
	</center>
</body>
</html>