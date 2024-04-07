<div id="background"></div>

<?php include_once __DIR__ .'/../_view/capçalera.php'; ?>

<section class="seccio_detall_producte">
    <div class=taula_producte>
        <div id="Imatge"> <img src= <?php print_r($producte["imatge"]); ?> alt=""> </div>
        <div id="NomP"> <h1><?php print_r($producte["nom_producte"]); ?> </h1></div>
        <div id="Preu"> <h2><?php print_r($producte["preu"]); ?>€ </h2> </div>
        <div id="Descr"> <p><?php print_r($producte["descripció"]); ?> <p></div>
        
        <div id="Opcions_compra">
            <div id="Preu_total"> Total:<?php print_r($producte["preu"]); ?>€ </div>
            <div id="Unitats"> 
                <div id="text_unitats">Unitats:</div>
                <div class="unitat_mes_menys" onclick=<?php echo "\"afegirUnitats(-1,".$producte["unitats_disponibles"].")\"";?>>-</div>
                <div id="selector_unitats"><input id="selector_unitats_input" name="selector_unitats_input" type="text" value="1" onfocusout=<?php echo "\"unitatsInRange(".$producte["unitats_disponibles"].")\"";?>></div>
                <div id="unitats_totals">/<?php print_r($producte["unitats_disponibles"]); ?> </div>
                <div class="unitat_mes_menys" onclick=<?php echo "\"afegirUnitats(1,".$producte["unitats_disponibles"].")\"";?>>+</div>
            </div>
            <div id="Direccio"> POBLACIÓ: <?php if(isset($_SESSION["mail"])){ echo $_SESSION["city"].", ".$_SESSION["address"]; }?>  </div>
            

            <div id="Compra_producte"><a href=<?php echo "\"index.php?ACCTION=go_to_menu_pagament&pagament_de_carro=N&id_producte=".$producte["id_producte"]."&quantitat=1\""?>>Comprar<a></div>
            <div id="Add_to_Cart" onclick=addToCart(<?php echo "\"".$producte["product_ID"]."\""; ?>)>Afegir al carro</div>
        </div>
    </div>
</section>


