<?php
header('Content-Type: text/html; charset=utf-8');

class Atendimento{
  private $id;
  private $paciente;
  private $dentista;
  private $dente;
  private $procedimento;
  private $valor;
  private $custo;
  private $situacao;
  private $dt;
  
  public function set($prop,$valor){
		$this->$prop = $valor;
	}

	public function get($prop){
		return $this->$prop;
	}

  public function cadastrar(){
    $sql = "INSERT INTO atendimento (paciente,dentista,dente,procedimento,valor,custo,situacao,dt) VALUES ('{$this->paciente}','{$this->dentista}','{$this->dente}','{$this->procedimento}','{$this->valor}','{$this->custo}','{$this->situacao}','{$this->dt}')";
    
    if(ConexaoBD::executar($sql) !== null){
      return true;
    }else{
      return false;
    }
  }

  public function editar(){
    $sql = "UPDATE atendimento SET 
    situacao = '{$this->situacao}',
    dt = '{$this->dt}' 
    WHERE id = '{$this->id}'";

    if(ConexaoBD::executar($sql) !== null){
      return true;
    }else{
      return false;
    }
  }

  public function excluir(){
    $sql = "DELETE FROM atendimento WHERE id = '{$this->id}'";

    if(ConexaoBD::executar($sql) !== null){
      return true;
    }else{
      return false;
    }
  }

  public function listar(){
    $sql = "SELECT * FROM atendimento where paciente = '{$this->paciente}' and dente = '{$this->dente}' order by situacao";

    $res = ConexaoBD::executar($sql);
    $lista = null;
    while($objeto = mysqli_fetch_object($res)){
      if($objeto != null){
        $lista[] = $objeto;
      }
    }
    return $lista;
  }

  public function denteComProcedimento(){
    $sql = "SELECT DISTINCT dente FROM atendimento WHERE paciente = '{$this->paciente}' ORDER BY dente";

    $res = ConexaoBD::executar($sql);
    $lista = null;
    while($objeto = mysqli_fetch_object($res)){
      if($objeto != null){
        $lista[] = $objeto;
      }
    }
    return $lista;

  }
}
