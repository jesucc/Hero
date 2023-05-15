<?php
  require_once '../model/Publisher.php';

  if(isset($_POST['operacion'])){
     
    $publisher = new Publisher();

    if ($_POST['operacion'] == 'listarpublisher'){

      $datosObtenidos = $publisher->listarpublisher();
      if ($datosObtenidos){
        echo json_encode($datosObtenidos);
      }
    }

  }
?>