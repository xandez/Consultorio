<!DOCTYPE html>
  <html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Consultorio XXX</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

      <style type="text/css">
      .row{ margin-right: 0px !important; } 
      </style>
  </head>
  <body>

    <nav class="navbar navbar-dark bg-primary">
      <a class="navbar-brand" href="#">Navbar</a>
    </nav>
    <br>
    <!--
    <div class="row">
      <div class="col-2">
        <ul class="list-group">
          <a href="#" class="list-group-item list-group-item-action " aria-current="true">
            Inicio
          </a>
          <a href="novopaciente.php" class="list-group-item list-group-item-action" target="frameprinc" >Paciente</a>
          <a href="#" class="list-group-item list-group-item-action">A third link item</a>
          <a href="#" class="list-group-item list-group-item-action">A fourth link item</a>
        </ul>        
      </div>
      <div class="col-8">
        <iframe name="frameprinc" height="1200" width="1300" src=""></iframe>
      </div>
    </div>
-->
    <div class="row">
      <div class="col-2">
        <div class="list-group" id="list-tab" role="tablist">
          <a class="list-group-item list-group-item-action active" id="list-inicio-list" data-bs-toggle="list" href="#list-inicio" role="tab" aria-controls="list-home">Início</a>
          <a class="list-group-item list-group-item-action" id="list-agenda-list" data-bs-toggle="list" href="#list-agenda" role="tab" aria-controls="list-agenda">Agenda</a>
          <a class="list-group-item list-group-item-action" id="list-paciente-list" data-bs-toggle="list" href="#list-paciente" role="tab" aria-controls="list-paciente">Pacientes</a>
          <a class="list-group-item list-group-item-action" id="list-procedimento-list" data-bs-toggle="list" href="#list-procedimento" role="tab" aria-controls="list-procedimento">Procedimentos</a>
          <a class="list-group-item list-group-item-action" id="list-funcionario-list" data-bs-toggle="list" href="#list-funcionario" role="tab" aria-controls="list-funcionario">Funcionários</a>
          
        </div>
      </div>
      <div class="col-10">
        <div class="tab-content" id="nav-tabContent">
          <div class="tab-pane fade show active" id="list-inicio" role="tabpanel" aria-labelledby="list-inicio-list">1</div>
          <div class="tab-pane fade" id="list-paciente" role="tabpanel" aria-labelledby="list-paciente-list">
            <iframe name="frameprinc" height="1200" width="100%" src="menupaciente.php"></iframe>
          </div>
          <div class="tab-pane fade" id="list-procedimento" role="tabpanel" aria-labelledby="list-procedimento-list">
            <iframe name="frameproc" height="1200" width="100%" src="menuprocedimento.php"></iframe>
          </div>
          <div class="tab-pane fade" id="list-agenda" role="tabpanel" aria-labelledby="list-agenda-list">
            <iframe name="frameagen" height="1200" width="100%" src="selecaoDentista.php"></iframe>
          </div>
          <div class="tab-pane fade" id="list-funcionario" role="tabpanel" aria-labelledby="list-funcionario-list">
            <iframe name="framefuncionario" height="1200" width="100%" src="novofuncionario.php"></iframe>
          </div>
        </div>
      </div>
    </div>
      

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>

  </body>
  </html>