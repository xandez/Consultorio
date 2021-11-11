<?php 
	require_once '../Model/Conexao.php';
	require_once '../Model/agenda.php';

class AgendaController{

	public function __construct(){
			call_user_func(array($this, $_REQUEST["evento"]));
	}

	public function cadastrar(){

		ConexaoBD::conectar();

		$agenda = new Agenda();
		$agenda->set('funcionario',mb_strtoupper($_POST['etfuncionario']),'UTF-8');
		$agenda->set('inicio',$_POST['etinicio']);
		$agenda->set('fim',$_POST['etfim']);
		$agenda->set('tipo',mb_strtoupper($_POST['ettipo']),'UTF-8');
		$agenda->set('paciente',mb_strtoupper($_POST['etpaciente']),'UTF-8');
		$agenda->set('protocolo',$_POST['etprotocolo']);
		$agenda->set('status',mb_strtoupper($_POST['etstatus']),'UTF-8');

		if ($agenda->cadastrarAgenda()) {
			echo "<script>alert('Operação realizada com sucesso.');</script>";
			header("refresh:1;url=../view/selecaoDentista.php");
		}else{			
			echo "<script>alert('Erro ao cadastrar!');</script>";
			header("refresh:1;url=../view/selecaoDentista.php");
		}

		ConexaoBD::desconecta();
	}

	public function listarDadosAgenda($funcionario,$inicio,$fim){
		ConexaoBD::conectar();

		$agenda = new Agenda();
		$agenda->set('funcionario',mb_strtoupper($funcionario),'UTF-8');
		$agenda->set('inicio',$inicio);
		$agenda->set('fim',$fim);
		$dados = $agenda->buscarAgenda();

		if ($dados != null) {
			return $dados;
		}else{
			$msg = 'não tem dados';
			return $msg;
		}

		ConexaoBD::desconecta();
	}

	public function listarAgenda($id){
		ConexaoBD::conectar();

		$agenda = new Agenda();
		$agenda->set('id',$id);
		$dados = $agenda->buscarAgenda();

		if($dados != null){
			return $dados;
		}else{
			$msg = 'não tem dados';
			return $msg;
		}

		ConexaoBD::desconecta();
	}

	public function editarAgenda(){

		ConexaoBD::conectar();

		$agenda = new Agenda();
		$agenda->set('id',$_POST['etid']);
		$agenda->set('inicio',$_POST['etinicio']);
		$agenda->set('fim',$_POST['etfim']);
		$agenda->set('tipo',mb_strtoupper($_POST['ettipo']),'UTF-8');
		$agenda->set('status',mb_strtoupper($_POST['etstatus']),'UTF-8');

		if($agenda->editar()){
			return true;
		}else{
			return false;
		}

		ConexaoBD::desconecta();

	}

}	

$controller = new AgendaController();

?>