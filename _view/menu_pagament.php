<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Energy Hub</title>
  <link rel="stylesheet" type="text/css" href="css/estil_base.css" >
  <link rel="stylesheet" type="text/css" href="css/capçalera.css" >
  <link rel="stylesheet" type="text/css" href="css/menu_pagament.css" >
  <script type="text/javascript" src="js/functions.js"></script>
        
</head>


<body id="body">

  <div id="background"></div>

  <?php include_once __DIR__ .'/../_view/capçalera.php'; ?>

  <section id="section_dades_usuari">
    <h1>Dades de del Pagament: </h1>
    <div id="Destinatari"><b>Destinatari:</b> <?php echo $_SESSION["nom_client"];?></div>
    <div id="Direcció"><b>Direcció d'entrega:</b> <?php echo $_SESSION["address"].", ".$_SESSION["city"];?></div>
    <div id="Email"><b>Correu electronic al que s'enviarà la factura:</b> <?php echo $_SESSION["mail"];?></div>
  </section>

  <section id="section_productes">
    <hr>
    <h1>Productes: </h1>
    <div id="flex_productes">
      <?php foreach ($productes_carro as $producte) { 
          //busquem l'item en qüestió
          $item_actual;
          $id_producte = $producte["product_ID"];
          foreach ($items_carro as $item){
            if($id_producte == $item["id_producte"])
              $item_actual = $item;
          }
      ?>
      <div class="flex_producte">
        <div class="nom_producte"> <h2><?php print_r($producte["nom_producte"]); ?></h2></div>
        <div> <b>Unitats:</b> <?php print_r($item_actual["nombre_unitats"]); ?></div>
        <div> <b>Subtotal:</b> <?php print_r($item_actual["preu"]); ?>€ </div>
      </div>
        
        
      <?php } ?>
    </div>
  </section>

  <section id="section_total">
    <hr>
    <div id="total_flex">
      <div id="total_text">Toal compra: </div>
      <div id="total_preu"><?php echo $preu_total_carro; ?></div>
    </div>

  </section>

  <section id="section_pagament">
    <hr>
    <div id="botons_pagament">
      <div id="boto_cancelar_compra" ><a href="index.php?ACCTION=Go_to_cart"><div>Cancelar compra</div></a></div>
      <div id="boto_check_out" onclick=afegirCompraCarroBD() >Check out</div>
    </div>
  </section>

</body>
</html>