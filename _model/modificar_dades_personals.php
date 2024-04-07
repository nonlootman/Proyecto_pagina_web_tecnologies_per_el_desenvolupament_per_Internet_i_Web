<?php
  include_once __DIR__ ."/../_model/conecta_BD.php";
  
  $mail = $_SESSION["mail"];
  $sql = "UPDATE \"public\".\"customers\" SET (nom_client, mail, address, city, codi_postal) = ($1, $2, $3, $4, $5) WHERE \"mail\"='$mail'";
  
  $result = pg_query_params($conn, $sql, $val_array);

?>