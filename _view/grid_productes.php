<?php 
    foreach ($array_preu_nom_img as $producte) { 
?>

<div class="producte_en_grid" onclick= <?php echo "mostrarProducte(\"".$producte["product_ID"]."\")";?>>
    <a>
        <img src= <?php print_r($producte["imatge"]); ?> alt="">
        <h1> <?php print_r($producte["nom_producte"]); ?> </h1>
        <h2> <?php print_r($producte["preu"]."€"); ?></h2>
    </a>
</div>     
    
<?php 
    }
?>