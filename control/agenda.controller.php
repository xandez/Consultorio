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
		$agenda->set('funcionario',strtoupper($_POST['etfuncionario']));
		$agenda->set('inicio',$_POST['etinicio']);
		$agenda->set('fim',$_POST['etfim']);
		$agenda->set('tipo',strtoupper($_POST['ettipo']));
		$agenda->set('paciente',strtoupper($_POST['etpaciente']));
		$agenda->set('protocolo',$_POST['etprotocolo']);
		$agenda->set('status',strtoupper("aberto"));

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
		$agenda->set('funcionario',$funcionario);
		$agenda->set('inicio',$inicio);
		$agenda->set('fim',$fim);
		$dados = $agenda->buscarAgenda();

		if ($dados != null) {
			return $dados;
		}else{
			$msg = 'não tem dados';
			return $msg;
		}
	}

}	

$controller = new AgendaController();

?>