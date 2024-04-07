<?php
  session_start();
  
  if(isset($_SESSION["mail"])){
    // recolllir dades
    $id_producte = $_GET['id_producte'] ?? null;
    $quantitat = $_GET['quantitat'] ?? null;
    $id_usuari = $_SESSION["mail"];
  
    // dades producte
    include_once __DIR__ .'/../_model/get_producte.php';
  
    // calculem el preu total
    $preu_total = (float)$quantitat * (float)$producte["preu"];
  
    // modifiquem la quantitat
    include_once __DIR__ .'/../_model/modificar_quantitat_item_carro.php';
  
    // modifiquem la sesió
    $_SESSION["preu_carro"] = $preu_total;
  
    // mostrar preu per pantalla
    echo $preu_total;
  
  }
?>