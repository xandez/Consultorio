<?php
session_start();
date_default_timezone_set('America/Belem');
error_reporting(0);

if ($_SESSION['nome'] == null) {
  header("Location:../view/index.php");
}

require_once '../control/agenda.controller.php';
require_once '../control/paciente.controller.php';
require_once '../control/procedimento.controller.php';
require_once '../control/atendimento.controller.php';
require_once '../control/pagamento.controller.php';

//pega os dados da agenda selecioanda pelo ID;
$idagenda = $_GET['id'];
$cpf = $_GET['cpf'];
$agenda = new AgendaController();
$lista = $agenda->listarAgenda($idagenda);
foreach ($lista as $dados) {
};

//pega o saldo do paciente;
//$cpf = $dados->paciente;
$saldo = new PagamentoController();
$saldopaciente = $saldo->listarSaldo($cpf);
foreach ($saldopaciente as $saldomostrar) {
}

//ajustar tipo de data do banco para exeibir
$inicio = str_replace(' ', 'T', $dados->inicio);
$fim = str_replace(' ', 'T', $dados->fim);

//lista os dados do paciente;
$paciente = new PacienteController();
$dadosPaciente = $paciente->listarDadosPaciente("", $cpf);
foreach ($dadosPaciente as $dados1) {
};

//lista o nome dos procedimentos cadastrados.
$procedimento = new ProcedimentoController();
$dadosprocedimento = $procedimento->listarProcedimento("", "");

//pega o numero dos dentes que tem procedimento em aberto
$dentes = new AtendimentoController();
$listadente = $dentes->denteProcedimento($cpf);
foreach ($listadente as $listadedentes) {
  $arraydentes[] = $listadedentes->dente;
};
// if(in_array("21",$arraydentes)){
//   echo "Achou o dente!";
// }else{
//   echo "Não achou!";
// }

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
    @media (max-width: 2980px){
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

      #btAcordeon1,#btAcordeon2,#btAcordeon3{
        font-weight: bold;
        background-color: #e9ecef;
      }
      #criancacima, #criancabaixo{
        padding-left: 4.3px;
      }
      #crianca img, #adulto img{
        height: 40px;
      }
      #botox img{
        height: 30px;
      }
    }

    @media (min-width: 1195px) and (max-width: 1399px){
      .col-8{
        width: 80% !important;
      }
      #criancacima, #criancabaixo{
        padding-left: 0.3px;
      }

      #crianca img, #adulto img{
        height: 30px;
      }
      #botox img{
        height: 30px;
      }
    }

    @media (min-width: 992px) and (max-width: 1194px){
      .col-8{
        width: 100% !important;
      }
      #criancacima, #criancabaixo{
        padding-left: 0.3px;
      }

      #crianca img, #adulto img{
        height: 40px;
      }
      #botox img{
        height: 30px;
      }
    }

    @media (min-width: 800px) and (max-width: 991px){
      .col-8{
        width: 100% !important;
      }
      #criancacima, #criancabaixo{
        padding-left: 0.3px;
      }
      .container{
        max-width: 100% !important;
      }

      button img{
        width: 100%;
        height: 100%;
      }

      .list-group-item button{
        font-size: 10px;
      }
      .col{
        width: 0px !important;
        padding: 0 !important;
      }
      .accordion-body{
        padding: 0 !important;
      }

      #criancacima img, #criancabaixo img{
        width: 14px;
        height: 14px;
      }

      #crianca img, #adulto img{
        height: 40px;
      }
      #botox img{
        height: 30px;
      }
    }

    @media (min-width: 0px) and (max-width: 799px){
      .col-8{
        width: 100% !important;
      }
      #criancacima, #criancabaixo{
        padding-left: 0.3px;
      }
      .container{
        max-width: 100% !important;
      }

      button img{
        width: 100%;
        height: 100%;
      }

      .list-group-item button{
        font-size: 10px;
        padding: 0 5px 0 5px !important;
      }
      .col{
        width: 0px !important;
        padding: 0 !important;
      }
      .accordion-body{
        padding: 0 !important;
      }

      #criancacima img, #criancabaixo img{
        width: 14px;
        height: 14px;
      }

      #crianca img, #adulto img{
        height: 40px;
      }
      #botox img{
        height: 30px;
      }
    }
    
  </style>

</head>

<body>
  <nav class="navbar navbar-dark">
    <span class="" href="#">Detalhe agenda: <?php echo $dados->funcionario ?></span>
  </nav>
  <br>

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
              <th style='width:1%'></th>
              <th>Saldo</th>
            </tr>
            <tr class="campos1">
              <td>
                <input disabled readonly data-cpf="<?php echo $dados->paciente ?>" id="etpaciente" class='form-control form-control-sm' name='etpaciente' value="<?php echo $dados->nome ?>">
                </input>
              </td>
              <td style='width:1%'></td>
              <td>
                <input style="width: 175px;" id="etinicio" class='form-control form-control-sm' name='etinicio' required type='datetime-local' value="<?php echo $inicio ?>">
              </td>
              <td style='width:1%'></td>
              <td>
                <input style="width: 175px;" id="etfim" class='form-control form-control-sm' name='etfim' required type='datetime-local' value="<?php echo $fim ?>">
              </td>
              <td style='width:1%'></td>
              <td>
                <select id="ettipo" class='form-control select form-control-sm' name='ettipo'>
                  <option value='<?php echo $dados->tipo ?>'><?php echo ucfirst(strtolower($dados->tipo)) ?></option>
                  <option value='Atendimento'>Atendimento</option>
                  <option value='Consulta'>Consulta</option>
                </select>
              </td>
              <td style='width:1%'></td>
              <td>
                <select id="etstatus" class='form-control select form-control-sm' name='etstatus'>
                  <option value='<?php echo $dados->status ?>'><?php echo ucfirst(strtolower($dados->status)) ?></option>
                  <option value='ATIVO'>Atívo</option>
                  <option value='CONCLUIDO'>Concluído</option>
                  <option value='EXCLUIDO'>Excluído</option>
                </select>
              </td>
              <td style='width:1%'></td>
              <td>
                <input style="width: 75px;" disabled class='form-control form-control-sm' name='etSaldo' value="<?php echo $saldomostrar->saldo ?>">
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
                      <td><?php echo date('d/m/Y', strtotime($dados1->datanasc)) ?></td>
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
              <div id="bttipo">
                <a href="#" id="adulto"><img  src="./img/adulto.png"></a>
                <a href="#" id="crianca"><img  src="./img/crianca.png"></a>
                <a href="#" id="botox"><img  src="./img/rosto.png"></a>
              </div>
            <div id="acordeon2" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
              <div class="accordion-body">
                <ul id="criancacima" class="list-group list-group-horizontal superior" style="justify-content: center;">
                  <li class="list-group-item">
                    <button style="font-size: 12px;" value="55" type="button" class="btn btn-light">
                      55<br>
                      <?php
                      if (in_array("55", $arraydentes)) {
                        echo "<img src='./img/denteppreto.png'>";
                      } else {
                        echo "<img src='./img/dentepbranco.png'>";
                      }
                      ?>
                    </button>
                  </li>
                  <li class="list-group-item">
                    <button style="font-size: 12px;" value="54" type="button" class="btn btn-light">
                      54<br>
                      <?php
                      if (in_array("54", $arraydentes)) {
                        echo "<img src='./img/denteppreto.png'>";
                      } else {
                        echo "<img src='./img/dentepbranco.png'>";
                      }
                      ?>
                    </button>
                  </li>
                  <li class="list-group-item">
                    <button style="font-size: 12px;" value="53" type="button" class="btn btn-light">
                      53<br>
                      <?php
                      if (in_array("53", $arraydentes)) {
                        echo "<img src='./img/denteppreto.png'>";
                      } else {
                        echo "<img src='./img/dentepbranco.png'>";
                      }
                      ?>
                    </button>
                  </li>
                  <li class="list-group-item">
                    <button style="font-size: 12px;" value="52" type="button" class="btn btn-light">
                      52<br>
                      <?php
                      if (in_array("52", $arraydentes)) {
                        echo "<img src='./img/denteppreto.png'>";
                      } else {
                        echo "<img src='./img/dentepbranco.png'>";
                      }
                      ?>
                    </button>
                  </li>
                  <li class="list-group-item" style="border-right: 2px solid;">
                    <button style="font-size: 12px;" value="51" type="button" class="btn btn-light">
                      51<br>
                      <?php
                      if (in_array("51", $arraydentes)) {
                        echo "<img src='./img/denteppreto.png'>";
                      } else {
                        echo "<img src='./img/dentepbranco.png'>";
                      }
                      ?>
                    </button>
                  </li>
                  <li class="list-group-item">
                    <button style="font-size: 12px;" value="61" type="button" class="btn btn-light">
                      61<br>
                      <?php
                      if (in_array("61", $arraydentes)) {
                        echo "<img src='./img/denteppreto.png'>";
                      } else {
                        echo "<img src='./img/dentepbranco.png'>";
                      }
                      ?>
                    </button>
                  </li>
                  <li class="list-group-item">
                    <button style="font-size: 12px;" value="62" type="button" class="btn btn-light">
                      62<br>
                      <?php
                      if (in_array("62", $arraydentes)) {
                        echo "<img src='./img/denteppreto.png'>";
                      } else {
                        echo "<img src='./img/dentepbranco.png'>";
                      }
                      ?>
                    </button>
                  </li>
                  <li class="list-group-item">
                    <button style="font-size: 12px;" value="63" type="button" class="btn btn-light">
                      63<br>
                      <?php
                      if (in_array("63", $arraydentes)) {
                        echo "<img src='./img/denteppreto.png'>";
                      } else {
                        echo "<img src='./img/dentepbranco.png'>";
                      }
                      ?>
                    </button>
                  </li>
                  <li class="list-group-item">
                    <button style="font-size: 12px;" value="64" type="button" class="btn btn-light">
                      64<br>
                      <?php
                      if (in_array("64", $arraydentes)) {
                        echo "<img src='./img/denteppreto.png'>";
                      } else {
                        echo "<img src='./img/dentepbranco.png'>";
                      }
                      ?>
                    </button>
                  </li>
                  <li class="list-group-item">
                    <button style="font-size: 12px;" value="65" type="button" class="btn btn-light">
                      65<br>
                      <?php
                      if (in_array("65", $arraydentes)) {
                        echo "<img src='./img/denteppreto.png'>";
                      } else {
                        echo "<img src='./img/dentepbranco.png'>";
                      }
                      ?>
                    </button>
                  </li>
                </ul>
                <ul id="adultocima" class="list-group list-group-horizontal superior">
                  <li class="list-group-item">
                    <button value="18" type="button" class="btn btn-light">
                      18
                      <?php
                      if (in_array("18", $arraydentes)) {
                        echo "<img src='./img/denteppreto.png'>";
                      } else {
                        echo "<img src='./img/dentepbranco.png'>";
                      }
                      ?>
                    </button>
                  </li>
                  <li class="list-group-item">
                    <button value="17" type="button" class="btn btn-light">
                      17
                      <?php
                      if (in_array("17", $arraydentes)) {
                        echo "<img src='./img/denteppreto.png'>";
                      } else {
                        echo "<img src='./img/dentepbranco.png'>";
                      }
                      ?>
                    </button>
                  </li>
                  <li class="list-group-item">
                    <button value="16" type="button" class="btn btn-light">
                      16
                      <?php
                      if (in_array("16", $arraydentes)) {
                        echo "<img src='./img/denteppreto.png'>";
                      } else {
                        echo "<img src='./img/dentepbranco.png'>";
                      }
                      ?>
                    </button>
                  </li>
                  <li class="list-group-item">
                    <button value="15" type="button" class="btn btn-light">
                      15
                      <?php
                      if (in_array("15", $arraydentes)) {
                        echo "<img src='./img/denteppreto.png'>";
                      } else {
                        echo "<img src='./img/dentepbranco.png'>";
                      }
                      ?>
                    </button>
                  </li>
                  <li class="list-group-item">
                    <button value="14" type="button" class="btn btn-light">
                      14
                      <?php
                      if (in_array("14", $arraydentes)) {
                        echo "<img src='./img/denteppreto.png'>";
                      } else {
                        echo "<img src='./img/dentepbranco.png'>";
                      }
                      ?>
                    </button>
                  </li>
                  <li class="list-group-item">
                    <button value="13" type="button" class="btn btn-light">
                      13
                      <?php
                      if (in_array("13", $arraydentes)) {
                        echo "<img src='./img/denteppreto.png'>";
                      } else {
                        echo "<img src='./img/dentepbranco.png'>";
                      }
                      ?>
                    </button>
                  </li>
                  <li class="list-group-item">
                    <button value="12" type="button" class="btn btn-light">
                      12
                      <?php
                      if (in_array("12", $arraydentes)) {
                        echo "<img src='./img/denteppreto.png'>";
                      } else {
                        echo "<img src='./img/dentepbranco.png'>";
                      }
                      ?>
                    </button>
                  </li>
                  <li class="list-group-item" style="border-right: 2px solid;">
                    <button value="11" type="button" class="btn btn-light">
                      11
                      <?php
                      if (in_array("11", $arraydentes)) {
                        echo "<img src='./img/denteppreto.png'>";
                      } else {
                        echo "<img src='./img/dentepbranco.png'>";
                      }
                      ?>
                    </button>
                  </li>
                  <li class="list-group-item">
                    <button value="21" type="button" class="btn btn-light">
                      21
                      <?php
                      if (in_array("21", $arraydentes)) {
                        echo "<img src='./img/denteppreto.png'>";
                      } else {
                        echo "<img src='./img/dentepbranco.png'>";
                      }
                      ?>
                    </button>
                  </li>
                  <li class="list-group-item">
                    <button value="22" type="button" class="btn btn-light">
                      22
                      <?php
                      if (in_array("22", $arraydentes)) {
                        echo "<img src='./img/denteppreto.png'>";
                      } else {
                        echo "<img src='./img/dentepbranco.png'>";
                      }
                      ?>
                    </button>
                  </li>
                  <li class="list-group-item">
                    <button value="23" type="button" class="btn btn-light">
                      23
                      <?php
                      if (in_array("23", $arraydentes)) {
                        echo "<img src='./img/denteppreto.png'>";
                      } else {
                        echo "<img src='./img/dentepbranco.png'>";
                      }
                      ?>
                    </button>
                  </li>
                  <li class="list-group-item">
                    <button value="24" type="button" class="btn btn-light">
                      24
                      <?php
                      if (in_array("24", $arraydentes)) {
                        echo "<img src='./img/denteppreto.png'>";
                      } else {
                        echo "<img src='./img/dentepbranco.png'>";
                      }
                      ?>
                    </button>
                  </li>
                  <li class="list-group-item">
                    <button value="25" type="button" class="btn btn-light">
                      25
                      <?php
                      if (in_array("25", $arraydentes)) {
                        echo "<img src='./img/denteppreto.png'>";
                      } else {
                        echo "<img src='./img/dentepbranco.png'>";
                      }
                      ?>
                    </button>
                  </li>
                  <li class="list-group-item">
                    <button value="26" type="button" class="btn btn-light">
                      26
                      <?php
                      if (in_array("26", $arraydentes)) {
                        echo "<img src='./img/denteppreto.png'>";
                      } else {
                        echo "<img src='./img/dentepbranco.png'>";
                      }
                      ?>
                    </button>
                  </li>
                  <li class="list-group-item">
                    <button value="27" type="button" class="btn btn-light">
                      27
                      <?php
                      if (in_array("27", $arraydentes)) {
                        echo "<img src='./img/denteppreto.png'>";
                      } else {
                        echo "<img src='./img/dentepbranco.png'>";
                      }
                      ?>
                    </button>
                  </li>
                  <li class="list-group-item">
                    <button value="28" type="button" class="btn btn-light">
                      28
                      <?php
                      if (in_array("28", $arraydentes)) {
                        echo "<img src='./img/denteppreto.png'>";
                      } else {
                        echo "<img src='./img/dentepbranco.png'>";
                      }
                      ?>
                    </button>
                  </li>
                </ul>
                <ul class="list-group list-group-horizontal" style="border-bottom: 2px solid;">
                </ul>
                <!--  -->
                <ul id="adultobaixo" class="list-group list-group-horizontal">
                  <li class="list-group-item">
                    <button value="48" type="button" class="btn btn-light">

                      <?php
                      if (in_array("48", $arraydentes)) {
                        echo "<img src='./img/denteppreto.png'>";
                      } else {
                        echo "<img src='./img/dentepbranco.png'>";
                      }
                      ?>48
                    </button>
                  </li>
                  <li class="list-group-item">
                    <button value="47" value="2" type="button" class="btn btn-light">

                      <?php
                      if (in_array("47", $arraydentes)) {
                        echo "<img src='./img/denteppreto.png'>";
                      } else {
                        echo "<img src='./img/dentepbranco.png'>";
                      }
                      ?>47
                    </button>
                  </li>
                  <li class="list-group-item">
                    <button value="46" type="button" class="btn btn-light">

                      <?php
                      if (in_array("46", $arraydentes)) {
                        echo "<img src='./img/denteppreto.png'>";
                      } else {
                        echo "<img src='./img/dentepbranco.png'>";
                      }
                      ?>46
                    </button>
                  </li>
                  <li class="list-group-item">
                    <button value="45" type="button" class="btn btn-light">

                      <?php
                      if (in_array("45", $arraydentes)) {
                        echo "<img src='./img/denteppreto.png'>";
                      } else {
                        echo "<img src='./img/dentepbranco.png'>";
                      }
                      ?>45
                    </button>
                  </li>
                  <li class="list-group-item">
                    <button value="44" type="button" class="btn btn-light">

                      <?php
                      if (in_array("44", $arraydentes)) {
                        echo "<img src='./img/denteppreto.png'>";
                      } else {
                        echo "<img src='./img/dentepbranco.png'>";
                      }
                      ?>44
                    </button>
                  </li>
                  <li class="list-group-item">
                    <button value="43" type="button" class="btn btn-light">

                      <?php
                      if (in_array("43", $arraydentes)) {
                        echo "<img src='./img/denteppreto.png'>";
                      } else {
                        echo "<img src='./img/dentepbranco.png'>";
                      }
                      ?>43
                    </button>
                  </li>
                  <li class="list-group-item">
                    <button value="42" type="button" class="btn btn-light">

                      <?php
                      if (in_array("42", $arraydentes)) {
                        echo "<img src='./img/denteppreto.png'>";
                      } else {
                        echo "<img src='./img/dentepbranco.png'>";
                      }
                      ?>42
                    </button>
                  </li>
                  <li class="list-group-item" style="border-right: 2px solid;">
                    <button value="41" type="button" class="btn btn-light">

                      <?php
                      if (in_array("41", $arraydentes)) {
                        echo "<img src='./img/denteppreto.png'>";
                      } else {
                        echo "<img src='./img/dentepbranco.png'>";
                      }
                      ?>41
                    </button>
                  </li>
                  <li class="list-group-item">
                    <button value="31" type="button" class="btn btn-light">

                      <?php
                      if (in_array("31", $arraydentes)) {
                        echo "<img src='./img/denteppreto.png'>";
                      } else {
                        echo "<img src='./img/dentepbranco.png'>";
                      }
                      ?>31
                    </button>
                  </li>
                  <li class="list-group-item">
                    <button value="32" type="button" class="btn btn-light">

                      <?php
                      if (in_array("32", $arraydentes)) {
                        echo "<img src='./img/denteppreto.png'>";
                      } else {
                        echo "<img src='./img/dentepbranco.png'>";
                      }
                      ?>32
                    </button>
                  </li>
                  <li class="list-group-item">
                    <button value="33" type="button" class="btn btn-light">

                      <?php
                      if (in_array("33", $arraydentes)) {
                        echo "<img src='./img/denteppreto.png'>";
                      } else {
                        echo "<img src='./img/dentepbranco.png'>";
                      }
                      ?>33
                    </button>
                  </li>
                  <li class="list-group-item">
                    <button value="34" type="button" class="btn btn-light">

                      <?php
                      if (in_array("34", $arraydentes)) {
                        echo "<img src='./img/denteppreto.png'>";
                      } else {
                        echo "<img src='./img/dentepbranco.png'>";
                      }
                      ?>34
                    </button>
                  </li>
                  <li class="list-group-item">
                    <button value="35" type="button" class="btn btn-light">

                      <?php
                      if (in_array("35", $arraydentes)) {
                        echo "<img src='./img/denteppreto.png'>";
                      } else {
                        echo "<img src='./img/dentepbranco.png'>";
                      }
                      ?>35
                    </button>
                  </li>
                  <li class="list-group-item">
                    <button value="36" type="button" class="btn btn-light">

                      <?php
                      if (in_array("36", $arraydentes)) {
                        echo "<img src='./img/denteppreto.png'>";
                      } else {
                        echo "<img src='./img/dentepbranco.png'>";
                      }
                      ?>36
                    </button>
                  </li>
                  <li class="list-group-item">
                    <button value="37" type="button" class="btn btn-light">

                      <?php
                      if (in_array("37", $arraydentes)) {
                        echo "<img src='./img/denteppreto.png'>";
                      } else {
                        echo "<img src='./img/dentepbranco.png'>";
                      }
                      ?>37
                    </button>
                  </li>
                  <li class="list-group-item">
                    <button value="38" type="button" class="btn btn-light">

                      <?php
                      if (in_array("38", $arraydentes)) {
                        echo "<img src='./img/denteppreto.png'>";
                      } else {
                        echo "<img src='./img/dentepbranco.png'>";
                      }
                      ?>38
                    </button>
                  </li>
                </ul>
                <ul id="criancabaixo" class="list-group list-group-horizontal inferior" style="justify-content: center;">
                  <li class="list-group-item">
                    <button style="font-size: 12px;" value="85" type="button" class="btn btn-light">
                      85<br>
                      <?php
                      if (in_array("85", $arraydentes)) {
                        echo "<img src='./img/denteppreto.png'>";
                      } else {
                        echo "<img src='./img/dentepbranco.png'>";
                      }
                      ?>
                    </button>
                  </li>
                  <li class="list-group-item">
                    <button style="font-size: 12px;" value="84" type="button" class="btn btn-light">
                      84<br>
                      <?php
                      if (in_array("84", $arraydentes)) {
                        echo "<img src='./img/denteppreto.png'>";
                      } else {
                        echo "<img src='./img/dentepbranco.png'>";
                      }
                      ?>
                    </button>
                  </li>
                  <li class="list-group-item">
                    <button style="font-size: 12px;" value="83" type="button" class="btn btn-light">
                      83<br>
                      <?php
                      if (in_array("83", $arraydentes)) {
                        echo "<img src='./img/denteppreto.png'>";
                      } else {
                        echo "<img src='./img/dentepbranco.png'>";
                      }
                      ?>
                    </button>
                  </li>
                  <li class="list-group-item">
                    <button style="font-size: 12px;" value="82" type="button" class="btn btn-light">
                      82<br>
                      <?php
                      if (in_array("82", $arraydentes)) {
                        echo "<img src='./img/denteppreto.png'>";
                      } else {
                        echo "<img src='./img/dentepbranco.png'>";
                      }
                      ?>
                    </button>
                  </li>
                  <li class="list-group-item" style="border-right: 2px solid;">
                    <button style="font-size: 12px;" value="81" type="button" class="btn btn-light">
                      81<br>
                      <?php
                      if (in_array("81", $arraydentes)) {
                        echo "<img src='./img/denteppreto.png'>";
                      } else {
                        echo "<img src='./img/dentepbranco.png'>";
                      }
                      ?>
                    </button>
                  </li>
                  <li class="list-group-item">
                    <button style="font-size: 12px;" value="71" type="button" class="btn btn-light">
                      71<br>
                      <?php
                      if (in_array("71", $arraydentes)) {
                        echo "<img src='./img/denteppreto.png'>";
                      } else {
                        echo "<img src='./img/dentepbranco.png'>";
                      }
                      ?>
                    </button>
                  </li>
                  <li class="list-group-item">
                    <button style="font-size: 12px;" value="72" type="button" class="btn btn-light">
                      72<br>
                      <?php
                      if (in_array("72", $arraydentes)) {
                        echo "<img src='./img/denteppreto.png'>";
                      } else {
                        echo "<img src='./img/dentepbranco.png'>";
                      }
                      ?>
                    </button>
                  </li>
                  <li class="list-group-item">
                    <button style="font-size: 12px;" value="73" type="button" class="btn btn-light">
                      73<br>
                      <?php
                      if (in_array("73", $arraydentes)) {
                        echo "<img src='./img/denteppreto.png'>";
                      } else {
                        echo "<img src='./img/dentepbranco.png'>";
                      }
                      ?>
                    </button>
                  </li>
                  <li class="list-group-item">
                    <button style="font-size: 12px;" value="74" type="button" class="btn btn-light">
                      74<br>
                      <?php
                      if (in_array("74", $arraydentes)) {
                        echo "<img src='./img/denteppreto.png'>";
                      } else {
                        echo "<img src='./img/dentepbranco.png'>";
                      }
                      ?>
                    </button>
                  </li>
                  <li class="list-group-item">
                    <button style="font-size: 12px;" value="75" type="button" class="btn btn-light">
                      75<br>
                      <?php
                      if (in_array("75", $arraydentes)) {
                        echo "<img src='./img/denteppreto.png'>";
                      } else {
                        echo "<img src='./img/dentepbranco.png'>";
                      }
                      ?>
                    </button>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <!-- Incluir Procedimento -->
          <div class="accordion-item">
            <h2 class="accordion-header" id="panelsStayOpen-headingOne">
              <button id="btAcordeon3" class="accordion-button collapsed" type="button" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                Incluir procedimento
              </button>
            </h2>
            <div id="acordeon3" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingOne">
              <div class="accordion-body">
                <table>
                  <tbody>
                    <tr>
                      <th>Dente*</th>
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
                        <input readonly style="width: 60px;" id="etdente" class='form-control form-control-sm' name='etdente'>
                        </input>
                        
                      </td>
                      <td style='width:1%'></td>
                      <td>
                        <select id="etprocedimento" class='form-control select form-control-sm' name='etprocedimento'>
                          <option selected disabled value=''>Selecione...</option>
                          <?php
                          foreach ($dadosprocedimento as $dados2) {
                            echo "<option data-custo='" . $dados2->custo . "' value='" . $dados2->nome . "'>" . $dados2->nome . " Min:" . $dados2->valormin . "|Max:" . $dados2->valormax . "</option>";
                          };
                          ?>
                        </select>
                      </td>
                      <td style='width:1%'></td>
                      <td>
                        <input style="width: 100px;" required type="text" id="etvalor" class='form-control form-control-sm' name='etvalor' onkeypress="$(this).mask('00.000,00', {reverse: true});">
                      </td>
                      <td style='width:1%'></td>
                      <td>
                        <select id="etsituacao" class='form-control select form-control-sm' name='etsituacao'>
                          <option value='Em andamento'>Em andamento</option>
                          <option selected value='Pendente'>Pendente</option>
                          <option value='Realizado'>Realizado</option>
                        </select>
                      </td>
                      <td style='width:1%'></td>
                      <td>
                        <button id="btinserir" href="#" class='btn btn-success btn-sm'>Inserir</button>
                      </td>
                      <td>
                        <input id="etdata" type="hidden" name="etcusto" <?php echo "value='" . date('Y-m-d') . "'"; ?>>
                        <input id="etcusto" type="hidden" name="etcusto" value="">
                        <input id="etfuncionario" type="hidden" name="etcusto" value="<?php echo $dados->funcionario ?>">

                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <!-- iframe -->
        <iframe id="frameatendimento" src="listaratendimento.php" height="100%" width="100%" frameborder="0">
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

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
  <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>

  <script>
    let btatualizar = $("#btagendar");
    let btcancelar = $("#btcancelar");
    let btinserir = $("#btinserir");

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
          success: function() {
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

    //select procedimento
    var procedimento = $("#etprocedimento");
    procedimento.on('change', function() {
      var custo = $("#etprocedimento option:selected").data('custo');
      var selecionado = $("#etprocedimento option:selected").text();
      var min = selecionado.substring(selecionado.indexOf("Min:") + 4, selecionado.indexOf("|"));
      var max = selecionado.substring(selecionado.indexOf("Max:") + 4);

      //mudar valor do imput custo
      $("#etcusto").val(custo);

    });

    //inserir procedimento
    btinserir.click(function() {
      var selecionado = $("#etprocedimento option:selected").text();
      var min = selecionado.substring(selecionado.indexOf("Min:") + 4, selecionado.indexOf("|"));
      var max = selecionado.substring(selecionado.indexOf("Max:") + 4);
      var paciente = $("#etpaciente").data('cpf');
      var dentista = $("#etfuncionario").val();
      var dente = $("#etdente").val();
      var procedimento = $("#etprocedimento option:selected").val();
      var valor = $("#etvalor").val();
      var custo = $("#etcusto").val();
      var situacao = $("#etsituacao option:selected").val();
      var dt = $("#etdata").val();

      if (paciente == '' || dentista == '' || dente == '' || procedimento == '' || valor == '' || custo == '' || situacao == '' || dt == '') {
        alert("Preencher todos os campos!");
      } else {
        if (parseFloat(valor) >= parseFloat(min) && parseFloat(valor) <= parseFloat(max)) {
          $.ajax({
            method: "POST",
            url: "../control/atendimento.controller.php?evento=cadastrar",
            data: {
              etpaciente: paciente,
              etdentista: dentista,
              etdente: dente,
              etprocedimento: procedimento,
              etvalor: valor,
              etcusto: custo,
              etsituacao: situacao,
              etdt: dt
            },
            success: function() {
              alert('Inserido!');
              window.location.reload();
            },
            fail: function() {
              alert('Erro ao inserir!');
            }
          });
        } else {
          alert("Valor fora da faixa!");
        }
      }
    });

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
      //muda valor do campo dente
      ndente.val($(this).val());
      // envia informação do dente para listar atenidmentos cadastrados
      var paciente = $("#etpaciente").data('cpf');
      $("#frameatendimento").attr('src', 'listaratendimento.php?etdente=' + $(this).val() + '&etpaciente=' + paciente);
    });
    //xx
    $("#botox").click(function(){
      ndente.val("FACE");
      var paciente = $("#etpaciente").data('cpf');
      $("#frameatendimento").attr('src', 'listaratendimento.php?etdente=' + "FACE" + '&etpaciente=' + paciente);
    });

    //botões de criança adulto
    var btadulto = $("#adulto");
    var btcrianca = $("#crianca");
    var dentescima = $("#criancacima");
    var dentesbaixo = $("#criancabaixo");
    var adultobaixo = $("#adultobaixo");
    var adultocima = $("#adultocima");

      dentescima.hide();
      dentesbaixo.hide();

    btadulto.click(function(){
      dentescima.hide();
      dentesbaixo.hide();
      adultobaixo.show();
      adultocima.show();
    });

    btcrianca.click(function(){
      dentescima.show();
      dentesbaixo.show();
      adultobaixo.hide()
      adultocima.hide()
    })
    </script>
</body>

</html>