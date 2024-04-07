<?php

  session_start();  

  if(isset($_SESSION["mail"])){
    
    $is_carro = $_GET["is_carro"]; // ens dirà si estem comprant un producte o directament el carro
    $id_usuari = $_SESSION["mail"];

    if ($is_carro == "S")
    {
      // buscar tots els items del carro de l'usuari
      $id_usuari = $id_usuari;
      include_once __DIR__ ."/../_model/get_items_carro_usuari.php";
      
      // iterar per cada item de l'usuari i..:
      foreach ($items_carro as $item)
      {
        // generem una clau primaria per la compra
        $id_compra = uniqid(rand(), true);

        // guardar id producte, nombre d'unitats i preu
        $val_array = array($id_compra, $id_usuari, $item["id_producte"], $item["nombre_unitats"], $item["preu"]);

        // incloure una nova entrada a la taula amb tot el que sabem
        include __DIR__ ."/../_model/afegir_compra.php";
        
      }
      // actualitzem la sessió
      $_SESSION["preu_carro"] = 0;
      $_SESSION["items_carro"] = 0;
      // buidar carro
      include __DIR__ ."/../_model/borrar_items_carro.php";
       
    }else{
      // NO es te perque fe,r pero aquí podriem fer que es puguessin comprar productes de forma individual.
    }
    
  }

?>