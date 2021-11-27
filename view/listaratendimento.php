<?php

error_reporting(0);

require_once '../control/atendimento.controller.php';

$paciente = $_REQUEST['etpaciente'];
$dente = $_REQUEST['etdente'];

$atendimento = new AtendimentoController();
$lista = $atendimento->listar($paciente, $dente);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
  <link rel=”stylesheet” href=”https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css”>
</head>

<body>
  <table class='table'>
    <?php
    if ($lista != null) {
      echo "    
      <thead>
        <tr>
          <th scope='col'>Dente</th>
          <th scope='col' style='width: 55%;'>Procedimento</th>
          <th scope='col'>Valor</th>
          <th scope='col'>Status</th>
          <th scope='col'>Ação</th>
        </tr>
      </thead>
      <tbody>
    ";
      foreach ($lista as $dados) {
        echo "        
          <tr>
            <th scope='row'>".$dados->dente."</th>
            <td>".$dados->procedimento."</td>
            <td>".$dados->valor."</td>
            <td>".$dados->situacao."</td>
          </tr>        
        ";
      }
    } else {
      echo "Selecione um dente com procedimentos!";
    }
    ?>      
    </tbody>
  </table>
</body>

</html>