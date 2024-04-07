<?php
  session_start();
  
  $id_producte = $_GET['PRODUCTE_ID'] ?? NULL;
  
  include_once __DIR__ .'/../_model/get_producte.php';
  include_once __DIR__ .'/../_view/menu_productes.php';
?>