<?php 
error_reporting(0);

require_once '../control/procedimento.controller.php';

$proc = new ProcedimentoController();
$lista = $proc->listarProcedimento($_POST['etnome'],$_POST['etid']);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Lista de Procedimentos</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
</head>
<body>
	<a href='buscarprocedimento.php' class='btn btn-danger' role='button'>Voltar</a>
	<table class="table">
	  <thead>
	    <tr>
	      <th scope="col">Código</th>
	      <th scope="col">Nome</th>
	      <th scope="col">Valor</th>
	      <th scope="col">Valor Min.</th>
	      <th scope="col">Valor Max.</th>
	      <th scope="col">Custo</th>
	      <th scope="col">Ação</th>
	    </tr>
	  </thead>
	  <tbody>
<?php 

	foreach ($lista as $dados){
		echo'
		<tr>
	      <th scope="row">'.$dados->id.'</th>
	      <td>'.$dados->nome.'</td>
	      <td>'.$dados->valor.'</td>
	      <td>'.$dados->valormin.'</td>
	      <td>'.$dados->valormax.'</td>
	      <td>'.$dados->custo.'</td>
	      <td><a href="editarprocedimento.php?id='.$dados->id.'" class="btn btn-primary btn-sm" role="button">Editar</a></td>
	    </tr>
	    ';
	}

?>
	    
	</table>
</body>
</html>