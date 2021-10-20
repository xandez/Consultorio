<?php
header('Content-Type: text/html; charset=utf-8');

class Pagamento{
  private $cpf;
  private $valor;
  private $data;
  private $tipo;

  public function set($prop,$valor){
		$this->$prop = $valor;
	}

	public function get($prop){
		return $this->$prop;
	}

  public function cadastrar(){
    $sql = "insert into pagamento (cpf,valor,data,tipo) values ('{$this->cpf}','{$this->valor}','{$this->data}','{$this->tipo}')";
    if (ConexaoBD::executar($sql) === true) {
      return true;
    }else{
      return false;
    }
  }

}

?>