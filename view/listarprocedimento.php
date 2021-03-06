<?php 
error_reporting(0);
session_start();

if($_SESSION['nome'] == null){
  header("Location:../view/index.php");
}

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
	
	<table class="table">
	  <thead>
	    <tr>
	      <th scope="col">Código</th>
	      <th scope="col">Nome</th>
	      <th scope="col">Valor</th>
	      <th scope="col">Valor Min.</th>
	      <th scope="col">Valor Max.</th>
	      <th scope="col">Custo</th>
			<?php if($_SESSION['nivel'] <= 0 ) {?>
	      <th scope="col">Ação</th>
			<?php } ?>
	    </tr>
	  </thead>
	  <tbody>
<?php 

	foreach ($lista as $dados){
		echo'
		<tr>
	      <th scope="row">'.$dados->id.'</th>
	      <td>'.$dados->nome.'</td>
	      <td>'.str_replace('.',',',$dados->valor).'</td>
	      <td>'.str_replace('.',',',$dados->valormin).'</td>
	      <td>'.str_replace('.',',',$dados->valormax).'</td>
	      <td>'.str_replace('.',',',$dados->custo).'</td>';
				if($_SESSION['nivel']<=0){
		echo'
	      <td><a href="editarprocedimento.php?id='.$dados->id.'" class="btn btn-primary btn-sm" role="button">Editar</a></td>
	    </tr>
	    ';
				}
	}

?>
	    
	</table>
	<a href='buscarprocedimento.php' class='btn btn-danger' role='button'>Voltar</a>
</body>
</html>