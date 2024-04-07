<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Energy Hub</title>
  <link rel="stylesheet" type="text/css" href="css/estil_base.css">
  <link rel="stylesheet" type="text/css" href="css/capçalera.css">
  <link rel="stylesheet" type="text/css" href="../css/menu_carro.css">
  <script type="text/javascript" src="js/functions.js"></script>
</head>


<body>

<div id="background"></div>

<?php include_once __DIR__ .'/../_view/capçalera.php'; ?>


<section class="items_del_carro">
<?php if(!$sessio_iniciada){ ?>
  <p>Sessió no iniciada</p>
  <p>Inicieu sessió per accedir al carro</p>
  <br> <a href="index.php?ACCTION=Go_to_login">Login</a>

<?php } else if($carro_buit){ ?>
  <h1>El carro està buit</h1>

<?php } else /*EL CARRO SI CONTÉ PRODUCTES*/ { ?>
  <h1>Productes: </h1>
  <div id="flex_items_del_carro">
    <?php include_once __DIR__.'/../_view/grid_producte_del_carro.php'; ?>
  </div>
  <hr>
  <div id="Resum_carro">
    <div id="Destinatari"><b>Destinatari:</b> <?php echo $_SESSION["nom_client"];?></div>
    <div id="Direcció"><b>Direcció d'entrega:</b> <?php echo $_SESSION["address"].", ".$_SESSION["city"];?></div>
    <div id="IVA">L'IVA està calculat i inclós en el preu d'aquesta i de totes les compres</div>
    <div id="Subtotal_carro_text">Subtotal:</div>
    <div id="Subtotal_carro_preu"> 
      <?php echo $preu_total_carro; ?> €</div>
  </div>
  <hr>
  <div id="botons_carro">

    <div id="Boto_buida_carro" onclick=borrar_items_carro()>Buida carro</div>
    <div id="Boto_check_out" ><a href="index.php?ACCTION=go_to_menu_pagament&pagament_de_carro=S"><div>Prosseguir a pagar</div></a></div>
  </div>

<?php } ?>
</section>



</body>
</html>
