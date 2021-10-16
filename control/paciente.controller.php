<?php 
	require_once '../Model/Conexao.php';
	require_once '../Model/paciente.php';

class PacienteController{

	public function __construct(){
			call_user_func(array($this, $_REQUEST["evento"]));
	}

	public function cadastrar(){

		ConexaoBD::conectar();

		$paciente = new Paciente();
		$paciente->set('nome',strtoupper($_POST['etnome']));
		$paciente->set('fone',$_POST['etfone']);
		$paciente->set('idade',$_POST['etidade']);
		$paciente->set('datanasc',$_POST['etdatanasc']);
		$paciente->set('sexo',strtoupper($_POST['etsexo']));
		$paciente->set('endereco',strtoupper($_POST['etendereco']));
		$paciente->set('cpf',$_POST['etcpf']);
		$paciente->set('rg',$_POST['etrg']);
		$paciente->set('bairro',strtoupper($_POST['etbairro']));
		$paciente->set('cidade',strtoupper($_POST['etcidade']));
		$paciente->set('estado',strtoupper($_POST['etestado']));
		$paciente->set('civil',strtoupper($_POST['etcivil']));
		$paciente->set('profissao',strtoupper($_POST['etprofissao']));
		$paciente->set('email',strtoupper($_POST['etemail']));
		$paciente->set('indicacao',strtoupper($_POST['etindicacao']));
		$paciente->set('obs',strtoupper($_POST['etobs']));
		$paciente->set('datacadastro',$_POST['etdatacadastro']);

		if($paciente->cadastrarPaciente()){
			echo "<script>alert('Operação realizada com sucesso.');</script>";
			header("refresh:1;url=../view/novopaciente.php");
		}else{
			echo "<script>alert('Erro ao cadastrar!');</script>";
			header("refresh:1;url=../view/novopaciente.php");
		}

		ConexaoBD::desconecta();
	}

	public function listarDadosPaciente($nome,$cpf){
		ConexaoBD::conectar();

		$paciente = new Paciente();
		$paciente->set('nome',$nome);
		$paciente->set('cpf',$cpf);

		$dados = $paciente->buscarPaciente();

		if($dados != null){
			return $dados;
		}else{
			$msg = 'não tem dados';
			return $msg;
		}
		ConexaoBD::desconecta();
	}

	public function editarPaciente(){
		ConexaoBD::conectar();

		$paciente = new Paciente();
		$paciente->set('nome',strtoupper($_POST['etnome']));
		$paciente->set('fone',$_POST['etfone']);
		$paciente->set('idade',$_POST['etidade']);
		$paciente->set('datanasc',$_POST['etdatanasc']);
		$paciente->set('sexo',strtoupper($_POST['etsexo']));
		$paciente->set('endereco',strtoupper($_POST['etendereco']));
		$paciente->set('cpf',$_POST['etcpf']);
		$paciente->set('rg',$_POST['etrg']);
		$paciente->set('bairro',strtoupper($_POST['etbairro']));
		$paciente->set('cidade',strtoupper($_POST['etcidade']));
		$paciente->set('estado',strtoupper($_POST['etestado']));
		$paciente->set('civil',strtoupper($_POST['etcivil']));
		$paciente->set('profissao',strtoupper($_POST['etprofissao']));
		$paciente->set('email',strtoupper($_POST['etemail']));
		$paciente->set('indicacao',strtoupper($_POST['etindicacao']));
		$paciente->set('obs',strtoupper($_POST['etobs']));

		if ($paciente->editarPaciente()) {
			echo "<script>alert('Operação realizada com sucesso.');</script>";
			header("refresh:1;url=../view/menupaciente.php");
		}else{
			echo "<script>alert('Erro ao cadastrar!');</script>";
			header("refresh:1;url=../view/menupaciente.php");
		}

		ConexaoBD::desconecta();

	}
}

$controller = new PacienteController();

?>