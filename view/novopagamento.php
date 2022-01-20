<?php 
error_reporting(0);
date_default_timezone_set('America/Belem');
session_start();

if($_SESSION['nome'] == null){
  header("Location:../view/index.php");
}

require_once '../control/pagamento.controller.php';
require_once '../control/paciente.controller.php';
require_once '../control/pagamento.controller.php';

$cpf = $_GET['etcpf'];
//listar dados do paciente selecionado
$paciente = new PacienteController();
$listarpaciente = $paciente->listarDadosPaciente("",$cpf);

foreach ($listarpaciente as $dados){
}

$saldo = new PagamentoController();
$saldopaciente = $saldo->listarSaldo($cpf);
//print_r($saldopaciente);
foreach ($saldopaciente as $dados1){

}


?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pagamento</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
</head>
<body>
  <form method="POST" action="../control/pagamento.controller.php?evento=cadastrar">
    <table>
      <tbody>
        <tr>
          <th>Cliente</th>
          <th style="width:1%;"></th>
          <th>Valor</th>
          <th style="width:1%;"></th>
          <th>Data Pagamento</th>
          <th style="width:1%;"></th>
          <th>Tipo de Pagamento</th>
        </tr>
        <tr>
          <td>
            <input type="hidden" name="etcpf"<?php echo "value='".$cpf."'"; ?> >
            <input readonly class='form-control' name='etnome' required type='text' <?php echo "value='".$dados->nome."'"; ?>>
          </td>
          <td style='width:1%'></td>
          <td>
            <input class='form-control' name='etvalor' required type='text' onkeypress="$(this).mask('00.000,00', {reverse: true});">
          </td>
          <td style='width:1%'></td>
          <td>
            <input class='form-control' name='etdatalanc' required type='datetime-local'  >
          </td>
          <td style='width:1%'></td>
          <td>
            <select required class ='form-control select' name="ettipo">
              <option value="" selected disabled>Selecione...</option>
              <option value="DINHEIRO">Dinheiro</option>
              <option value="PIX">Pix</option>
              <option value="DEBITO">Débito</option>
              <option value="CREDITO">Crédito</option>
            </select>
          </td>
          <td style='width:1%'></td>
          <td>
            <input type="hidden" name="etdata" <?php echo "value='".date('Y-m-d H:i:s')."'"; ?>>
            <input type='submit' class='btn btn-success' value='Lançar'>
            <a href='buscarpaciente.php' class='btn btn-danger' role='button'>Cancelar</a>
          </td>
        </tr>
        <tr>
          <th><br></th>
        </tr>
        <tr>
          <th>Saldo atual: <?php if($dados1->saldo != 0){ echo $dados1->saldo; }else{ echo 0; }?> </th>
        </tr>
      </tbody>
    </table>
  </form>
  <!-- Frame historico pagamento -->
  <?php 
  echo "<iframe src='listarrecibos.php?cpf=".$cpf."' frameborder='0' height='400px' width='83%'>" ;  
  echo "</iframe>";
  
  ?>
  

  

  <iframe></iframe>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
</body>
</html>