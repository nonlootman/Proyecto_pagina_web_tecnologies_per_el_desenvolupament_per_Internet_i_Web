<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Energy Hub</title>
  <link rel="stylesheet" type="text/css" href="../css/estil_base.css" >
  <link rel="stylesheet" type="text/css" href="css/capçalera.css" >
  <link rel="stylesheet" type="text/css" href="../css/menu_perfil.css" >
  <script type="text/javascript" src="js/functions.js"></script>
</head>


<body>

  <div id="background"></div>

  <?php include_once __DIR__ .'/../_view/capçalera.php'; ?>

  <section class="standard_section">

    <?php if(isset($_SESSION["mail"])){ ?>
      <h2>Hola,</h2>
      <h1><?php echo $_SESSION["nom_client"]; ?></h1>

      <!-- MOSTRAR DADES PERSONALS -->
      <div id="dades_personals_flex">
        <div id="imatge_perfil"><img src=<?php echo "img/imatges_perfil/".$_SESSION["nom_fitxer_imatge"]; ?> alt=<?php echo $_SESSION["nom_fitxer_imatge"]?>></div>
        <div id="dades_personals">
          <h3>DADES PERSONALS:</h3>
          <p>NOM: <?php echo $_SESSION["nom_client"]; ?> </p>
          <p>MAIL: <?php echo $_SESSION["mail"]; ?> </p>
          <p>POBLACIÓ: <?php echo $_SESSION["city"]; ?>, <?php echo $_SESSION["address"]; ?> </p>
          <p>CODI POSTAL: <?php echo $_SESSION["codi_postal"]; ?> </p>
          <p>DATA REGISTRE: <?php echo $_SESSION["data_creacio"]; ?> </p>
          <br>
          <h3 ><a class="link" href="index.php?ACCTION=Go_to_settings">→ Editar dades personals</a></h3>
        </div>
      </div>

      <div class="dividisor_de_seccio">
        <div id="button_log_out" onclick="destroySession()"> 
          <img src="/img/Imatges_icones/Icona_logout_red.png"> 
          <p>Log Out</p>
        </div>
      </div>

      <hr>

      <div id="compres_pasades">
        <h2>HISTORIAL DE COMPRES: </h2>
        <div id="compres_passades_grid">
          <div id="compres_passades_index">
            <div>Data</div>
            <div>Producte</div>
            <div>Unitats/preu unitat(€)</div>
            <div>Subtotal(€)</div>
          </div>
          <?php if(!empty($arra)) include_once __DIR__.'/../_view/grid_historial_compres.php';?>
        </div>
      </div>
    <?php } else { ?>
      
    <div class="dividisor_de_seccio">
      <div><a href="index.php?ACCTION=Go_to_login">Login</a> </div>
      <div><a href="index.php?ACCTION=Go_to_registre">Register</a> </div>      
    </div>

    <?php }?>

  </section>  

</body>
</html>
