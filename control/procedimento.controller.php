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
		$procedimento->set('nome',mb_strtoupper($_POST['etnome']),'UTF-8');
		$procedimento->set('valor',str_replace(',','.',$_POST['etvalor']));
		$procedimento->set('valmin',str_replace(',','.',$_POST['etvalmin']));
		$procedimento->set('valmax',str_replace(',','.',$_POST['etvalmax']));
		$procedimento->set('especialidade',mb_strtoupper($_POST['etespec']),'UTF-8');
		$procedimento->set('custo',str_replace(',','.',$_POST['etcusto']));

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
		$procedimento->set('nome',mb_strtoupper($nome),'UTF-8');
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
		$procedimento->set('nome',mb_strtoupper($_POST['etnome']),'UTF-8');
		$procedimento->set('valor',str_replace(',','.',$_POST['etvalor']));
		$procedimento->set('valmin',str_replace(',','.',$_POST['etvalmin']));
		$procedimento->set('valmax',str_replace(',','.',$_POST['etvalmax']));
		$procedimento->set('especialidade',mb_strtoupper($_POST['etespec']),'UTF-8');
		$procedimento->set('custo',str_replace(',','.',$_POST['etcusto']));

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