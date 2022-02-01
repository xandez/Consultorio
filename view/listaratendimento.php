<?php

error_reporting(0);
date_default_timezone_set('America/Belem');

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

<style>
  @media (min-width: 0px) and (max-width: 768px){
    
  }
</style>

<body>
  <table class='table table-sm'>
    <?php
    if ($lista != null) {
      echo "    
      <thead>
        <tr>
          <th scope='col'>Dente</th>
          <th class='col-procedimento' scope='col'>Procedimento</th>
          <th scope='col'>Valor</th>
          <th scope='col'>Data</th>
          <th scope='col'>Status</th>
          <th scope='col'>Ação</th>
        </tr>
      </thead>
      <tbody>
    ";
      foreach ($lista as $dados) {
        echo "        
          <tr>
            <input type='hidden' value='" . $dados->id . "'>
            <th scope='row'>" . $dados->dente . "</th>
            <td>" . $dados->procedimento . "</td>
            <td>" . $dados->valor . "</td>
            <td>" . date('d/m/y', strtotime($dados->dt)) . "</td>
            <td>
              <select id='situ" . $dados->id . "' class='form-control select form-control-sm'>
                <option selected value='" . $dados->situacao . "'>" . $dados->situacao . "</option>
                <option value='EM ANDAMENTO'>EM ANDAMENTO</option>
                <option value='PENDENTE'>PENDENTE</option>
                <option value='REALIZADO'>REALIZADO</option>
              </select>
            </td>
            <td>
              <button data-id='" . $dados->id . "' type='button' class='btn btn-secondary btn-sm btsal'>Salvar</button>
              <button data-id='" . $dados->id . "' type='button' class='btn btn-danger btn-sm btex' data-bs-toggle='modal' data-bs-target='#exampleModal'>X</button>
            </td>
          </tr>        
        ";
      }
    } else {
      //echo "Selecione um dente com procedimentos!";
    }
    ?>
    <input id="etdata" type="hidden" <?php echo "value='" . date('Y-m-d') . "'"; ?>>
    </tbody>
  </table>
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <p class="modal-title" id="exampleModalLabel">Confirmar ação?</p>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-footer">
          <button data-id="" type="button" class="btn btn-success btn-sm btConfirmar" data-bs-dismiss="modal">Sim</button>
          <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Não</button>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
  <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>

  <script>

    // ação no botão salvar
    var btsalvar = $(".btsal");

    btsalvar.click(function() {
      var id = $(this).data('id');
      var situ = $('#situ' + id + ' option:selected').val();
      var data = $('#etdata').val();
      $.ajax({
        method: "POST",
        url: "../control/atendimento.controller.php?evento=editar",
        data: {
          etid: id,
          etsituacao: situ,
          etdata: data
        },
        success: function() {
          alert('Inserido!');
          window.location.reload();
        },
        fail: function() {
          alert('Erro ao inserir!');
        }
      });
    })

    var btExcluir = $(".btex");
    var btConfirmar = $(".btConfirmar");

    btExcluir.click(function(){
      var id = $(this).data('id');
      btConfirmar.data('id',id);
    })

    btConfirmar.click(function(){
      var id = $(this).data('id');
      alert(id);
    })
  </script>
</body>

</html>