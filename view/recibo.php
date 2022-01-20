
<?php 
error_reporting(0);
date_default_timezone_set('America/Belem');
session_start();

if($_SESSION['nome'] == null){
  header("Location:../view/index.php");
}

require_once '../control/pagamento.controller.php';
$id = $_GET['id'];
if (!isset($id)){
  echo 'Selecione um comprovante valido!!';
}


$recibo = new PagamentoController();
$lista = $recibo->recibo($id);

foreach ($lista as $dados){}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<style>
  * {
    margin: 0;
    padding: 0;
  }

  header {
    border-style: solid;
    border-width: 1px;
    border-radius: 10px;
    padding: 10px 0px 10px 0px;
    margin: 0px 10px 0px 10px;
    position: relative;
    justify-content: center;
    text-align: right;
    top: 3px;
  }

  header ul {
    margin-right: 20px;
  }

  header ul li {
    display: inline-block;
    margin-left: 20px;
  }

  .topo {
    position: relative;
    text-align: right;
  }
  .logo{
    position: absolute;
    left: 0px;
  }

  .logo p{
    margin-left: 80px;
  }

  img {
    position: absolute;
    margin-left: 20px;
    width: 100px;
    height: 30px;
    top: -5px;
    left: -20px;
  }
  #corpo{
    border-style: solid;
    border-width: 1px;
    border-radius: 10px;
    padding: 10px 10px 10px 10px;
    margin: 10px 10px 20px 10px;
  }

  #ass{
    justify-content: center;
    text-align: center;
    margin-top: 20px;
  }

  #corpo p{
    padding-top: 10px;
  }

  #linha{
    width: 100%;
    height: 1px;
    background-color: white;
    border-bottom-style:dashed;
    border-width: 1px;
  }
</style>

<body>
  <header>
    <div class="logo">
      <img src="./img/logo_preto.png" alt="">
      <p>Dr. Abigail Marinho</p>
    </div>
    <div class="topo">
      <ul>
        <li>Recibo Nº <?php echo $id ?></li>
        <li>Valor: R$ <?php echo $dados->valor ?></li>
      </ul>
    </div>
  </header>
  <div id="corpo">
    <p>Recebemos da(o): <?php echo $dados->nome ?></p>
    <p>Data pagamento: <?php  echo $dados->data ?></p>
    <p>Forma de pagamento: <?php echo $dados->tipo ?></p>
    <div id="ass">
      <p>___________________________________________</p>
      <p>Assinatura</p>
    </div>
  </div>
  <div id="linha"></div>
</body>

</html>