<?php 
session_start();

if($_SESSION['nome'] == null){
  header("Location:../view/index.php");
}

$usuariologado = $_SESSION['nome'];

?>
<!DOCTYPE html>
  <html>
  <head>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="./img/icone.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel=”stylesheet” href=”https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css”>
    <title>Consultorio XXX</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

    <style type="text/css">
    .row{ margin-right: 0px !important; } 
    </style>
    <link rel="stylesheet" href="./css/menu.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
  </head>
  <body>
    <nav class="navbar navbar-dark">
      <span class="" href="#">Bem vindo, <?php echo $usuariologado; ?></span>
      <a class="btn" href="index.php?link=1" role="button"><img src="./img/power.png" alt="Sair"></a>
    </nav>
    <br>
    <div class="row">
      <div class="col-2">
        <div class="list-group" id="list-tab" role="tablist">
          <a onmousedown="cliqueinicio()" class="list-group-item list-group-item-action active" id="list-inicio-list" data-bs-toggle="list" href="#list-inicio" role="tab" aria-controls="list-home"><img  src="./img/home.png" id="inicio"> <span> Início</span></a>
          <a onmousedown="cliqueagenda();atualizarframe('agendaframe')" class="list-group-item list-group-item-action" id="list-agenda-list" data-bs-toggle="list" href="#list-agenda" role="tab" aria-controls="list-agenda"><img src="./img/agenda1.png" id="agenda"> <span> Agenda</span></a>
          <a onmousedown="cliquepaciente()" class="list-group-item list-group-item-action" id="list-paciente-list" data-bs-toggle="list" href="#list-paciente" role="tab" aria-controls="list-paciente"><img src="./img/paciente1.png" id="paciente"> <span> Pacientes</span></a>
          <a onmousedown="cliqueprocedimento()" class="list-group-item list-group-item-action" id="list-procedimento-list" data-bs-toggle="list" href="#list-procedimento" role="tab" aria-controls="list-procedimento"><img src="./img/procedimento1.png" id="procedimento"> <span> Procedimentos</span></a>
          <a onmousedown="cliquefuncionario()" class="list-group-item list-group-item-action" id="list-funcionario-list" data-bs-toggle="list" href="#list-funcionario" role="tab" aria-controls="list-funcionario"><img src="./img/funcionario1.png" id="funcionario"> <span> Funcionários</span></a>
          
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
        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>

    <script>
      function cliqueinicio(){
        document.getElementById("inicio").src = './img/home.png';
        document.getElementById("agenda").src = './img/agenda1.png';
        document.getElementById("paciente").src = './img/paciente1.png';
        document.getElementById("procedimento").src = './img/procedimento1.png';
        document.getElementById("funcionario").src = './img/funcionario1.png';
      }      
      function cliqueagenda(){
        document.getElementById("agenda").src = './img/agenda.png';
        document.getElementById("inicio").src = './img/home1.png';
        document.getElementById("paciente").src = './img/paciente1.png';
        document.getElementById("procedimento").src = './img/procedimento1.png';
        document.getElementById("funcionario").src = './img/funcionario1.png';
      }
      function cliquepaciente(){
        document.getElementById("paciente").src = './img/paciente.png';
        document.getElementById("agenda").src = './img/agenda1.png';
        document.getElementById("inicio").src = './img/home1.png';
        document.getElementById("procedimento").src = './img/procedimento1.png';
        document.getElementById("funcionario").src = './img/funcionario1.png';
      }
      function cliqueprocedimento(){
        document.getElementById("procedimento").src = './img/procedimento.png';
        document.getElementById("paciente").src = './img/paciente1.png';
        document.getElementById("agenda").src = './img/agenda1.png';
        document.getElementById("inicio").src = './img/home1.png';
        document.getElementById("funcionario").src = './img/funcionario1.png';
      }
      function cliquefuncionario(){
        document.getElementById("funcionario").src = './img/funcionario.png';
        document.getElementById("procedimento").src = './img/procedimento1.png';
        document.getElementById("paciente").src = './img/paciente1.png';
        document.getElementById("agenda").src = './img/agenda1.png';
        document.getElementById("inicio").src = './img/home1.png';
      }
      function atualizarframe(ID){
        var frame = document.getElementById(ID);
        //frame.src = frame.src;
        frame.contentWindow.location.reload(true);
      }
    </script>
  </body>
  
  </html>