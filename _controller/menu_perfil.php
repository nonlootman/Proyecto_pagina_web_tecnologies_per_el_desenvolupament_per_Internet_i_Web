<?php
  if (session_status() === PHP_SESSION_NONE) {
    session_start();
  }
    
  // buscar totes les compres

  if(isset($_SESSION["mail"])){
    $id_usuari = $_SESSION["mail"];
    include_once __DIR__.'/../_model/get_compres_usuari.php';

    include_once __DIR__.'/../_model/get_productes.php';
  }

  include_once __DIR__ .'/../_view/menu_perfil.php';
?>