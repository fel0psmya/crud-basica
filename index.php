<!DOCTYPE html>
<html>
<head>
	<title>CONSTRUTORA</title>
	<meta charset="utf-8">
	<?php
	$dsn = "mysql:host=localhost;dbname=const01";
	$user = "root";
	$pswd = "";

	$pdo = new PDO($dsn, $user, $pswd);
	?>
	<link rel="stylesheet" href="Imagens e Estilo/style.css">
</head>
<body>
	<center class='i'>
	<h1><b>CRUD CONSTRUTORA</b></h1> <hr/> <p></p>
	<table>
		<tr>
			<td><b>TABELAS</b></td>
			<td><b>REGISTRO</b> <img src="Imagens e Estilo/ins.png" height="22px" width="22px"> &nbsp </td>
			<td><b>PESQUISA</b> <img src="Imagens e Estilo/loupe.png" height="22px" width="22px"></td>
		</tr>
		<tr>
			<td>Cargos</td>
			<td> <a href="Registrar/ins_cargo.php"><input type="button" value="Registrar"> </a> </td>
			<td> <a href="Consultar/c_cargo.php"><input type="button" value="Pesquisar"> </a> </td>

		<tr>
			<td>Departamentos</td>
			<td> <a href="Registrar/ins_dep.php"><input type="button" value="Registrar"> </a> </td>
			<td> <a href="Consultar/c_departamento.php"><input type="button" value="Pesquisar"> </a> </td>
		</tr>
		<tr>
			<td>Dependentes</td>
			<td> <a href="Registrar/ins_depend.php"><input type="button" value="Registrar"> </a> </td>
			<td> <a href="Consultar/c_dependente.php"><input type="button" value="Pesquisar"> </a> </td>
		</tr>
		<tr>
			<td>Funcionários</td>
			<td> <a href="Registrar/ins_func.php"><input type="button" value="Registrar"> </a> </td>
			<td> <a href="Consultar/c_funcionario.php"><input type="button" value="Pesquisar"> </a> </td>
		</tr>
		<tr>
			<td>Desenvolvimento</td>
			<td> <a href="Registrar/ins_dev.php"><input type="button" value="Registrar"> </a> </td>
			<td> <a href="Consultar/c_dev.php"><input type="button" value="Pesquisar"> </a> </td>
		</tr>
		<tr>
			<td>Projetos</td>
			<td> <a href="Registrar/ins_proj.php"><input type="button" value="Registrar"> </a> </td>
			<td> <a href="Consultar/c_proj.php"><input type="button" value="Pesquisar"> </a> </td>
		</tr>
	</table>
	<p></p>
	</center>
</body>
</html>