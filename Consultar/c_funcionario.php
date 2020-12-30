<!DOCTYPE html>
<html>
<head>
	<title>CONSULTA FUNCIONÁRIOS</title>
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
	$rs = $pdo->query("SELECT f.id, f.nome, f.rg, f.data_de_nascimento, f.contato, f.id_func_supervisor, f.id_cargo, c.titulo FROM funcionario f, cargo c WHERE
		f.id_cargo = c.id order by f.id");
	echo "<table border=1>";
	echo "<tr style=background-color:white;color:black>
		<td><b> ID </b></td>
		<td><b> Nome </b></td>
		<td><b> RG </b></td>
		<td><b> Data de nascimento </b></td>
		<td><b> Contato </b></td>
		<td><b> Id funcionário supervisor </b></td>
		<td><b> Id Cargo </b></td>
	</tr>";
	foreach ($rs as $d) {
		echo "<tr>";
	 	echo "<td>".$d['id']."</td><td>".$d['nome']."</td><td>".$d['rg']."</td><td>".$d['data_de_nascimento']."</td><td></b> ".$d['contato']."</td><td>".$d['id_func_supervisor']."</td><td></b> ".$d['id_cargo']." - ".$d['titulo']."
	 		</td><td><a href='http://localhost/Crud/Remover/rem_func.php?id=".$d['id']."'> <input type='button' value='Remover' /> </a></td><td><a href='http://localhost/Crud/Atualizar/edit_func.php?id=".$d['id']."'> <input type='button' value='Alterar' /> </a></td>";
	 	echo "</tr>";
	} 
	echo "</table>";
	?>
	<p></p>
	<a href="http://localhost/Crud/"><input type="button" value="Menu"></a>
	</center>
</body>
</html>