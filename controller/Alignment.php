<?php

require_once '../model/Alignment.php';

if(isset($_POST['operacion'])){
  $alignment = new Alignment();

  if($_POST['operacion'] == 'listarAlignment'){
    $datosObtenidos = $alignment->listarAlignment();
    if($datosObtenidos) {
      echo json_encode($datosObtenidos);
    }
  }
}
