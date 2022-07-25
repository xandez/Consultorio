<?php 
session_start();

if($_SESSION['nome'] == null || $_SESSION['nivel'] > 0){
  header("Location:../view/index.php");
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
  <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We' crossorigin='anonymous'>
</head>

<style>
  .campos {
    display: flex;
    justify-content: start;
    align-items: flex-start;

  }

  .campos input {
    width: 150px;
    margin-right: 15px;
    margin-left: 2px;
  }

  .accordion-button:not(.collapsed) {
    color: black;
    background-color: #f0f0f1;
  }
</style>

<body>
  <div class="accordion" id="accordionExample">
    <!-- Item Pagamentos -->
    <div class="accordion-item">
      <h2 class="accordion-header" id="headingOne">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
          <b>1. Pagamentos</b> 
        </button>
      </h2>
      <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
        <div class="accordion-body campos">
          <form class="campos" action="relatoriopagamento.php" method="POST">
            <label class="form-label">Data Início: </label>
            <input type="date" class='form-control btn-sm' name="datainicio" id="datainicio">
            <label class="form-label">Data Fim: </label>
            <input type="date" class='form-control btn-sm' name="datafim" id="datafim">
            <input type="submit" class="btn btn-success btn-sm" value="Gerar">
          </form>
        </div>
      </div>
    </div>
    <!-- Item Saidas -->
    <div class="accordion-item">
      <h2 class="accordion-header" id="headingdois">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsedois" aria-expanded="false" aria-controls="collapsedois">
          <b>2. Saidas</b>  
        </button>
      </h2>
      <div id="collapsedois" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
        <div class="accordion-body campos">
          <form class="campos" action="relatoriosaidas.php" method="POST">
            <label class="form-label">Data Início: </label>
            <input type="date" class='form-control btn-sm' name="datainicio" id="datainicio">
            <label class="form-label">Data Fim: </label>
            <input type="date" class='form-control btn-sm' name="datafim" id="datafim">
            <input type="submit" class="btn btn-success btn-sm" value="Gerar">
          </form>
        </div>
      </div>
    </div>
  </div>
</body>

</html>

<script src='https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js' integrity='sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj' crossorigin='anonymous'></script>
<script src='https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js' integrity='sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/' crossorigin='anonymous'></script>