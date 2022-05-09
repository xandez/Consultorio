<?php
error_reporting(0);
session_start();

if ($_SESSION['nome'] == null) {
  header("Location:../view/index.php");
}

require_once '../control/pagamento.controller.php';

$pagamento = new PagamentoController();
$lista = $pagamento->listarRecibos($_GET['cpf']);
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
  <h5>Histórico de Pagamentos</h5>
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
</body>

</html>