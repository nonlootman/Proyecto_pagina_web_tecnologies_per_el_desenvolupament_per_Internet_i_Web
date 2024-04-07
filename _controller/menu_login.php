<?php
  session_start();
  $error_login = ""; // "Esborrem" aquesta variable perque no es mostri cap valor d'error al recarregar la pàgina
  include __DIR__ ."/../_view/menu_login.php";
?>