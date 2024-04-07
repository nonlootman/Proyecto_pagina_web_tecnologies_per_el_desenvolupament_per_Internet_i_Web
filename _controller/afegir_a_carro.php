<?php
  session_start();

  if(isset($_SESSION["mail"])){

    // recolllir dades
    $id_producte = $_GET['id_producte'] ?? null;
    $quantitat = $_GET['quantitat'] ?? null;
    $id_usuari = $_SESSION["mail"];

    // dades producte
    include_once __DIR__ .'/../_model/get_producte.php';

    // buscar producte a la cistella
    include_once __DIR__ .'/../_model/count_productes_carro_usuari.php';


    if((int)$producte_en_cistella > 0)
    {   
      // Get dades cistella 
      include_once __DIR__ .'/../_model/get_item_carro.php';

      // calcular dades extres
      $quantitat = (int)$quantitat + (int)$item_carro["nombre_unitats"];
      $preu_total = (float)$quantitat * (float)$producte["preu"];

      // modificar la quantitat
      include_once __DIR__ .'/../_model/modificar_quantitat_item_carro.php';

      // actualitzem la sessió
      $_SESSION["preu_carro"] += (int)$quantitat*(float)$producte["preu"];


    } else {
      // calcular dades extres
      $preu_total = (float)$quantitat * (float)$producte["preu"];
      $id_item = uniqid(rand(), true);
      $array_dades_input = array($id_item, $id_usuari, $id_producte, $quantitat, $preu_total);

      // afegir producte a la BD
      include_once __DIR__ .'/../_model/afegir_a_carro.php';

      // actualitzem la sessió
      $_SESSION["preu_carro"] += (int)$quantitat*(float)$producte["preu"];
      $_SESSION["items_carro"]++;
    }
    echo "Comanda afegida al carro correctament :)";

  }else{
    echo "Per a poder afegir productes a la cistella siusplau inicieu sessió";
  }

  
?>