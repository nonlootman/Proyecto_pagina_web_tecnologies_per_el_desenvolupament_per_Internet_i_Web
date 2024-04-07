<?php
  session_start();
  
  if(isset($_SESSION["mail"])){
    $id_usuari = $_SESSION["mail"] ?? NULL;
    include_once __DIR__. '/../_model/borrar_items_carro.php';
  }

?>