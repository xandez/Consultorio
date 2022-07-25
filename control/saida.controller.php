<?php

require_once '../model/Conexao.php';
require_once '../model/saida.php';

class SaidaController
{

  public function __construct()
  {
    call_user_func(array($this, $_REQUEST["evento"]));
  }

  public function cadastrar()
  {
    ConexaoBD::conectar();

    $saidas = new Saida();
    $saidas->set('tipo', $_POST["ettipo"],'UTF-8');
    $saidas->set('descricao', mb_strtoupper($_POST["etdescricao"]),'UTF-8');
    $saidas->set('valor', str_replace(',', '.', str_replace('.', '', $_POST['etvalor'])));
    $saidas->set('usuario', $_POST["etusuario"],'UTF-8');
    $saidas->set('datalanc', $_POST["etdata"]);
    $saidas->set('datacompetencia', date('Y-m-d H:i:s',strtotime($_POST["etdatacomp"])));

    // echo "<script>alert('".$saidas->get('tipo')."');</script>";
    // echo "<script>alert('".$saidas->get('descricao')."');</script>";
    // echo "<script>alert('".$saidas->get('valor')."');</script>";
    // echo "<script>alert('".$saidas->get('usuario')."');</script>";
    // echo "<script>alert('".$saidas->get('datalanc')."');</script>";
    // echo "<script>alert('".$saidas->get('datacompetencia')."');</script>";

    if ($saidas->cadastrar()) {
      echo "<script>alert('Operação realizada com sucesso.');</script>";
      header("refresh:1;url=../view/saida.php");
    }else{
      echo "<script>alert('Erro ao cadastrar!');</script>";
      header("refresh:1;url=../view/saida.php");
    }

    ConexaoBD::desconecta();

  }

  public function relatorioSaidas($inicio,$fim){
    ConexaoBD::conectar();

    $relatorio = new Saida();
    $relatorio->set('datainicio', $inicio);
    $relatorio->set('datafim', $fim);

    $dados = $relatorio->listar();

    if($dados != null){
      return $dados;
    }else{
      return null;
    }

    ConexaoBD::desconecta();
  }

  public function listarTipoSaida(){
    ConexaoBD::conectar();

    $tipo = new Saida();
    
    $dados = $tipo->listarTipoSaida();

    return $dados;
  }
}

$controller = new SaidaController();
