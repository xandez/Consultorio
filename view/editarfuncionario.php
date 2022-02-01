<?php 
error_reporting(0);
session_start();

if($_SESSION['nome'] == null){
  header("Location:../view/index.php");
}

require_once '../control/funcionario.controller.php';

$cpf = $_GET['cpf'];

$pac = new FuncionarioController();
$lista = $pac->listarDadosFuncionario("","",$cpf);


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Editar Funcionario</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
</head>
<body>
	
	<?php 
	foreach ($lista as $dados){

   }
   ?>
  <form method="post" action="../control/funcionario.controller.php?evento=editarFuncionario">
    <table>
      <tbody>
        <tr>
          <th>Cpf*</th>
          <th style='width:1%'></th>
          <th>RG*</th>
          <th style='width:1%'></th>
          <th>Nome Completo*</th>
        </tr>
        <tr>
          <td>
            <input readonly class='form-control btn-sm' name='etcpf' required minlength="14" maxlength="14" type='text'  onkeypress="$(this).mask('000.000.000-00');" <?php echo "value='".$dados->cpf."'"; ?>>
          </td>
          <td style='width:1%'></td>
          <td>
            <input readonly class='form-control btn-sm' name='etrg' minlength="12" maxlength="12" type='text'  onkeypress="$(this).mask('99.999.999-9');" <?php echo "value='".$dados->rg."'"; ?>>
          </td>
          <td style='width:1%'></td>
          <td  colspan="5">
            <input readonly class='form-control btn-sm' name='etnome' required type='text' <?php echo "value='".$dados->nome."'"; ?>>
          </td>
        </tr>
        <tr>
          <th>Função</th>
          <th style='width:1%'></th>
          <th>Salário</th>
          <th style='width:1%'></th>
          <th>Admissão</th>
          <th style='width:1%'></th>
          <th>Status</th>
          <th style='width:1%'></th>
          <th>Demissão</th>
        </tr>
        <tr>
          <td>
            <select class ='form-control select btn-sm' name="etfuncao">
              <?php echo "<option value = '".$dados->funcao."'>".$dados->funcao."</option>"; ?>
              <option value="Auxiliar">Auxiliar</option>
              <option value="Dentista">Dentista</option>
              <option value="Gerente">Gerente</option>
              <option value="Recepcionista">Recepcionista</option>
              <option value="Supervisor">Supervisor</option>
            </select>
          </td>
          <td style='width: 1%'></td>
          <td>
            <input class='form-control btn-sm' name='etsalario' required type='text'  onkeypress="$(this).mask('00.000,00', {reverse: true});" <?php echo "value='".$dados->salario."'"; ?> >
          </td>
          <td style='width: 1%'></td>
          <td>
            <input class='form-control btn-sm' type="date" name="etadmissao"<?php echo "value='".$dados->admissao."'"; ?>>
          </td>
          <td style='width: 1%'></td>
          <td>
            <select class ='form-control select btn-sm' name="etstatus">
              <?php echo "<option value = '".$dados->status."'>".$dados->status."</option>"; ?>
              <option value="Ativo">Ativo</option>
              <option value="Inativo">Inativo</option>
            </select>
          </td>
          <td style='width: 1%'></td>
          <td>
            <input class='form-control btn-sm' type="date" name="etdemissao" value="">
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
            <a href='buscarpaciente.php' class='btn btn-danger btn-sm' role='button'>Cancelar</a>
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