<?php
  require_once 'Conexion.php';

  class Publisher extends Conexion{
    private $Conexion;

    // constructor

    public function __CONSTRUCT(){
      $this->conexion = parent::getConexion();
    }

    public function listarPublisher(){
      try{
        $consulta = $this->conexion->prepare("SELECT * FROM publisher");
        $consulta->execute();
        return $consulta->fetchAll(PDO::FETCH_ASSOC);
      }
      catch(Exception $e){
        die($e->getMessage());
      }
    }

  }
