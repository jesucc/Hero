<?php

require_once 'Conexion.php';

class Race extends Conexion{
  private $Conexion;

  public function __CONSTRUCT(){
    $this->conexion = parent::getConexion();
  }

  public function listarRace() {
    try{
      $consulta = $this->conexion->prepare("SELECT * FROM race");
      $consulta->execute();
      return $consulta->fetchAll(PDO::FETCH_ASSOC);
    }
    catch(Exception $e){
      die($e->getMessage());
      }
  }
}