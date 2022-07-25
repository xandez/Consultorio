<?php 
	require_once '../model/Conexao.php';
	require_once '../model/paciente.php';

class PacienteController{

	public function __construct(){
			call_user_func(array($this, $_REQUEST["evento"]));
	}

	public function cadastrar(){

		ConexaoBD::conectar();

		$paciente = new Paciente();
		$paciente->set('nome',mb_strtoupper($_POST['etnome']),'UTF-8');
		$paciente->set('fone',$_POST['etfone']);
		$paciente->set('idade',$_POST['etidade']);
		$paciente->set('datanasc',$_POST['etdatanasc']);
		$paciente->set('sexo',mb_strtoupper($_POST['etsexo']),'UTF-8');
		$paciente->set('endereco',mb_strtoupper($_POST['etendereco']),'UTF-8');
		$paciente->set('cpf',$_POST['etcpf']);
		$paciente->set('rg',$_POST['etrg']);
		$paciente->set('bairro',mb_strtoupper($_POST['etbairro']),'UTF-8');
		$paciente->set('cidade',mb_strtoupper($_POST['etcidade']),'UTF-8');
		$paciente->set('estado',mb_strtoupper($_POST['etestado']),'UTF-8');
		$paciente->set('civil',mb_strtoupper($_POST['etcivil']),'UTF-8');
		$paciente->set('profissao',mb_strtoupper($_POST['etprofissao']),'UTF-8');
		$paciente->set('email',mb_strtoupper($_POST['etemail']),'UTF-8');
		$paciente->set('indicacao',mb_strtoupper($_POST['etindicacao']),'UTF-8');
		$paciente->set('obs',mb_strtoupper($_POST['etobs']),'UTF-8');
		$paciente->set('datacadastro',$_POST['etdatacadastro']);
		$paciente->set('usuariocad',mb_strtoupper($_POST['etusuariocad']),'UTF-8');
		
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
		$paciente->set('nome',mb_strtoupper($nome),'UTF-8');
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

	public function listarAniversario(){
		ConexaoBD::conectar();

		$paciente = new Paciente();
		
		$dados = $paciente->listarAniversariante();

		if($dados != null){
			return $dados;
		}else{
			$msg = 'não tem dados';
			return $msg;
		}
		ConexaoBD::desconecta();
	}

	public function validarCpf(){
		ConexaoBD::conectar();

		$paciente = new Paciente();
		$paciente->set('cpf',$_POST['cpfinfo']);

		$dados = $paciente->buscarPaciente();
		if($dados != null){
			echo "Tem";
		}else{
			echo "Livre";
		}
		ConexaoBD::desconecta();
	}

	public function editarPaciente(){
		ConexaoBD::conectar();

		$paciente = new Paciente();
		$paciente->set('nome',mb_strtoupper($_POST['etnome']),'UTF-8');
		$paciente->set('fone',$_POST['etfone']);
		$paciente->set('idade',$_POST['etidade']);
		$paciente->set('datanasc',$_POST['etdatanasc']);
		$paciente->set('sexo',mb_strtoupper($_POST['etsexo']),'UTF-8');
		$paciente->set('endereco',mb_strtoupper($_POST['etendereco']),'UTF-8');
		$paciente->set('cpf',$_POST['etcpf']);
		$paciente->set('rg',$_POST['etrg']);
		$paciente->set('bairro',mb_strtoupper($_POST['etbairro']),'UTF-8');
		$paciente->set('cidade',mb_strtoupper($_POST['etcidade']),'UTF-8');
		$paciente->set('estado',mb_strtoupper($_POST['etestado']),'UTF-8');
		$paciente->set('civil',mb_strtoupper($_POST['etcivil']),'UTF-8');
		$paciente->set('profissao',mb_strtoupper($_POST['etprofissao']),'UTF-8');
		$paciente->set('email',mb_strtoupper($_POST['etemail']),'UTF-8');
		$paciente->set('indicacao',mb_strtoupper($_POST['etindicacao']),'UTF-8');
		$paciente->set('obs',mb_strtoupper($_POST['etobs']),'UTF-8');
		$paciente->set('usuarioedit',mb_strtoupper($_POST['etusuarioedit']),'UTF-8');

		if ($paciente->editarPaciente()) {
			echo "<script>alert('Operação realizada com sucesso.');</script>";
			header("refresh:1;url=../view/buscarpaciente.php");
		}else{
			echo "<script>alert('Erro ao cadastrar!');</script>";
			header("refresh:1;url=../view/buscarpaciente.php");
		}

		ConexaoBD::desconecta();

	}
}

$controller = new PacienteController();

?>