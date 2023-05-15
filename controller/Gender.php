<?php

require_once '../model/Gender.php';

if(isset($_POST['operacion'])){
  $gender = new Gender();

  if($_POST['operacion'] == 'listarGender'){
    $datosObtenidos = $gender->listarGender();
    if($datosObtenidos) {
      echo json_encode($datosObtenidos);
    }
  }
}
