<?php 
header('Content-Type: text/html; charset=utf-8');

class Funcionario{
	private $nome;
	private $cpf;
	private $funcao;
	private $admissao;
	private $status;
	private $rg;
	private $demissao;
	private $salario;

	public function set($prop,$valor){
		$this->$prop = $valor;
	}

	public function get($prop){
		return $this->$prop;
	}

	public function cadastrarFuncionario(){

		$sql = "insert into funcionario (nome,cpf,funcao,admissao,status,rg,demissao,salario) values ('{$this->nome}','{$this->cpf}','{$this->funcao}','{$this->admissao}','{$this->status}','{$this->rg}','{$this->demissao}','{$this->salario}')";
		if (ConexaoBD::executar($sql) !== null) {
			return true;
		}else{
			return false;
		}
	}

	public function buscarFuncionario(){
		if ($this->cpf != null) {
			$sql = "SELECT * FROM funcionario WHERE cpf like '{$this->cpf}%'";
			
			$res = ConexaoBD::executar($sql);
			$lista = null;
			while ($objeto = mysqli_fetch_object($res)){
				if ($objeto != null) {
					$lista[] = $objeto;
				}			
			}
			return $lista;
		}
		if ($this->nome != null) {
			$sql = "SELECT * FROM funcionario WHERE nome like '{$this->nome}%'";

			$res = ConexaoBD::executar($sql);
			$lista = null;
			while ($objeto = mysqli_fetch_object($res)){
				if ($objeto != null) {
					$lista[] = $objeto;
				}
			}
			return $lista;
		}
		if($this->funcao != null){
			$sql = "SELECT * FROM funcionario WHERE funcao = '{$this->funcao}' order by nome";
			$res = ConexaoBD::executar($sql);
			$lista = null;
			while ($objeto = mysqli_fetch_object($res)) {
				if ($objeto != null) {
					$lista[] = $objeto;
				}
			}
			return $lista;
		}
	}

		public function editarFuncionario(){
			$sql = "UPDATE funcionario SET 
			nome = '{$this->nome}',
			cpf = '{$this->cpf}',
			funcao = '{$this->funcao}',
			admissao = '{$this->admissao}',
			status = '{$this->status}',
			rg = '{$this->rg}',
			demissao = '{$this->demissao}',
			salario = '{$this->salario}'
			WHERE cpf = '{$this->cpf}'";

			if (ConexaoBD::executar($sql) != null) {
				return true;
			}else{
				return false;
			}
		}

}

?>