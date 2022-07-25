<?php

header('Content-Type: text/html; charset=utf-8');

class Saida
{
  private $tipo;
  private $descricao;
  private $valor;
  private $usuario;
  private $datalanc;
  private $datacompetencia;

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
    $sql = "insert into saidas (tipo,descricao,valor,usuario,datalanc,datacompetencia) values ('{$this->tipo}','{$this->descricao}','{$this->valor}','{$this->usuario}','{$this->datalanc}','{$this->datacompetencia}')";

    if (ConexaoBD::executar($sql) === true) {
      return true;
    } else {
      return false;
    }
  }

  public function listar()
  {
    $sql = "SELECT * FROM saidas WHERE datacompetencia BETWEEN '{$this->datainicio}' and '{$this->datafim}' ORDER BY datacompetencia ASC";

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

  public function listarTipoSaida()
  {
    $sql = "SELECT * FROM tipo_saida ORDER BY nome ASC";

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
