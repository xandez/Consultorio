<?php

error_reporting(0);
date_default_timezone_set('America/Belem');
session_start();

if ($_SESSION['nome'] == null) {
  header("Location:../view/index.php");
}

require_once '../control/saida.controller.php';

$tipo = new SaidaController();

$lista = $tipo->listarTipoSaida();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" >
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
</head>

<body>
  <form method="POST" action="../control/saida.controller.php?evento=cadastrar">
    <table>
      <tbody>
        <tr>
          <th>Tipo</th>
          <th style="width: 5%;"></th>
          <th>Data Competência</th>
          <th style="width: 5%;"></th>
          <th>Valor</th>
        </tr>
        <tr>
          <td>
            <select required class='form-control select btn-sm' name="ettipo">
              <?php
              foreach ($lista as $dados) {
                echo '
                <option value ="' . $dados->nome . '">' .utf8_encode  ($dados->nome) . '</option>';
              }
              ?>
              <!-- <option value="" selected disabled>Selecione...</option>
              <option value="CONTAS RESIDENCIAIS">Contas Residenciais</option>
              <option value="MARKET">Market</option>
              <option value="PROCEDIMENTOS">Procedimentos</option>
              <option value="SALÁRIO">Salário</option>
              <option value="TAXAS">Taxas</option> -->
            </select>
          </td>
          <td style='width:5%'></td>
          <td>
            <input class='form-control btn-sm' name='etdatacomp' required type="datetime-local">
          </td>
          <td style='width:5%'></td>
          <td>
            <input required class='form-control btn-sm' name='etvalor' required type="text" onkeypress="$(this).mask('00.000,00', {reverse: true});">
          </td>
        </tr>
        <tr>
          <th>Descrição</th>
        </tr>
        <tr>
          <td colspan="5">
            <input type="hidden" name="etusuario" <?php echo "value='" . $_SESSION["nome"] . "'"; ?>>
            <input type="hidden" name="etdata" <?php echo "value='" . date('Y-m-d H:i:s') . "'"; ?>>
            <textarea class='form-control btn-sm' required name="etdescricao" cols="30" rows="2"></textarea>
          </td>
        </tr>
        <tr>
          <th>Ações</th>
        </tr>
        <tr>
          <td>
            <input type='submit' id="btsalvar" class='btn btn-success btn-sm' value='Salvar'>
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