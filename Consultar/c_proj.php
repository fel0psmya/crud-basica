<!DOCTYPE html>
<html>
<head>
	<title>CONSULTA PROJETOS</title>
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
	$rs = $pdo->query("SELECT p.id, p.apelido, p.descricao, p.id_dep, p.id_func_lider, d.sigla,f.nome FROM projeto p, departamento d, funcionario f WHERE
		p.id_func_lider = f.id and
		p.id_dep = d.id order by p.id");
	echo "<table border=1>";
	echo "<tr style=background-color:white;color:black>
		<td><b> ID </b></td>
		<td><b> Apelido </b></td>
		<td><b> Descrição </b></td> 
		<td><b> ID Departamento </b></td>
		<td><b> ID Funcionário líder </b></td>
	</tr>";
	foreach ($rs as $d) {
		echo "<tr>";
	 	echo "<td>".$d['id']."</td><td>".$d['apelido']."</td><td>".$d['descricao']."</td><td>".$d['id_dep']." - ".$d['sigla']."</td><td>".$d['id_func_lider']." - ".$d['nome']."
	 		</td><td><a href='http://localhost/Crud/Remover/rem_proj.php?id=".$d['id']."'> <input type='button' value='Remover' /> </a></td><td><a href='http://localhost/Crud/Atualizar/edit_proj.php?id=".$d['id']."'> <input type='button' value='Alterar' /> </a></td>";
	 	echo "</tr>";
	} 
	echo "</table>";
	?>
	<p></p>
	<a href="http://localhost/Crud/"><input type="button" value="Menu"></a>
	</center>
</body>
</html>