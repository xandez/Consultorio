<?php 
header('Content-Type: text/html; charset=utf-8');

class Funcionario{
	private $nome;
	private $cpf;
	private $funcao;

	public function set($prop,$valor){
		$this->$prop = $valor;
	}

	public function get($prop){
		return $this->$prop;
	}

	public function cadastrarFuncionario(){

		$sql = "insert into funcionario (nome,cpf,funcao) values ('{$this->nome}','{$this->cpf}','{$this->funcao}')";
		if (ConexaoBD::executar($sql) !== null) {
			return true;
		}else{
			return false;
		}
	}

	public function buscarFuncionario(){
		if ($this->nome != null) {
			$sql = "SELECT * FROM funcionario WHERE nome like'{$this->nome}'";

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
			$sql = "SELECT * FROM funcionario WHERE funcao = '{$this->funcao}'";
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

}

?>