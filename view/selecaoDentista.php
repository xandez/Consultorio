<?php 
error_reporting(0);
session_start();

if($_SESSION['nome'] == null){
  header("Location:../view/index.php");
}
require_once '../control/funcionario.controller.php';

$func = new FuncionarioController();
$lista = $func->listarDadosFuncionario('Dentista','','');

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
  <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
</head>
<body>
	<form method="post" action="calendario.php">
		<table>
      <tbody>
        <tr>
          <th colspan='12'>Selecione o Dentista:</th>
          <th style='width:1%'></th>
          <th></th>
        </tr>
        <tr>
          <td colspan='12'>
          	<select class ='form-control select' name ='etfunc'>
          		<?php 

          			foreach($lista as $dados){
          				echo'
										<option value ="'.$dados->nome.'">'.$dados->nome.'</option>          				
          				';
          			}
          		 ?>
	        	</select>
          </td>
          <td style='width:1%'></td>
          <td >
            <input type='submit' class='btn btn-success' value='Buscar'>
            <a href='' id="btcancelar"  class='btn btn-danger' role='button'>Cancelar</a>
          </td>
        </tr>
      </tbody>
    </table>
	</form>	
  <script>
    $('#btcancelar').click(function(){
      alert("teste");
      $.ajax({
        method: "POST",
        url: "../control/funcionario.controller.php?evento=cadastrar",
        data: {etnome: 'Teste', etcpf: '00100', etfuncao:'gerente', etadmissao:'2021-12-12', etstatus:'ativo', etrg:'0101', etsalario:'0', etdemissao: '0000-00-00'}
      });
    });    

    
  </script>
</body>
</html>