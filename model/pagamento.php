<?php
header('Content-Type: text/html; charset=utf-8');

class Pagamento
{
  private $cpf;
  private $valor;
  private $data;
  private $datalanc;
  private $tipo;
  private $usuariocad;

  private $datainicio;
  private $datafim;

  public function set($prop, $valor)
  {
    $this->$prop = $valor;
  }

  public function get($prop)
  {
    return $this->$prop;
  }

  public function cadastrar()
  {
    $sql = "insert into pagamento (cpf,valor,datalanc,data,tipo,usuario) values ('{$this->cpf}','{$this->valor}','{$this->datalanc}','{$this->data}','{$this->tipo}','{$this->usuariocad}')";
    if (ConexaoBD::executar($sql) === true) {
      return true;
    } else {
      return false;
    }
  }

  public function saldo()
  {
    // $sql = "SELECT cpf, SUM(valor) as saldo FROM pagamento WHERE cpf like '{$this->cpf}' GROUP BY cpf";

    $sql = "SELECT (SELECT SUM(pagamento.valor) FROM pagamento WHERE pagamento.cpf = '{$this->cpf}') -IFNULL((SELECT SUM(atendimento.valor) FROM atendimento WHERE atendimento.paciente = '{$this->cpf}' AND atendimento.situacao <> 'PENDENTE'),0) as saldo";

    $res = ConexaoBD::executar($sql);
    $lista = null;
    while ($objeto = mysqli_fetch_object($res)) {
      if ($objeto != null) {
        $lista[] = $objeto;
      } else {
        $lista = "Sem dados";
      }
    }
    return $lista;
  }

  public function recibo()
  {
    $sql = "SELECT * FROM pagamento WHERE cpf = '{$this->cpf}' order by id desc";

    $res = ConexaoBD::executar($sql);
    $lista = null;
    while ($objeto = mysqli_fetch_object($res)) {
      if ($objeto != null) {
        $lista[] = $objeto;
      } else {
        $lista = null;
      }
    }
    return $lista;
  }

  public function reciboInd()
  {
    $sql = "SELECT pagamento.*, paciente.nome FROM pagamento INNER JOIN paciente WHERE pagamento.cpf = paciente.cpf and pagamento.id = '{$this->id}'";

    $res = ConexaoBD::executar($sql);
    $lista = null;
    while ($objeto = mysqli_fetch_object($res)) {
      if ($objeto != null) {
        $lista[] = $objeto;
      } else {
        $lista = null;
      }
    }
    return $lista;
  }

  public function relatorioPagamento()
  {
    $sql = "SELECT pagamento.*, paciente.nome FROM pagamento INNER JOIN paciente on pagamento.cpf = paciente.cpf WHERE datalanc BETWEEN '{$this->datainicio}' and '{$this->datafim}' order by datalanc";

    $res = ConexaoBD::executar($sql);
    $lista = null;
    while ($objeto = mysqli_fetch_object($res)) {
      if ($objeto != null) {
        $lista[] = $objeto;
      } else {
        $lista = null;
      }
    }
    return $lista;
  }
}
