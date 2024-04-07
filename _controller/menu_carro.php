<?php
  session_start();

  // mirar si la sessió està iniciada
  $sessio_iniciada = isset($_SESSION["mail"]);

  if($sessio_iniciada){
    $id_usuari = $_SESSION["mail"];
    
    // mirar el numero de productes en el cabás de l'usuari
    include_once __DIR__ .'/../_model/count_items_en_carro_usuari.php';

    
    // veure si el carro està buit
    $carro_buit = true;
    if($total_productes_carro > 0){
      $carro_buit = false;
      
      // recollir dades dels items de la BD
      include_once __DIR__ .'/../_model/get_items_carro_usuari.php';

      // dades dels productes del carro i preu total
      $productes_carro = [];
      $preu_total_carro  = 0;
      foreach ($items_carro as $item){
        // agafem les dades del producte
        $id_producte = $item["id_producte"];
        include __DIR__ .'/../_model/get_producte.php';
        array_push($productes_carro,$producte);      
        
        // suma el preu al total
        $preu_total_carro += (float)$item["preu"]; 
      }

      $_SESSION["preu_carro"] = $preu_total_carro;
      $_SESSION["items_carro"] = sizeof($items_carro);
      
    }    
  }
   

  // vista del carro
  include_once __DIR__ .'/../_view/menu_carro.php';
?>