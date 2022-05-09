<?php
error_reporting(0);
session_start();

if ($_SESSION['nome'] == null) {
	header("Location:../view/index.php");
}

require_once '../control/paciente.controller.php';

$pac = new PacienteController();
$lista = $pac->listarDadosPaciente($_POST['etnome'], $_POST['etcpf']);


?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Lista de Pacientes</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
</head>

<body>

	<table class="table">
		<thead>
			<tr>
				<th scope="col">CPF</th>
				<th scope="col">Nome</th>
				<th scope="col">Fone</th>
				<th scope="col">Endereço</th>
				<th scope="col">Ações</th>
			</tr>
		</thead>
		<tbody>
			<?php

			foreach ($lista as $dados) {
				echo '
			<tr>
	      <th scope="row">' . $dados->cpf . '</th>
	      <td>' . $dados->nome . '</td>
	      <td>' . $dados->fone . '</td>
	      <td>' . $dados->endereco . '</td>
	      <td>
				<div class="btn-group" role="group">
					<button id="btnGroupDrop1" type="button" class="btn btn-primary btn-sm" data-bs-toggle="dropdown" aria-expanded="false">
						<svg xmlns="http://www.w3.org/2000/svg" id="Bold" viewBox="0 0 24 24" width="20" height="20">
							<path xmlns="http://www.w3.org/2000/svg" d="M1.51,6.079a1.492,1.492,0,0,1,1.06.44l7.673,7.672a2.5,2.5,0,0,0,3.536,0L21.44,6.529A1.5,1.5,0,1,1,23.561,8.65L15.9,16.312a5.505,5.505,0,0,1-7.778,0L.449,8.64A1.5,1.5,0,0,1,1.51,6.079Z" fill="#ffffff" data-original="#000000"/>
						</svg>
					</button>
					<ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
						<li><a class="dropdown-item" href="editarpaciente.php?cpf=' . $dados->cpf . '">Editar</a></li>
						<li><a class="dropdown-item" href="novopagamento.php?etcpf=' . $dados->cpf . '">Pagamentos</a></li>
						</ul>
				</div>
				</td>
	    </tr>
	    ';
			}

			?>
		</tbody>
	</table>
	<a href='buscarpaciente.php' class='btn btn-danger' role='button'>Voltar</a>
</body>

</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>