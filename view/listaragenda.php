<?php
session_start();
error_reporting(0);

if ($_SESSION['nome'] == null) {
  header("Location:../view/index.php");
}

require_once '../control/agenda.controller.php';
require_once '../control/paciente.controller.php';

$idagenda = $_GET['id'];


$agenda = new AgendaController();
$lista = $agenda->listarAgenda($idagenda);
foreach ($lista as $dados) {
};
//ajustar tipo de data do banco para exeibir
$inicio = str_replace(' ', 'T', $dados->inicio);
$fim = str_replace(' ', 'T', $dados->fim);

$paciente = new PacienteController();
$dadosPaciente = $paciente->listarDadosPaciente($dados->nome, "");
foreach ($dadosPaciente as $dados1) {
};

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detalhe Agenda</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
  <link rel=”stylesheet” href=”https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css”>
  <link rel="stylesheet" href="./css/menu.css">
  <style type="text/css">
    #tabelapaciente tr td {
      font-size: 12px !important;
    }

    #tabelapaciente tr th {
      font-size: 15px !important;
    }

    .superior li img {
      transform: rotate(180deg);
    }

    .list-group-item {
      padding: 0 !important;
    }
  </style>

</head>

<body>
  <nav class="navbar navbar-dark">
    <span class="" href="#">Detalhe agenda: <?php echo $dados->funcionario ?></span>
    <a class="btn" href="index.php?link=1" role="button"><img src="" alt=""></a>
  </nav>

  <div class="container">
    <div class="row">
      <div class="col">
      </div>
      <div class="col-8">
        <!-- informações da agenda -->
        <table>
          <tbody>
            <tr>
              <th>Paciente*</th>
              <th style='width:1%'></th>
              <th>Início</th>
              <th style='width:1%'></th>
              <th>Fim</th>
              <th style='width:1%'></th>
              <th>Tipo</th>
              <th style='width:1%'></th>
              <th>Status</th>
            </tr>
            <tr class="campos1">
              <td>
                <input disabled readonly id="etpaciente" class='form-control ' name='etpaciente' value="<?php echo $dados->paciente ?>">
                </input>
              </td>
              <td style='width:1%'></td>
              <td>
                <input style="width: 200px;" id="etinicio" class='form-control' name='etinicio' required type='datetime-local' value="<?php echo $inicio ?>">
              </td>
              <td style='width:1%'></td>
              <td>
                <input style="width: 200px;" id="etfim" class='form-control' name='etfim' required type='datetime-local' value="<?php echo $fim ?>">
              </td>
              <td style='width:1%'></td>
              <td>
                <select id="ettipo" class='form-control select' name='ettipo'>
                  <option value='<?php echo $dados->tipo ?>'><?php echo ucfirst(strtolower($dados->tipo)) ?></option>
                  <option value='Atendimento'>Atendimento</option>
                  <option value='Consulta'>Consulta</option>
                </select>
              </td>
              <td style='width:1%'></td>
              <td>
                <select id="etstatus" class='form-control select' name='etstatus'>
                  <option value='<?php echo $dados->status ?>'><?php echo ucfirst(strtolower($dados->status)) ?></option>
                  <option value='ATIVO'>Atívo</option>
                  <option value='CONCLUIDO'>Concluído</option>
                  <option value='EXCLUIDO'>Excluído</option>
                </select>
              </td>
              <td style='width:1%'></td>
              <td>
                <input class='form-control' name='situacao' type='hidden'>
                <input id="etid" type="hidden" name="etid" value="<?php echo $dados->id ?>">
              </td>
            </tr>
            <tr class="acoes">
              <th>Ações</th>
            </tr>
            <tr class="acoes">
              <td>
                <button id="btagendar" href="#" class='btn btn-success'>Atualizar</button>
                <button id="btcancelar" href="#" class='btn btn-danger'>Cancelar</button>
              </td>
            </tr>
          </tbody>
        </table>
        <br>
        <!-- informações paciente -->
        <div class="accordion" id="accordionPanelsStayOpenExample">
          <div class="accordion-item">
            <h2 class="accordion-header" id="panelsStayOpen-headingOne">
              <button id="btAcordeon1" class="accordion-button collapsed" type="button" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                Dados Paciente
              </button>
            </h2>
            <div id="acordeon1" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingOne">
              <div class="accordion-body">
                <table>
                  <tbody id="tabelapaciente">
                    <tr>
                      <th>Nome</th>
                      <th style='width:2%'></th>
                      <th>Cpf</th>
                      <th style='width:2%'></th>
                      <th>RG</th>
                      <th style='width:2%'></th>
                      <th>Fone</th>
                      <th style='width:2%'></th>
                      <th>Idade</th>
                      <th style='width:2%'></th>
                      <th>Nascimento</th>
                      <th style='width:2%'></th>
                      <th>Sexo</th>
                    </tr>
                    <tr>
                      <td><?php echo $dados1->nome ?></td>
                      <td style='width:2%'></td>
                      <td><?php echo $dados1->cpf ?></td>
                      <td style='width:2%'></td>
                      <td><?php echo $dados1->rg ?></td>
                      <td style='width:2%'></td>
                      <td><?php echo $dados1->fone ?></td>
                      <td style='width:2%'></td>
                      <td><?php echo $dados1->idade ?></td>
                      <td style='width:2%'></td>
                      <td><?php echo $dados1->datanasc ?></td>
                      <td style='width:2%'></td>
                      <td><?php echo $dados1->sexo ?></td>
                    </tr>
                    <tr>
                      <th>Bairro</th>
                      <th style='width:2%'></th>
                      <th>Endereço</th>
                      <th style='width:2%'></th>
                      <th>Cidade</th>
                      <th style='width:2%'></th>
                      <th>Estado</th>
                      <th style='width:2%'></th>
                      <th>Estado Civil</th>
                      <th style='width:2%'></th>
                      <th>Profissão</th>
                      <th style='width:2%'></th>
                      <th>Indicação</th>
                    </tr>
                    <tr>
                      <td><?php echo $dados1->bairro ?></td>
                      <td style='width:2%'></td>
                      <td><?php echo $dados1->endereco ?></td>
                      <td style='width:2%'></td>
                      <td><?php echo $dados1->cidade ?></td>
                      <td style='width:2%'></td>
                      <td><?php echo $dados1->estado ?></td>
                      <td style='width:2%'></td>
                      <td><?php echo $dados1->civil ?></td>
                      <td style='width:2%'></td>
                      <td><?php echo $dados1->profissao ?></td>
                      <td style='width:2%'></td>
                      <td><?php echo $dados1->indicacao ?></td>
                    </tr>
                    <tr>
                      <th>Email</th>
                    </tr>
                    <tr>
                      <td colspan="6"><?php echo $dados1->email ?></td>
                    </tr>
                    <tr>
                      <th>Observação</th>
                    </tr>
                    <tr>
                      <td colspan="13"><?php echo $dados1->obs ?></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="panelsStayOpen-headingOne">
              <button id="btAcordeon2" class="accordion-button collapsed" type="button" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                Odontograma
              </button>
            </h2>
            <div id="acordeon2" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
              <div class="accordion-body">
                <ul class="list-group list-group-horizontal superior">
                  <li class="list-group-item">
                    <button value="1" type="button" class="btn btn-light">
                      <img src="./img/dentepbranco.png" alt="">
                    </button>
                  </li>
                  <li class="list-group-item">
                    <button value="2" type="button" class="btn btn-light">
                      <img src="./img/dentepbranco.png" alt="">
                    </button>
                  </li>
                  <li class="list-group-item">
                    <button type="button" class="btn btn-light">
                      <img src="./img/dentepbranco.png" alt="">
                    </button>
                  </li>
                  <li class="list-group-item">
                    <button type="button" class="btn btn-light">
                      <img src="./img/dentepbranco.png" alt="">
                    </button>
                  </li>
                  <li class="list-group-item">
                    <button type="button" class="btn btn-light">
                      <img src="./img/dentepbranco.png" alt="">
                    </button>
                  </li>
                  <li class="list-group-item">
                    <button type="button" class="btn btn-light">
                      <img src="./img/dentepbranco.png" alt="">
                    </button>
                  </li>
                  <li class="list-group-item">
                    <button type="button" class="btn btn-light">
                      <img src="./img/dentepbranco.png" alt="">
                    </button>
                  </li>
                  <li class="list-group-item">
                    <button type="button" class="btn btn-light">
                      <img src="./img/dentepbranco.png" alt="">
                    </button>
                  </li>
                  <li class="list-group-item">
                    <button type="button" class="btn btn-light">
                      <img src="./img/dentepbranco.png" alt="">
                    </button>
                  </li>
                  <li class="list-group-item">
                    <button type="button" class="btn btn-light">
                      <img src="./img/dentepbranco.png" alt="">
                    </button>
                  </li>
                  <li class="list-group-item">
                    <button type="button" class="btn btn-light">
                      <img src="./img/dentepbranco.png" alt="">
                    </button>
                  </li>
                  <li class="list-group-item">
                    <button type="button" class="btn btn-light">
                      <img src="./img/dentepbranco.png" alt="">
                    </button>
                  </li>
                  <li class="list-group-item">
                    <button type="button" class="btn btn-light">
                      <img src="./img/dentepbranco.png" alt="">
                    </button>
                  </li>
                  <li class="list-group-item">
                    <button type="button" class="btn btn-light">
                      <img src="./img/dentepbranco.png" alt="">
                    </button>
                  </li>
                  <li class="list-group-item">
                    <button type="button" class="btn btn-light">
                      <img src="./img/dentepbranco.png" alt="">
                    </button>
                  </li>
                  <li class="list-group-item">
                    <button type="button" class="btn btn-light">
                      <img src="./img/dentepbranco.png" alt="">
                    </button>
                  </li>
                </ul>
                <ul class="list-group list-group-horizontal">
                  <li class="list-group-item">
                    <button value="1" type="button" class="btn btn-light">
                      <img src="./img/dentepbranco.png" alt="">
                    </button>
                  </li>
                  <li class="list-group-item">
                    <button value="2" type="button" class="btn btn-light">
                      <img src="./img/dentepbranco.png" alt="">
                    </button>
                  </li>
                  <li class="list-group-item">
                    <button type="button" class="btn btn-light">
                      <img src="./img/dentepbranco.png" alt="">
                    </button>
                  </li>
                  <li class="list-group-item">
                    <button type="button" class="btn btn-light">
                      <img src="./img/dentepbranco.png" alt="">
                    </button>
                  </li>
                  <li class="list-group-item">
                    <button type="button" class="btn btn-light">
                      <img src="./img/dentepbranco.png" alt="">
                    </button>
                  </li>
                  <li class="list-group-item">
                    <button type="button" class="btn btn-light">
                      <img src="./img/dentepbranco.png" alt="">
                    </button>
                  </li>
                  <li class="list-group-item">
                    <button type="button" class="btn btn-light">
                      <img src="./img/dentepbranco.png" alt="">
                    </button>
                  </li>
                  <li class="list-group-item">
                    <button type="button" class="btn btn-light">
                      <img src="./img/dentepbranco.png" alt="">
                    </button>
                  </li>
                  <li class="list-group-item">
                    <button type="button" class="btn btn-light">
                      <img src="./img/dentepbranco.png" alt="">
                    </button>
                  </li>
                  <li class="list-group-item">
                    <button type="button" class="btn btn-light">
                      <img src="./img/dentepbranco.png" alt="">
                    </button>
                  </li>
                  <li class="list-group-item">
                    <button type="button" class="btn btn-light">
                      <img src="./img/dentepbranco.png" alt="">
                    </button>
                  </li>
                  <li class="list-group-item">
                    <button type="button" class="btn btn-light">
                      <img src="./img/dentepbranco.png" alt="">
                    </button>
                  </li>
                  <li class="list-group-item">
                    <button type="button" class="btn btn-light">
                      <img src="./img/dentepbranco.png" alt="">
                    </button>
                  </li>
                  <li class="list-group-item">
                    <button type="button" class="btn btn-light">
                      <img src="./img/dentepbranco.png" alt="">
                    </button>
                  </li>
                  <li class="list-group-item">
                    <button type="button" class="btn btn-light">
                      <img src="./img/dentepbranco.png" alt="">
                    </button>
                  </li>
                  <li class="list-group-item">
                    <button type="button" class="btn btn-light">
                      <img src="./img/dentepbranco.png" alt="">
                    </button>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="panelsStayOpen-headingOne">
              <button id="btAcordeon3" class="accordion-button collapsed" type="button" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                Incluir procedimento
              </button>
            </h2>
            <div id="acordeon3" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
              <div class="accordion-body">
                <table>
                  <tbody>
                    <tr>
                      <th>Nº Dente*</th>
                      <th style='width:1%'></th>
                      <th>Procedimento</th>
                      <th style='width:1%'></th>
                      <th>Valor</th>
                      <th style='width:1%'></th>
                      <th>Situação</th>
                      <th style='width:1%'></th>
                      <th>Ação</th>
                    </tr>
                    <tr>
                      <td>
                        <input readonly type="number" style="width: 100px;" id="etdente" class='form-control ' name='etdente'>
                        </input>
                      </td>
                      <td style='width:1%'></td>
                      <td>
                        <select style="width: 300px;" id="etprocedimento" class='form-control select' name='etprocedimento'>
                          <option value='Atendimento'>Atendimento</option>
                          <option value='Consulta'>Consulta</option>
                        </select>
                      </td>
                      <td style='width:1%'></td>
                      <td>
                        <input id="etvalor" class='form-control' name='etvalor'>
                      </td>
                      <td style='width:1%'></td>
                      <td>
                        <select id="etsituacao" class='form-control select' name='etsituacao'>
                          <option value='Em andamento'>Em andamento</option>
                          <option selected value='Pendente'>Pendente</option>
                          <option value='Realizado'>Realizado</option>
                        </select>
                      </td>
                      <td style='width:1%'></td>
                      <td>
                        <button id="btagendar" href="#" class='btn btn-success'>Inserir</button>
                      </td>
                      <td>
                        <input class='form-control' name='situacao' type='hidden'>
                        <input id="etid" type="hidden" name="etid" value="<?php echo $dados->id ?>">
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <!-- iframe -->
        <iframe src="" height="100%" width="100%" frameborder="0">

        </iframe>
      </div>
      <!--  -->
      <div class="col">
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
  <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>

  <script>
    let btatualizar = $("#btagendar");
    let btcancelar = $("#btcancelar");

    //esconder botões ao carregar pagina
    $(".acoes").hide();

    //esconde botões de ação
    function desabilitaredicao() {
      $(".acoes").hide();
    }

    //mostrar botções de ação
    function habilitaredicao() {
      $(".acoes").show();
    }

    //deixar campos readonly
    $('.campos1 td input').prop('readonly', true);
    $('.campos1 td select').prop('disabled', true);

    //deixar campos editaveis
    $(".campos1 td input").dblclick(function() {
      $(".campos1 td input").prop('readonly', false);
      $('.campos1 td select').prop('disabled', false);
      $(".acoes").show();
    });

    //cancelar edição
    btcancelar.click(function() {
      desabilitaredicao();
      $(".campos1 td input").prop('readonly', true);
      $('.campos1 td select').prop('disabled', true);
    });

    //atualizar agenda
    btatualizar.click(function() {
      var id = $("#etid").val();
      var inicio = $("#etinicio").val();
      var fim = $("#etfim").val();
      var tipo = $("#ettipo option:selected").val();
      var status = $("#etstatus option:selected").val();
      console.log(id, inicio, fim, tipo, status);
      if (verificarDatas()) {
        $.ajax({
          method: "POST",
          url: "../control/agenda.controller.php?evento=editarAgenda",
          data: {
            etid: id,
            etinicio: inicio,
            etfim: fim,
            ettipo: tipo,
            etstatus: status
          },
          success: function(retorno) {
            alert('Agenda atualizada!');
            window.location.reload();
          },
          fail: function() {
            alert('Erro ao atualizar!');
            window.location.reload();
          }
        });
      } else {
        alert("Data fim não pode ser igual a Inicial");
      }
    });

    //ajusta campo data fim igual ao inicio
    $("#etinicio").change(function() {
      $("#etfim").val($("#etinicio").val());
    });

    //verificar datas
    function verificarDatas() {
      if ($("#etfim").val() <= $("#etinicio").val()) {
        return false;
      } else {
        return true;
      }
    }

    //acordeon1
    var btacordeon = $("#btAcordeon1");
    var divAcordeon = $("#acordeon1");
    btacordeon.click(function() {
      if (divAcordeon.hasClass("show")) {
        divAcordeon.removeClass("show");
      } else {
        divAcordeon.addClass("show");
      }
    });
    //acordeon2
    var btacordeon2 = $("#btAcordeon2");
    var divAcordeon2 = $("#acordeon2");
    btacordeon2.click(function() {
      if (divAcordeon2.hasClass("show")) {
        divAcordeon2.removeClass("show");
      } else {
        divAcordeon2.addClass("show");
      }
    });
    //acordeon3
    var btacordeon3 = $("#btAcordeon3");
    var divAcordeon3 = $("#acordeon3");
    btacordeon3.click(function() {
      if (divAcordeon3.hasClass("show")) {
        divAcordeon3.removeClass("show");
      } else {
        divAcordeon3.addClass("show");
      }
    });

    //selecao do dente
    var ndente = $("#etdente");
    $("button.btn-light").click(function() {
      //alert($(this).val());
      ndente.val($(this).val());
    });
  </script>
</body>

</html>