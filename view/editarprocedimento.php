<?php 
error_reporting(0);

session_start();

if($_SESSION['nome'] == null){
  header("Location:../view/index.php");
}

require_once '../control/procedimento.controller.php';

$id = $_GET['id'];

$proc = new ProcedimentoController();
$lista = $proc->listarProcedimento("",$id);


?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Editar Procedimento</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
</head>
<body>

	<?php 
	foreach ($lista as $dados){
	}
	?>

	<form method="post" action="../control/procedimento.controller.php?evento=editarProcedimento">
      <table>
        <tbody>
          <tr>
          	<th>Código*</th>
          	<th style='width:1%'></th>
            <th>Especialidade*</th>
            <th style='width:1%'></th>
            <th>Nome do Procedimento*</th>
          </tr>
          <tr>
          	<td>
          		<input class='form-control btn-sm' readonly name='etcod' required type='text' <?php echo "value='".$dados->id."'" ?>>
          	</td>
          	<td style='width:1%'></td>
            <td>
            	<input readonly class='form-control btn-sm' name='etespec' required type='text' <?php echo "value='".$dados->especialidade."'"; ?>>
            </td>
            <td style='width:1%'></td>
            <td colspan='5'>
              <input readonly class='form-control btn-sm' name='etnome' required type='text' <?php echo "value='".$dados->nome."'"; ?>>
            </td>
          </tr>
          <tr>
            <th>Valor Padão*</th>
            <th style='width:1%'></th>
            <th>Valor Mínimo*</th>
            <th style='width:1%'></th>
            <th>Valor Máximo*</th>
            <th style='width:1%'></th>
            <th>Custo</th>
          </tr>
          <tr>
            <td>
              <input class='form-control btn-sm' name='etvalor' required type='text'  onkeypress="$(this).mask('00.000,00', {reverse: true});" <?php echo "value='".str_replace('.',',',$dados->valor)."'"; ?>>
            </td>
            <td style='width: 1%'></td>
            <td>
              <input class='form-control btn-sm' name='etvalmin' required type='text' onkeypress="$(this).mask('00.000,00', {reverse: true});" <?php echo "value='".str_replace('.',',',$dados->valormin)."'"; ?>>
            </td>
            <td style='width:1%'></td>
            <td>
              <input class='form-control btn-sm' name='etvalmax' required type='text' onkeypress="$(this).mask('00.000,00', {reverse: true});" <?php echo "value='".str_replace('.',',',$dados->valormax)."'"; ?>>
            </td>
            <td style='width:1%'></td>
            <td>
              <input class='form-control btn-sm' name = 'etcusto' required type='text' onkeypress="$(this).mask('00.000,00', {reverse: true});" <?php echo "value='".str_replace('.',',',$dados->custo)."'"; ?>>
            </td>
          </tr>
          <tr>
            <th>
              Ação
            </th>
          </tr>      
          <tr>
            <td>
              <input type='submit' class='btn btn-success btn-sm' value='Salvar'>
              <a href='buscarprocedimento.php' class='btn btn-danger btn-sm' role='button'>Cancelar</a>
            </td>
            <td style='width:1%'></td>
            <td>
              <input class='form-control' name='situacao' type='hidden' >
            </td>            
          </tr>
        </tbody>
      </table>
    </form>


	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>

	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
</body>
</html>