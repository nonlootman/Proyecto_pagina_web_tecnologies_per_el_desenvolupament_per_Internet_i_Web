<?php foreach($array_productes_filtrats as $producte) { ?>

<div onclick= <?php echo "mostrarProducte(\"".$producte["product_ID"]."\")";?>> <?php echo $producte["nom_producte"]; ?> </div>

<?php }?>

