<?php

require_once '../model/Race.php';

if(isset($_POST['operacion'])){
  $race = new Race();

  if($_POST['operacion'] == 'listarRace'){
    $datosObtenidos = $race->listarRace();
    if($datosObtenidos) {
      echo json_encode($datosObtenidos);
    }
  }
}
