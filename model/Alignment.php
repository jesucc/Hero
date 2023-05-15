<?php

require_once 'Conexion.php';

class Alignment extends Conexion{
  private $Conexion;

  public function __CONSTRUCT(){
    $this->conexion = parent::getConexion();
  }

  public function listarAlignment() {
    try{
      $consulta = $this->conexion->prepare("SELECT * FROM alignment");
      $consulta->execute();
      return $consulta->fetchAll(PDO::FETCH_ASSOC);
    }
    catch(Exception $e){
          die($e->getMessage());
    }
  }
}