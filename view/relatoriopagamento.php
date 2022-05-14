<?php
error_reporting(0);
session_start();

if ($_SESSION['nome'] == null || $_SESSION['nivel'] > 0) {
  header("Location:../view/index.php");
}

require_once '../control/pagamento.controller.php';

$pag = new PagamentoController();
$lista = $pag->relatorioPagamento($_POST['datainicio'], $_POST['datafim']);

?>


<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Relatório de Pagamentos</title>
  <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We' crossorigin='anonymous'>
</head>

<body>
  <a href="relatorios.php" class="btn btn-primary btn-sm">Voltar</a>
  <table class="table">
    <thead class="table-light">
      <tr>
        <th scope="col">Nome</th>
        <th scope="col">CPF</th>
        <th scope="col">Data Lançamento</th>
        <th scope="col">Data</th>
        <th scope="col">Tipo</th>
        <th scope="col">Valor</th>
      </tr>
    </thead>
    <tbody>
      
      <?php
      if ($lista != null) {
        foreach ($lista as $dados) {
          echo '
        <tr>
          <td>' . $dados->nome . '</td>
          <td>' . $dados->cpf . '</td>
          <td>' . date('d/m/Y H:m:s', strtotime($dados->datalanc)) . '</td>
          <td>' . date('d/m/Y H:m:s', strtotime($dados->data)) . '</td>
          <td>' . $dados->tipo . '</td>
          <td>' . $dados->valor . '</td>
        </tr>
        ';
          $total = $total + floatval($dados->valor);
        }
        //echo $total;
      } else {
        echo 'Sem informação para o período informado!';
      }
      ?>
      <tr>
        <th>Total</th>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <th><?php echo $total; ?></th>
      </tr>
    </tbody>
  </table>
</body>

</html>

<script src='https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js' integrity='sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj' crossorigin='anonymous'></script>
<script src='https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js' integrity='sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/' crossorigin='anonymous'></script>