<?php
session_start();
error_reporting(0);

if ($_SESSION['nome'] == null) {
  header("Location:../view/index.php");
}

$usuariologado = $_SESSION['nome'];
$nivel = $_SESSION['nivel'];

require_once '../control/paciente.controller.php';

$pac = new PacienteController();
$lista = $pac->listarAniversario();

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <link rel="shortcut icon" href="./img/icone.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel=”stylesheet” href=”https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css”>
  <title>Consultorio Dra. Abigail Marinho</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

  <style type="text/css">
    .row {
      margin-right: 0px !important;
    }

    .aniversario {
      position: absolute;
      /* display: flex; */
      right: 50px;
      /* border-radius: 0px 0px 10px 10px; */
      border-right: 1px solid #7B193F;
      border-bottom: 1px solid #7B193F;
      border-left: 1px solid #7B193F;
    }

    .aniversario table {
      margin-bottom: 0px !important;
    }

    .item {
      border: none !important;
    }

    .list-group {
      border-radius: 10px !important;
    }

    .esconder {
      opacity: 0;
      z-index: -1;
    }

    .niverdia {
      background: #7B193F;
      color: white;
    }


    /* animação */
    .slide-in-top {
      animation: slide-in-top 0.5s ease;
    }

    .slide-in-boton {
      animation: slide-in-boton 0.5s ease;
    }

    @keyframes slide-in-top {
      0% {
        transform: translateY(-10px);
        opacity: 0;
      }

      100% {
        transform: translateY(0);
        opacity: 1;
      }
    }

    @keyframes slide-in-boton {
      0% {
        transform: translateY(0);
        opacity: 1;
      }

      100% {
        transform: translateY(-10px);
        opacity: 0;
      }
    }
  </style>
  <link rel="stylesheet" href="./css/menu.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>

<body>
  <nav class="navbar navbar-dark">
    <span class="" href="#">Bem vindo, <?php echo $usuariologado; ?></span>
    <div>
      <div class="btn" id="btniver">
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" version="1.1" width="30" height="30" x="0" y="0" viewBox="0 0 24 24" style="enable-background:new 0 0 512 512" xml:space="preserve">
          <g>
            <path xmlns="http://www.w3.org/2000/svg" d="M24,22H22V12a3,3,0,0,0-3-3H13V5.794a2.536,2.536,0,0,0,1.537-2.331C14.537,2.062,12,0,12,0S9.463,2.062,9.463,3.463A2.536,2.536,0,0,0,11,5.794V9H5a3,3,0,0,0-3,3V22H0v2H24ZM5,11H19a1,1,0,0,1,1,1v2.98c-.936-.1-1.5-.7-1.5-.98h-2c0,.343-.682,1-1.75,1C13.661,15,13,14.306,13,14H11c0,.343-.682,1-1.75,1-1.089,0-1.75-.694-1.75-1h-2c0,.315-.579.888-1.5.981V12A1,1,0,0,1,5,11ZM4,16.979A4.156,4.156,0,0,0,6.5,16a4.309,4.309,0,0,0,5.5.015A4.309,4.309,0,0,0,17.5,16a4.156,4.156,0,0,0,2.5.978V22H4Z" fill="#ffffff" data-original="#000000" />
          </g>
        </svg>
      </div>
      <a class="btn" href="index.php?link=1" role="button"><img src="./img/power.png" alt="Sair"></a>
    </div>
  </nav>
  <div class="aniversario slide-in-top">
    <table class="table">
      <tbody>
        <?php
        foreach ($lista as $dados) {
          if (date('d/m', strtotime($dados->datanasc)) == date('d/m')) {
            echo '
            <tr class="niverdia">
              <td>' . $dados->nome . '</td>
              <td>' . date('d/m/y', strtotime($dados->datanasc)) . '</td>
            </tr>';
          } else {
            echo '
            <tr>
              <td>' . $dados->nome . '</td>
              <td>' . date('d/m/y', strtotime($dados->datanasc)) . '</td>
            </tr>';
          }
        }
        ?>
      </tbody>
    </table>
  </div>

  <br>
  <div class="row">
    <div class="col-2">
      <div class="list-group" id="list-tab" role="tablist">
        <a onmousedown="cliqueinicio()" class="list-group-item list-group-item-action active" id="list-inicio-list" data-bs-toggle="list" href="#list-inicio" role="tab" aria-controls="list-home"><img src="./img/home.png" id="inicio"> <span> Início</span></a>
        <a onmousedown="cliqueagenda();atualizarframe('agendaframe')" class="list-group-item list-group-item-action" id="list-agenda-list" data-bs-toggle="list" href="#list-agenda" role="tab" aria-controls="list-agenda"><img src="./img/agenda1.png" id="agenda"> <span> Agenda</span></a>
        <a onmousedown="cliquepaciente()" class="list-group-item list-group-item-action" id="list-paciente-list" data-bs-toggle="list" href="#list-paciente" role="tab" aria-controls="list-paciente"><img src="./img/paciente1.png" id="paciente"> <span> Pacientes</span></a>
        <a onmousedown="cliqueprocedimento()" class="list-group-item list-group-item-action" id="list-procedimento-list" data-bs-toggle="list" href="#list-procedimento" role="tab" aria-controls="list-procedimento"><img src="./img/procedimento1.png" id="procedimento"> <span> Procedimentos</span></a>
        <?php
        if ($nivel <= 0) { ?>
          <a onmousedown="cliquefuncionario()" class="list-group-item list-group-item-action" id="list-funcionario-list" data-bs-toggle="list" href="#list-funcionario" role="tab" aria-controls="list-funcionario"><img src="./img/funcionario1.png" id="funcionario"> <span> Funcionários</span></a>
        <?php } ?>
        <?php
        if ($nivel <= 0) { ?>
          <a onmousedown="cliquerelatorio()" class="list-group-item list-group-item-action" id="list-funcionario-list" data-bs-toggle="list" href="#list-relatorios" role="tab" aria-controls="list-funcionario"><img src="./img/relatorio1.png" id="relatorio"> <span> Relatórios</span></a>
        <?php } ?>
      </div>
    </div>
    <div class="col-10">
      <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="list-inicio" role="tabpanel" aria-labelledby="list-inicio-list">
          <img class="logo" src="./img/logo.png" alt="Logo">
        </div>
        <div class="tab-pane fade" id="list-paciente" role="tabpanel" aria-labelledby="list-paciente-list">
          <iframe name="frameprinc" height="1200" width="100%" src="buscarpaciente.php"></iframe>
        </div>
        <div class="tab-pane fade" id="list-procedimento" role="tabpanel" aria-labelledby="list-procedimento-list">
          <iframe name="frameproc" height="1200" width="100%" src="buscarprocedimento.php"></iframe>
        </div>
        <div class="tab-pane fade" id="list-agenda" role="tabpanel" aria-labelledby="list-agenda-list">
          <iframe id="agendaframe" name="frameagen" height="1200" width="100%" src="selecaoDentista.php"></iframe>
        </div>
        <div class="tab-pane fade" id="list-funcionario" role="tabpanel" aria-labelledby="list-funcionario-list">
          <iframe name="framefuncionario" height="1200" width="100%" src="buscarfuncionario.php"></iframe>
        </div>
        <div class="tab-pane fade" id="list-relatorios" role="tabpanel" aria-labelledby="list-relatorios-list">
          <iframe name="framerelatorios" height="1200" width="100%" src="relatorios.php"></iframe>
        </div>
      </div>
    </div>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>

  <script>
    function cliqueinicio() {
      document.getElementById("inicio").src = './img/home.png';
      document.getElementById("agenda").src = './img/agenda1.png';
      document.getElementById("paciente").src = './img/paciente1.png';
      document.getElementById("procedimento").src = './img/procedimento1.png';
      document.getElementById("funcionario").src = './img/funcionario1.png';
      document.getElementById("relatorio").src = './img/relatorio1.png';
    }

    function cliqueagenda() {
      document.getElementById("agenda").src = './img/agenda.png';
      document.getElementById("inicio").src = './img/home1.png';
      document.getElementById("paciente").src = './img/paciente1.png';
      document.getElementById("procedimento").src = './img/procedimento1.png';
      document.getElementById("funcionario").src = './img/funcionario1.png';
      document.getElementById("relatorio").src = './img/relatorio1.png';
    }

    function cliquepaciente() {
      document.getElementById("paciente").src = './img/paciente.png';
      document.getElementById("agenda").src = './img/agenda1.png';
      document.getElementById("inicio").src = './img/home1.png';
      document.getElementById("procedimento").src = './img/procedimento1.png';
      document.getElementById("funcionario").src = './img/funcionario1.png';
      document.getElementById("relatorio").src = './img/relatorio1.png';
    }

    function cliqueprocedimento() {
      document.getElementById("procedimento").src = './img/procedimento.png';
      document.getElementById("paciente").src = './img/paciente1.png';
      document.getElementById("agenda").src = './img/agenda1.png';
      document.getElementById("inicio").src = './img/home1.png';
      document.getElementById("funcionario").src = './img/funcionario1.png';
      document.getElementById("relatorio").src = './img/relatorio1.png';
    }

    function cliquefuncionario() {
      document.getElementById("funcionario").src = './img/funcionario.png';
      document.getElementById("procedimento").src = './img/procedimento1.png';
      document.getElementById("paciente").src = './img/paciente1.png';
      document.getElementById("agenda").src = './img/agenda1.png';
      document.getElementById("inicio").src = './img/home1.png';
      document.getElementById("relatorio").src = './img/relatorio1.png';
    }

    function cliquerelatorio() {
      document.getElementById("relatorio").src = './img/relatorio.png';
      document.getElementById("procedimento").src = './img/procedimento1.png';
      document.getElementById("paciente").src = './img/paciente1.png';
      document.getElementById("agenda").src = './img/agenda1.png';
      document.getElementById("inicio").src = './img/home1.png';
      document.getElementById("funcionario").src = './img/funcionario1.png';
    }

    function atualizarframe(ID) {
      var frame = document.getElementById(ID);
      //frame.src = frame.src;
      frame.contentWindow.location.reload(true);
    }

    //fechar e abrir aba de aniversarios
    $("#btniver").click(function() {
      if ($(".aniversario").hasClass("esconder")) {
        $(".aniversario").removeClass("esconder");
        $(".aniversario").removeClass("slide-in-boton");
        $(".aniversario").addClass("slide-in-top");
      } else {
        $(".aniversario").removeClass("slide-in-top");
        $(".aniversario").addClass("slide-in-boton");
        $(".aniversario").addClass("esconder");
      }
    })
  </script>
</body>

</html>