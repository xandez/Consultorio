<?php 
error_reporting(0);
session_start();

if($_SESSION['nome'] == null || $_SESSION['nivel'] > 0){
  header("Location:../view/index.php");
}

require_once '../control/funcionario.controller.php';

$pac = new FuncionarioController();
$lista = $pac->listarDadosfuncionario("",$_POST['etnome'],$_POST['etcpf']);


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Lista de Funcionario</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
</head>
<body>
	
	<table class="table">
	  <thead>
	    <tr>
	      <th scope="col">CPF</th>
	      <th scope="col">Nome</th>
	      <th scope="col">Função</th>
	      <th scope="col">Situação</th>
        <th scope="col">Ação</th>
	    </tr>
	  </thead>
	  <tbody>
<?php 

	foreach ($lista as $dados){
		echo'
		<tr>
	      <th scope="row">'.$dados->cpf.'</th>
	      <td>'.$dados->nome.'</td>
	      <td>'.$dados->funcao.'</td>
	      <td>'.$dados->status.'</td>
	      <td><a href="editarfuncionario.php?cpf='.$dados->cpf.'" class="btn btn-primary btn-sm" role="button">Editar</a></td>
	    </tr>
	    ';
	}

?>
	    
	</table>
	<a href='buscarfuncionario.php' class='btn btn-danger' role='button'>Voltar</a>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
</body>
</html>