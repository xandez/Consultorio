<?php 
header('Content-Type: text/html; charset=utf-8');

class Procedimento{
	private $id;
	private $nome;
	private $valor;
	private $valmin;
	private $valmax;
	private $especialidade;
	private $custo;

	public function set($prop,$valor){
		$this->$prop = $valor;
	}

	public function get($valor){	
		return $this->$valor;
	}

	public function cadastrarProcedimento(){
		$sql = "insert into procedimento (nome,valor,valormin,valormax,especialidade,custo) values ('{$this->nome}','{$this->valor}','{$this->valmin}','{$this->valmax}','{$this->especialidade}','{$this->custo}')";
		if (ConexaoBD::executar($sql) !== null) {
			return true;
		}else{
			return false;
		}
	}

	public function editarProcedimento(){
		$sql = "UPDATE procedimento SET id = '{$this->id}', nome = '{$this->nome}', valor = '{$this->valor}', valormin = '{$this->valmin}', valormax = '{$this->valmax}', especialidade = '{$this->especialidade}', custo = '{$this->custo}' WHERE id = '{$this->id}'";
		if(ConexaoBD::executar($sql) !== null){
			return true;
		}else{
			return false;
		}
	}

	public function buscarProcedimento(){
		if ($this->nome == null && $this->id == null){
			$sql = "select * from procedimento order by nome asc";
		}
		if ($this->nome != null) {
			$sql = "select * from procedimento where nome like '{$this->nome}%'";
		}
		if ($this->id != null) {
			$sql = "select * from procedimento where id like '{$this->id}'";
		}
		
		$res = ConexaoBD::executar($sql);
		$lista = null;
		while($objeto = mysqli_fetch_object($res)){
			if ($objeto != null) {
				$lista[] = $objeto;
			}
		}
		return $lista;
	}
}



?>