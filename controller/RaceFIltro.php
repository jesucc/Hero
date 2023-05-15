<?php

require_once '../model/RaceFiltro.php';

if(isset($_POST['operacion'])){
                                    
  $racefiltro = new Racefiltro();


  if($_POST['operacion'] == 'listarRace'){

    $datos = $racefiltro->listarRace($_POST['race_id']);
    if($datos){
      echo json_encode($datos);
    }
  }

  
}
