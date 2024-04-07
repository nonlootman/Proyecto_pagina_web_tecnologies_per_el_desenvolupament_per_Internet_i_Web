<?php

if(session_status() == 1) session_start();

// mirar si la sessió està iniciada
$sessio_iniciada = isset($_SESSION["mail"]);

if($sessio_iniciada){
  $id_usuari = $_SESSION["mail"];
  $pagament_de_carro = $_GET["pagament_de_carro"];
    
  if($pagament_de_carro == "S") { 
    // recollir dades dels items de la BD
    include_once __DIR__ .'/../_model/get_items_carro_usuari.php';
    
    // cerem i omplim alguns arrays i variables que ens seràn utils més tard
    $productes_carro = []; 
    $preu_total_carro = 0;
    foreach ($items_carro as $item){
      // agafem les dades del producte
      $id_producte = $item["id_producte"];
      include __DIR__ .'/../_model/get_producte.php';
      array_push($productes_carro,$producte);  

      // suma el preu al total
      $preu_total_carro += (float)$item["preu"]; 
    
    }

  } else {
    // no cal fer pero aquí podem implementar la compra individual
  }
  
  
  // carrego la view del pagament
  include_once __DIR__ .'/../_view/menu_pagament.php';

} else {
  // carrego una view que em mostrarà un link a login
  include_once __DIR__ .'/../_view/anar_a_iniciar_sessio.php';
}




?>