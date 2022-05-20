<?php

require_once '../model/Conexao.php';
require_once '../model/atendimento.php';

class AtendimentoController{

  public function __construct(){
    call_user_func(array($this, $_REQUEST["evento"]));
  }

  public function cadastrar(){
    ConexaoBD::conectar();

    $atendimento = new Atendimento();
    $atendimento->set('paciente', $_POST['etpaciente']);
    $atendimento->set('dentista', mb_strtoupper($_POST['etdentista']));
    $atendimento->set('dente', mb_strtoupper($_POST['etdente']));
    $atendimento->set('procedimento', mb_strtoupper($_POST['etprocedimento']));
    $atendimento->set('valor', str_replace(',','.',str_replace('.','',$_POST['etvalor'])));
    $atendimento->set('custo', str_replace(',','.',$_POST['etcusto']));
    $atendimento->set('situacao', mb_strtoupper($_POST['etsituacao']));
    $atendimento->set('dt', $_POST['etdt']);

    if($atendimento->cadastrar()){
      echo "<script>alert('Operação realizada com sucesso.');</script>";
    }else{
      echo "<script>alert('Erro ao inserir procedimento!');</script>";
    }

    ConexaoBD::desconecta();

  }

  public function editar(){
    ConexaoBD::conectar();

    $atendimento = new Atendimento();
    $atendimento->set('id', $_POST['etid']);
    $atendimento->set('situacao', $_POST['etsituacao']);
    $atendimento->set('dt', $_POST['etdata']);

    if($atendimento->editar()){
      echo "<script>alert('Operação realizada com sucesso.');</script>";
    }else{
      echo "<script>alert('Erro ao inserir procedimento!');</script>";
    }

    ConexaoBD::desconecta();
  }

  public function excluir(){
    ConexaoBD::conectar();

    $atendimento = new Atendimento();
    $atendimento->set('id',$_POST['etid']);
    
    if($atendimento->excluir()){
      echo "<script>alert('Operação realizada com sucesso.');</script>";
    }else{
      echo "<script>alert('Erro ao inserir procedimento!');</script>";
    }

    ConexaoBD::desconecta();
  }

  public function listar($paciente,$dente){
    ConexaoBD::conectar();

    $atendimento = new Atendimento();
    $atendimento->set('paciente',$paciente);
    $atendimento->set('dente',$dente);

    $dados = $atendimento->listar();

    if($dados != null){
      return $dados;
    }else{
			return null;
    }

    ConexaoBD::desconecta();
  }

  public function listarPorPaciente($paciente){
    ConexaoBD::conectar();

    $atendimento = new Atendimento();
    $atendimento->set('paciente',$paciente);

    $dados = $atendimento->listarPorPaciente();

    if($dados != null){
      return $dados;
    }else{
			return null;
    }

    ConexaoBD::desconecta();
  }

  public function denteProcedimento($paciente,$tipo){
    ConexaoBD::conectar();

    $atendimento = new Atendimento();
    $atendimento->set('paciente',$paciente);
    if($tipo == 'pendente'){
      $dados = $atendimento->denteComProcedimento();
    }else{
      $dados = $atendimento->denteComProcedimentoOk();
    }
    if($dados != null){
      return $dados;
    }else{
			return null;
    }

    ConexaoBD::desconecta();
  }

}

$controller = new AtendimentoController();
