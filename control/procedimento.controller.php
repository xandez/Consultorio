<?php 

	require_once '../Model/Conexao.php';
	require_once '../Model/procedimento.php';

class ProcedimentoController{

	public function __construct(){
			call_user_func(array($this, $_REQUEST["evento"]));
	}

	public function cadastrar(){

		ConexaoBD::conectar();
	
		$procedimento = new Procedimento();
		$procedimento->set('nome',strtoupper($_POST['etnome']));
		$procedimento->set('valor',number_format($_POST['etvalor'],2,'.',','));
		$procedimento->set('valmin',number_format($_POST['etvalmin'],2,'.',','));
		$procedimento->set('valmax',number_format($_POST['etvalmax'],2,'.',','));
		$procedimento->set('especialidade',strtoupper($_POST['etespec']));
		$procedimento->set('custo',number_format($_POST['etcusto'],2,'.',','));

		if ($procedimento->cadastrarProcedimento()) {
			echo "<script>alert('Operação realizada com sucesso.');</script>";
			header("refresh:1;url=../view/novoprocedimento.php");
		}else{
			echo "<script>alert('Erro ao cadastrar!');</script>";
			header("refresh:1;url=../view/novoprocedimento.php");
		}
		ConexaoBD::desconecta();
	}

	public function listarProcedimento($nome,$id){
		ConexaoBD::conectar();

		$procedimento = new Procedimento();
		$procedimento->set('nome',strtoupper($nome));
		$procedimento->set('id',$id);

		$dados = $procedimento->buscarProcedimento();

		if ($dados != null) {
			return $dados;
		}else{
			$msg = 'não tem dados';
			return $msg;
		}

		ConexaoBD::desconecta();
	}

	public function editarProcedimento(){
		ConexaoBD::conectar();

		$procedimento = new Procedimento();
		$procedimento->set('id',$_POST['etcod']);
		$procedimento->set('nome',strtoupper($_POST['etnome']));
		$procedimento->set('valor',number_format($_POST['etvalor'],2,'.',','));
		$procedimento->set('valmin',number_format($_POST['etvalmin'],2,'.',','));
		$procedimento->set('valmax',number_format($_POST['etvalmax'],2,'.',','));
		$procedimento->set('especialidade',strtoupper($_POST['etespec']));
		$procedimento->set('custo',number_format($_POST['etcusto'],2,'.',','));

		if($procedimento->editarProcedimento()){
			echo "<script>alert('Operação realizada com sucesso.');</script>";
			header("refresh:1;url=../view/menuprocedimento.php");
		}else{
			echo "<script>alert('Erro ao cadastrar!');</script>";
			header("refresh:1;url=../view/menuprocedimento.php");
		}

		ConexaoBD::desconecta();
		
	}

}

$controller = new ProcedimentoController();

?>