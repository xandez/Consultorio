<?php 
require_once '../Model/Conexao.php';
require_once '../Model/funcionario.php';

class FuncionarioController{

	public function __construct(){
		call_user_func(array($this, $_REQUEST["evento"]));
	}	

	public function cadastrar(){

		ConexaoBD::conectar();

		$funcionaio = new Funcionario();
		$funcionaio->set('nome',mb_strtoupper($_POST['etnome']),'UTF-8');
		$funcionaio->set('cpf',$_POST['etcpf']);
		$funcionaio->set('funcao',mb_strtoupper($_POST['etfuncao']),'UTF-8');
		$funcionaio->set('admissao',$_POST['etadmissao']);
		$funcionaio->set('status',mb_strtoupper($_POST['etstatus']),'UTF-8');
		$funcionaio->set('rg',$_POST['etrg']);
		$funcionaio->set('salario',$_POST['etsalario']);
		if ($_POST['etdemissao'] == null){
			$funcionaio->set('demissao','0000-00-00');
		}else{
			$funcionaio->set('demissao',$_POST['etdemissao']);
		}
		

		if($funcionaio->cadastrarFuncionario()){
			echo "<script>alert('Operação realizada com sucesso.');</script>";
			header("refresh:1;url=../view/novofuncionario.php");
		}else{
			echo "<script>alert('Erro ao cadastrar!');</script>";
			header("refresh:1;url=../view/novofuncionario.php");
		}

		ConexaoBD::desconecta();
	
	}

	public function listarDadosFuncionario($funcao){
		ConexaoBD::conectar();

		$func = new Funcionario();
		$func->set('funcao',$funcao);

		$dados = $func->buscarFuncionario();

		if ($dados != null) {
			return $dados;
		}else{
			$msg = 'não tem dados';
			return $msg;
		}

	}

}

$controller = new FuncionarioController();
?>