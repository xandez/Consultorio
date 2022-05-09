<?php
error_reporting(0);
session_start();

if ($_SESSION['nome'] == null) {
  header("Location:../view/index.php");
}

require_once '../control/pagamento.controller.php';
require_once '../control/atendimento.controller.php';

//lista os pagamentos do paciente
$pagamento = new PagamentoController();
$lista = $pagamento->listarRecibos($_GET['cpf']);

//lista os procedimentos feitos do paciente
$procedimentos = new AtendimentoController();
$lista2 = $procedimentos->listarPorPaciente($_GET['cpf']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Recibos</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
  <link rel=”stylesheet” href=”https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css”>

  <style>
    h5 {
      justify-content: center;
      text-align: center;
    }
  </style>
</head>

<body>
  <h5>Histórico</h5>

  <nav>
    <div class="nav nav-tabs" id="nav-tab" role="tablist">
      <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Pagamentos</button>
      <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Procedimentos</button>
    </div>
  </nav>
  <div class="tab-content" id="nav-tabContent">
    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
      <table class="table">
        <thead>
          <tr>
            <th scope="col" style='width: 5%;'>Recibo</th>
            <th scope="col">Data</th>
            <th scope="col">Forma</th>
            <th scope="col">Valor</th>
            <th scope="col" style='width: 15%;'>Ações</th>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach ($lista as $dados) {
            echo '
        <tr>
          <td>' . $dados->id . '</td>
          <td>' . date('d/m/Y H:i:s', strtotime($dados->data)) . '</td>
          <td>' . $dados->tipo . '</td>
          <td>' . $dados->valor . '</td>
          <td>
            <a target="_blank" href="recibo.php?id=' . $dados->id . '" class="btn btn-primary btn-sm" role="button">Imprimir</a>
            <a href="#" class="btn btn-danger btn-sm" role="button">Excluir</a>
          </td>
        </tr>
        
        ';
          }
          ?>
        </tbody>
      </table>
    </div>
    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
      <table class="table">
        <thead>
          <tr>
            <th scope="col" style='width: 5%;'>Dente</th>
            <th scope="col">Data</th>
            <th scope="col">Dentista</th>
            <th scope="col">Procedimento</th>
            <th scope="col" style='width: 15%;'>Valor</th>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach ($lista2 as $proce) {
            echo '
        <tr>
          <td>' . $proce->dente . '</td>
          <td>' . date('d/m/Y', strtotime($proce->dt)) . '</td>
          <td>' . $proce->dentista . '</td>
          <td>' . $proce->procedimento . '</td>
          <td>' . $proce->valor . '</td>
        </tr>
        
        ';
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</body>

</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>