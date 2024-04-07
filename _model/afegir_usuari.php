<?php
  include_once __DIR__ ."/../_model/conecta_BD.php";

  $sql = "INSERT into \"public\".\"customers\"(nom_client, mail, password, address, city, codi_postal) values ($1, $2, $3, $4, $5, $6)";
  
  $result = pg_query_params($conn, $sql, $val_array);
?>