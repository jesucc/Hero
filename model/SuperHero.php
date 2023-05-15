<?php
  require_once 'Conexion.php';

  class SuperHero extends Conexion{
    private $Conexion;

    // constructor

    public function __CONSTRUCT(){
      $this->conexion = parent::getConexion();
    }

    public function listarSuperhero($publisher_id){
      try{
        $consulta = $this->conexion->prepare("CALL spu_superhero_list(?)");
        $consulta->execute(array($publisher_id));
        return $consulta->fetchAll(PDO::FETCH_ASSOC);
      }
      catch(Exception $e){
        die($e->getMessage);
      }
    }

    public function filtro($race_id, $gender_id, $alignment_id){
      try{
        $consulta = $this->conexion->prepare("CALL spu_filtro_list(?,?,?)");
        $consulta->execute(array($race_id, $gender_id,$alignment_id));
        return $consulta->fetchAll(PDO::FETCH_ASSOC);
      }
      catch(Exception $e){
        die($e->getMessage);
      }
    }




    /*
    public function listarRace($race_id){
      try{
        $consulta = $this->conexion->prepare("CALL spu_racefiltro_list(?)");
        $consulta->execute(array($race_id));
        return $consulta->fetchAll(PDO::FETCH_ASSOC);
      }
      catch(Exception $e){
        die($e->getMessage);
      }
    }

    public function listarGender($gender_id){
      try{
        $consulta = $this->conexion->prepare("CALL spu_genderfiltro_list(?)");
        $consulta->execute(array($gender_id));
        return $consulta->fetchAll(PDO::FETCH_ASSOC);
      }
      catch(Exception $e){
        die($e->getMessage);
      }
    }

    public function listarAlignment($alignment_id){
      try{
        $consulta = $this->conexion->prepare("CALL spu_alignmentfiltro_list(?)");
        $consulta->execute(array($alignment_id));
        return $consulta->fetchAll(PDO::FETCH_ASSOC);
      }
      catch(Exception $e){
        die($e->getMessage);
      }
    }
    */
    
  
}