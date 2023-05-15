<?php

require_once 'Conexion.php';

class Gender extends Conexion{
  private $Conexion;

  public function __CONSTRUCT(){
    $this->conexion = parent::getConexion();
  }

  public function listarGender() {
    try{
      $consulta = $this->conexion->prepare("SELECT * FROM gender");
      $consulta->execute();
      return $consulta->fetchAll(PDO::FETCH_ASSOC);
    }
    catch(Exception $e){
          die($e->getMessage());
    }
  }
}