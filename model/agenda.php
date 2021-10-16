<?php 
header('Content-Type: text/html; charset=utf-8');

class Agenda{
	private $funcionario;
	private $inicio;
	private $fim;
	private $tipo;
	private $paciente;
	private $protocolo;
	private $status;


	public function set($prop,$valor){
		$this->$prop = $valor;
	}

	public function get($prop){
		return $this->$prop;
	}

	public function cadastrarAgenda(){
		
		$sql = "insert into agenda (funcionario,inicio,fim,tipo,paciente,protocolo,status) values ('{$this->funcionario}','{$this->inicio}','{$this->fim}','{$this->tipo}','{$this->paciente}','{$this->protocolo}','{$this->status}')";			
		if (ConexaoBD::executar($sql) !== null) {
			return true;
		}else{
			return false;
		}
	}

	public function buscarAgenda(){
		if($this->funcionario != null){
			$sql = "SELECT * FROM agenda WHERE funcionario like '{$this->funcionario}%' and inicio BETWEEN '{$this->inicio}' and '{$this->fim}'";

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