<?php
require_once '../model/Conexao.php';
require_once '../model/pagamento.php';

class PagamentoController
{

  public function __construct()
  {
    call_user_func(array($this, $_REQUEST["evento"]));
  }

  public function cadastrar()
  {
    ConexaoBD::conectar();

    $pagamento = new Pagamento();
    $pagamento->set('cpf', $_POST['etcpf']);
    $pagamento->set('valor', str_replace(',', '.', str_replace('.', '', $_POST['etvalor'])));
    $pagamento->set('data', $_POST['etdata']);
    $pagamento->set('datalanc', $_POST['etdatalanc']);
    $pagamento->set('tipo', mb_strtoupper($_POST['ettipo']), 'UTF-8');
    $pagamento->set('usuariocad', mb_strtoupper($_POST['etusuario']), 'UTF-8');

    if ($pagamento->cadastrar()) {
      header("refresh:1;url=../view/novopagamento.php?etcpf=" . $_POST['etcpf']);
      echo "<script>alert('Operação realizada com sucesso.');</script>";
    } else {
      header("refresh:1;url=../view/novopagamento.php?etcpf=" . $_POST['etcpf']);
      echo "<script>alert('Erro ao cadastrar!');</script>";
    }

    ConexaoBD::desconecta();
  }

  public function listarSaldo($cpf)
  {
    ConexaoBD::conectar();

    $pagamento = new Pagamento();
    $pagamento->set('cpf', $cpf);

    $dados = $pagamento->saldo();

    if ($dados != null) {
      return $dados;
    } else {
      return $msg = "Sem registro";
    }

    ConexaoBD::desconecta();
  }

  public function listarRecibos($cpf)
  {
    ConexaoBD::conectar();

    $recibo = new Pagamento();
    $recibo->set('cpf', $cpf);

    $dados = $recibo->recibo();

    if ($dados != null) {
      return $dados;
    } else {
      return null;
    }

    ConexaoBD::desconecta();
  }

  public function recibo($id)
  {
    ConexaoBD::conectar();

    $recibo = new Pagamento();
    $recibo->set('id', $id);

    $dados = $recibo->reciboInd();

    if ($dados != null) {
      return $dados;
    } else {
      return null;
    }

    ConexaoBD::desconecta();
  }

  public function relatorioPagamento($inicio,$fim)
  {
    ConexaoBD::conectar();

    $relatorio = new Pagamento();
    $relatorio->set('datainicio', $inicio);
    $relatorio->set('datafim', $fim);

    $dados = $relatorio->relatorioPagamento();

    if($dados != null){
      return $dados;
    }else{
      return null;
    }

    ConexaoBD::desconecta();
  }
}
$controller = new PagamentoController();
