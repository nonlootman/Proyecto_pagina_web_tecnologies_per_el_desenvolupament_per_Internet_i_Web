<?php 
  // Mirem les lletres del producte a seleccionar
  if(isset($_GET['LLETRES_PRODUCTE']))
  {
    $lletres_buscador = $_GET['LLETRES_PRODUCTE'];
    $lletres_buscador_minus = strtolower($lletres_buscador);
    $nombre_productes = 0; 
    $nombre_maxim_productes = 5;    
    

    
    if(!empty($lletres_buscador_minus)){
      $lletra = $lletres_buscador_minus[0];

      // --- busquem la primera lletra en Uppercase
      $lletres_producte = "%".strtoupper($lletra)."%";
      include __DIR__ .'/../_model/get_productes_filtrats_nom.php';
      $array_productes_filtrats = $array_productes;
      if(!empty($array_productes_filtrats))
        $nombre_productes = sizeof($array_productes_filtrats);
      else
        $nombre_productes = 0;
      
      // --- busquem la primera lletra en lowercase
      $lletres_producte = "%".$lletra."%";
      include __DIR__ .'/../_model/get_productes_filtrats_nom.php';
      
      // analitzem diferents casos depenent de les dades que ja coneixem
      if(empty($array_productes_filtrats)){
        $array_productes_filtrats = $array_productes;
        if(!empty($array_productes))
          $nombre_productes = sizeof($array_productes);
        else
          $nombre_productes = 0;

      } else if (!empty($array_productes) && strlen($lletres_buscador_minus) < 3){
        // mirem si els productes ja els hem seleccionat 
        foreach($array_productes as $producte){
          if (!in_array($producte, $array_productes_filtrats)){
            array_push($array_productes_filtrats, $producte);

            // augmentem nombre productes
            $nombre_productes ++;
          }
        }
      }

      
      // --- busquem si te totes les lletres en l'ordre i "case" escrit
      $lletres_producte = "%".$lletres_buscador."%";
      include __DIR__ .'/../_model/get_productes_filtrats_nom.php';
      
      // mirem si hi han productes del tipus demanat
      if(!empty($array_productes)){
        // mirem si els productes ja els hem seleccionat 
        foreach($array_productes as $producte){
          if (!in_array($producte, $array_productes_filtrats)){
            array_push($array_productes_filtrats, $producte);

            // augmentem nombre productes
            $nombre_productes ++;
          }
        }
      }
    }
    
    // mostrem la selecció de productes (màxim 5 productes)
    if(!empty($array_productes_filtrats)){
      $nombre_productes = sizeof($array_productes_filtrats);
      if($nombre_productes > $nombre_maxim_productes) 
        $nombre_productes = $nombre_maxim_productes;

      $array_productes_filtrats = array_slice($array_productes_filtrats, 0, $nombre_productes);
      include_once __DIR__.'/../_view/get_productes_filtrats_nom.php';
    }
  }

?>