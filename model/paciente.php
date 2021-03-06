<?php 
header('Content-Type: text/html; charset=utf-8');


class Paciente{
	private $nome;
	private $fone;
	private $idade;
	private $datanasc;
	private $sexo;
	private $endereco;
	private $cpf;
	private $rg;
	private $bairro;
	private $cidade;
	private $estado;
	private $civil;
	private $profissao;
	private $email;
	private $indicacao;
	private $obs;
	private $datacadastro;
	private $usuariocad;
	private $usuarioedit;


	public function set($prop,$valor){
		$this->$prop = $valor;
	}

	public function get($prop){
		return $this->$prop;
	}

	public function cadastrarPaciente(){
		
		$sql = "insert into paciente (nome,fone,idade,datanasc,sexo,endereco,cpf,rg,bairro,cidade,estado,civil,profissao,email,indicacao,obs,datacadastro,usuariocad,usuarioedit) values ('{$this->nome}','{$this->fone}','{$this->idade}','{$this->datanasc}','{$this->sexo}','{$this->endereco}','{$this->cpf}','{$this->rg}','{$this->bairro}','{$this->cidade}','{$this->estado}','{$this->civil}','{$this->profissao}','{$this->email}','{$this->indicacao}','{$this->obs}','{$this->datacadastro}','{$this->usuariocad}','{$this->usuarioedit}')";			
		if (ConexaoBD::executar($sql) !== null) {
			return true;
		}else{
			return false;
		}
	}

	public function editarPaciente(){
		$sql = "UPDATE paciente SET 
		nome = '{$this->nome}',
		fone = '{$this->fone}', 
		idade = '{$this->idade}', 
		datanasc = '{$this->datanasc}', 
		sexo = '{$this->sexo}', 
		endereco = '{$this->endereco}', 
		cpf = '{$this->cpf}',
		rg = '{$this->rg}',
		bairro = '{$this->bairro}',
		cidade = '{$this->cidade}',
		estado = '{$this->estado}',
		civil = '{$this->civil}',
		profissao = '{$this->profissao}',
		email = '{$this->email}',
		indicacao = '{$this->indicacao}',
		obs = '{$this->obs}',
		usuarioedit = '{$this->usuarioedit}'
		WHERE cpf = '{$this->cpf}'";
		if (ConexaoBD::executar($sql) !== null) {
			return true;
		}else{
			return false;
		}
	}

	public function listarAniversariante(){
		$sql = "SELECT paciente.nome, paciente.datanasc, month(paciente.datanasc) as mes FROM paciente WHERE month(paciente.datanasc) = month(CURRENT_DATE()) order by Day(paciente.datanasc) ASC";
		
		$res = ConexaoBD::executar($sql);
			$lista = null;
			while ($objeto = mysqli_fetch_object($res)){
				if($objeto != null){
					$lista[] = $objeto;
				}
			}

			return $lista;
	} 

	public function buscarPaciente(){
		if ($this->nome == null && $this->cpf == null) {
			$sql = "SELECT * FROM paciente order by nome";
		}
		if($this->nome != null){
			$sql = "SELECT * FROM paciente WHERE nome like '{$this->nome}%' order by nome";
		}

		if($this->cpf != null){
			$sql = "SELECT * FROM paciente WHERE cpf like '{$this->cpf}%' order by nome";
		}

		$res = ConexaoBD::executar($sql);
			$lista = null;
			while ($objeto = mysqli_fetch_object($res)) {
				if($objeto != null){
					$lista[] = $objeto;
				}
			}
			return $lista;
	}
}

?>