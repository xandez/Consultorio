<?php 
header('Content-Type: text/html; charset=utf-8');

class Agenda{
	private $id;
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
			$sql = "SELECT agenda.*, paciente.nome FROM agenda INNER JOIN paciente on agenda.paciente = paciente.cpf WHERE funcionario like '{$this->funcionario}%' and inicio BETWEEN '{$this->inicio}' and '{$this->fim}' and status <> 'EXCLUIDO'";

			$res = ConexaoBD::executar($sql);
			$lista = null;
			while ($objeto = mysqli_fetch_object($res)) {
				if ($objeto != null) {
					$lista[] = $objeto;
				}
			}
			return $lista;
		}
		if($this->id != null){
			$sql = "SELECT agenda.*, paciente.nome FROM agenda INNER JOIN paciente on agenda.paciente = paciente.cpf WHERE id like '{$this->id}'";

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

	public function editar(){
		$sql = "UPDATE agenda SET
		inicio = '{$this->inicio}',
		fim = '{$this->fim}',
		tipo = '{$this->tipo}',
		status = '{$this->status}'
		WHERE id = '{$this->id}'";

		if(ConexaoBD::executar($sql) !== null){
			return true;
		}else{
			return false;
		}
	}
}

?>