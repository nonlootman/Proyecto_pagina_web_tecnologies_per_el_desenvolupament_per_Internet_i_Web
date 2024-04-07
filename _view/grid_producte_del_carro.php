<?php foreach ($productes_carro as $producte) { ?>

  <?php 
    //busquem l'item en qüestió
    $item_actual;
    $id_producte = $producte["product_ID"];
    foreach ($items_carro as $item){
      if($id_producte == $item["id_producte"])
        $item_actual = $item;
    }


  ?>

  <div class="item_carro">  
    <div class="item_imatge"><img src=<?php print_r($producte["imatge"]); ?>></div>
    <div class="item_nom"> <h1><?php print_r($producte["nom_producte"]); ?></h1></div>
    <div class="item_descripcio"><?php print_r($producte["descripció"]); ?> </div>
    <div class="item_preu_total"> Subtotal:  <h2 id=<?php echo "\"".$producte["product_ID"]."\""; ?>><?php print_r($item_actual["preu"]); ?>€ </h2></div>
    <div class="item_quantitat">
      <div id="text_unitats">Unitats:</div>
      <div class="unitat_mes_menys" onclick=afegirUnitatsDesDeCarro(<?php echo "-1,".$producte["unitats_disponibles"].",\"".$producte["product_ID"]."\"";?>)>-</div>
      <div class="selector_unitats"><input id=<?php echo "selector_".$producte["product_ID"]; ?> name="selector_unitats_input" type="text" value=<?php print_r($item_actual["nombre_unitats"]); ?> onfocusout=afegirUnitatsDesDeCarro(<?php echo "0,".$producte["unitats_disponibles"].",\"".$producte["product_ID"]."\"";?>)></div>
      <div id="unitats_totals">/<?php print_r($producte["unitats_disponibles"]); ?> </div>
      <div class="unitat_mes_menys" onclick=afegirUnitatsDesDeCarro(<?php echo "1,".$producte["unitats_disponibles"].",\"".$producte["product_ID"]."\"";?>)>+</div>
    </div>
    <div class="item_preu_unitat">Preu per unitat: <?php echo $producte["preu"]."€"; ?></div>
    <div class="item_borrar_item" onclick=borrar_item_carro(<?php echo "\"".$item_actual["id_item"]."\"";?>)><img src="/../img/Imatges_icones/Icona_trash_red.png"></div>
    
  </div>
<?php } ?>
