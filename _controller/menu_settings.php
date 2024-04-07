<?php
  session_start();
  
  // mirar si la sessió està iniciada
  $sessio_iniciada = isset($_SESSION["mail"]);

  // misatges d'error
  $error_modificar_dades_personals="";
  $error_modificar_imatge="";
  $error_modificar_passwords="";
	
  include_once __DIR__ .'/../_view/menu_settings.php';
?>