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
}
