<?php
  include_once __DIR__ ."/../_model/conecta_BD.php";
  
  $mail = $_SESSION["mail"];
  $sql = "UPDATE \"public\".\"customers\" SET \"nom_fitxer_imatge\" = '$nom_imatge' WHERE \"mail\"='$mail'";
  
  $result = pg_query($conn, $sql);

?>