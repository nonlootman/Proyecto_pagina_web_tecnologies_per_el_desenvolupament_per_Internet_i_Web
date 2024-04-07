<?php

  // Mirem quina categoria hem seleccionat
  if(empty($_GET['categoria']))
    $CATEGORIA = "*";
  else
    $CATEGORIA = $_GET['categoria'];
  
  
  // Seleccionem els productes que calguin
  if ( $_GET['categoria'] == "*")
    include_once __DIR__ .'/../_model/get_productes.php';
  else
    include_once __DIR__ .'/../_model/get_productes_filtrats_categoria.php';
  
  // Mostrem la taula de productes
  include_once __DIR__ .'/../_view/grid_productes.php'; 
    
?>