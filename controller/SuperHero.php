<?php

require_once '../model/SuperHero.php';

if(isset($_POST['operacion'])){
                                    
  $superhero = new Superhero();

  if($_POST['operacion'] == 'listarSuperhero'){

    $datos = $superhero->listarSuperhero($_POST['publisher_id']);
    if($datos){
      echo json_encode($datos);
    }
  }

  if($_POST['operacion'] == 'filtro'){

    $datos = $superhero->filtro($_POST['race_id'],$_POST['gender_id'],$_POST['alignment_id']);
    if($datos){
      echo json_encode($datos);
    }
  }

  
  if($_POST['operacion'] == 'resumenBandos'){
    $datos = $superhero->getAlignmentResume();
    renderJSON($datos);
  }





  /* 
   if($_POST['operacion'] == 'listarRace'){

    $datos = $superhero->listarRace($_POST['race_id']);
    if($datos){
      echo json_encode($datos);
    }
  }

  if($_POST['operacion'] == 'listarGender'){

    $datos = $superhero->listarGender($_POST['gender_id']);
    if($datos){
      echo json_encode($datos);
    }
  }

  if($_POST['operacion'] == 'listarAlignment'){

    $datos = $superhero->listarAlignment($_POST['alignment_id']);
    if($datos){
      echo json_encode($datos);
    }
  }
  */
 
}
