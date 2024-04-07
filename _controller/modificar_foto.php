<?php
  session_start();
  
  // mirar si la sessió està iniciada
  $sessio_iniciada = isset($_SESSION["mail"]);

  // iniciem tots els missatges d'error a 0
  $error_modificar_dades_personals="";
  $error_modificar_imatge="";
  $error_modificar_passwords="";
  
  // mirem que s'hagi emplenat el camp
  $is_set = isset($_FILES['profile_image']);
  if ($is_set && !empty($_FILES['profile_image']['name'])) {



    // Creem la adreça a on volem guardar la imatge
    $nom_imatge=str_replace(' ', '', $_SESSION["mail"]).'.png';
    $targetFilePath = '/home/TDIW/tdiw-g7/public_html/img/imatges_perfil/'.basename($nom_imatge);  

    // guardem la imatge
    move_uploaded_file( $_FILES['profile_image']['tmp_name'], $targetFilePath );
  
    // modifiquem el nom del fitxer de la imatge a la BD
    include_once __DIR__ .'/../_model/modificar_foto.php';

    // modifiquem les dades de la sessió per a poder veure la imatge sense necessitat de tonar a fer login
    $_SESSION["nom_fitxer_imatge"]=$nom_imatge;
      
    // carreguem el menu de perfil 
    include_once __DIR__ .'/../_view/menu_perfil.php';

    
  }else
  {
    $error_modificar_imatge = "Sius plau, introduïu una imatge";

    // carreguem el menu de settings un altre cop 
    include_once __DIR__ .'/../_view/menu_settings.php';
  }
  

?>