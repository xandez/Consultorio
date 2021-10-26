<?php 
require_once '../Model/Conexao.php';
require_once '../Model/pagamento.php';

class PagamentoController{

  public function __construct(){
		call_user_func(array($this, $_REQUEST["evento"]));
	}	
  
  public function cadastrar(){
    ConexaoBD::conectar();

    $pagamento = new Pagamento();
    $pagamento->set('cpf',$_POST['etcpf']);
    $pagamento->set('valor',str_replace(',','.',$_POST['etvalor']));
    $pagamento->set('data',$_POST['etdata']);
    $pagamento->set('datalanc',$_POST['etdatalanc']);
    $pagamento->set('tipo',mb_strtoupper($_POST['ettipo']),'UTF-8');

    if ($pagamento->cadastrar()) {
      echo "<script>alert('Operação realizada com sucesso.');</script>";
			header("refresh:1;url=../view/buscarpaciente.php");
    }else{
      echo "<script>alert('Erro ao cadastrar!');</script>";
			header("refresh:1;url=../view/novopagamento.php");
    }

    ConexaoBD::desconecta();
  }

  public function listarSaldo($cpf){
    ConexaoBD::conectar();

    $pagamento = new Pagamento();
    $pagamento->set('cpf',$cpf);

    $dados = $pagamento->saldo();

    if ($dados != null) {
      return $dados;
    }else{
      return $msg = "Sem registro";
    }

    ConexaoBD::desconecta();

  }
}
$controller = new PagamentoController();

?>