<!DOCTYPE html>
<html>
<head>
	<title>CONSULTA CARGOS</title>
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
	$rs = $pdo->query("SELECT c.id, c.titulo, c.salario_inicial, c.id_dep, d.sigla FROM cargo c, departamento d WHERE
		c.id_dep = d.id order by c.id");
	echo "<table border=1>";
	echo "<tr style=background-color:white;color:black>
		<td><b> ID </b></td>
		<td><b> Título do cargo </b></td>
		<td><b> Salário inicial </b></td> 
		<td><b> Id Departamento </b></td>
	</tr>";
	foreach ($rs as $d) {
		echo "<tr>";
	 	echo "<td>".$d['id']."</td><td>".$d['titulo']."</td><td>".$d['salario_inicial']." </td><td>".$d['id_dep']." - ".$d['sigla']."
	 		</td><td><a href='http://localhost/Crud/Remover/rem_cargo.php?id=".$d['id']."'> <input type='button' value='Remover' /> </a></td><td><a href='http://localhost/Crud/Atualizar/edit_cargo.php?id=".$d['id']."'> <input type='button' value='Alterar' /> </a></td>";
	 	echo "</tr>";
	} 
	echo "</table>";
	?>
	<p></p>
	<a href="http://localhost/Crud/index.php"><input type="button" value="Menu"></a>
	</center>
</body>
</html>