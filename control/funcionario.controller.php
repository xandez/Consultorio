<?php 
require_once '../Model/Conexao.php';
require_once '../Model/funcionario.php';

class FuncionarioController{

	public function __construct(){
		call_user_func(array($this, $_REQUEST["evento"]));
	}	

	public function cadastrar(){

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