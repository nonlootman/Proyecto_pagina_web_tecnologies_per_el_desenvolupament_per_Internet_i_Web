<?php foreach ($arr_compres as $compra) { 
  
  $id_producte = $compra["id_producte"];
  $preu_producte = "0";
  $nomProducte = "(".$id_producte.")";
  foreach ($arr_productes as $producte){
    if($id_producte == $producte["product_ID"]){
      $nomProducte = $nomProducte.$producte["nom_producte"];
      $preu_producte = $producte["preu"];
    }
  }  
?>
<div class="compra">
  <div><?php echo substr($compra["data_compra"], 0, 16);?></div>
  <div><?php echo $nomProducte ?></div>
  <div><?php echo $compra["nombre_unitats"]." / ".$preu_producte."€";?></div>
  <div><?php echo $compra["subtotal"]." €";?></div>
</div>

<?php } ?>