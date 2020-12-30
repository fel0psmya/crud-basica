<!DOCTYPE html>
<html>
<head>
	<title>CONSULTA DESENVOLVE</title>
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
	// CONSULTA
	$rs = $pdo->query("SELECT d.id, d.id_func, d.id_proj, p.apelido, f.nome FROM desenvolve d, projeto p, funcionario f
		WHERE 
		f.id = d.id_func and
		p.id = d.id_proj order by d.id
		");
	echo "<table border=1>";
	echo "<tr style=background-color:white;color:black>
		<td><b> ID </b></td>
		<td><b> Id do funcionário </b></td>
		<td><b> Id do projeto </b></td> 
	</tr>";
	foreach ($rs as $d) {
		echo "<tr>"; 
	 	echo "<td>".$d['id']."</td><td>".$d['id_func']." - ".$d['nome']."</td><td>".$d['id_proj']." - ".$d['apelido']."
	 		</td><td><a href='http://localhost/Crud/Remover/rem_dev.php?id=".$d['id']."'> <input type='button' value='Remover' /> </a></td><td><a href='http://localhost/Crud/Atualizar/edit_dev.php?id=".$d['id']."'> <input type='button' value='Alterar' /> </a></td>";
	 	echo "</tr>";
	} 
	echo "</table>";
	?>
	<p></p>
	<a href="http://localhost/Crud/"><input type="button" value="Menu"></a>
	</center>
</body>
</html>