<!DOCTYPE html>
<html>
<head>
	<title>CONSULTA DEPENDENTE</title>
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
	$rs = $pdo->query("SELECT d.id, d.d_nome, d.data_de_nascimento, d.id_func, f.nome FROM dependente d, funcionario f WHERE 
		d.id_func = f.id order by d.id");
	echo "<table border=1>";
	echo "<tr style=background-color:white;color:black>
		<td><b> ID </b></td>
		<td><b> Nome do dependente </b></td>
		<td><b> Data de nascimento </b></td> 
		<td><b> Id func </b></td>
	</tr>";
	foreach ($rs as $d) {
		echo "<tr>";
	 	echo "<td>".$d['id']."</td><td>".$d['d_nome']."</td><td>".$d['data_de_nascimento']." </td><td>".$d['id_func']." - ".$d['nome']."</td><td><a href='http://localhost/Crud/Remover/rem_depende.php?id=".$d['id']."'> <input type='button' value='Remover' /> </a></td><td><a href='http://localhost/Crud/Atualizar/edit_depende.php?id=".$d['id']."'> <input type='button' value='Alterar' /> </a></td>";
	 	echo "</tr>";
	} 
	echo "</table>";
	?>
	<p></p>
	<a href="http://localhost/Crud/"><input type="button" value="Menu"></a>
	</center>
</body>
</html>