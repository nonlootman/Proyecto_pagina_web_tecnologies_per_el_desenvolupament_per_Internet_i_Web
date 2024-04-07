<?php
  include_once __DIR__ ."/../_model/conecta_BD.php";
  
  $sql = "INSERT into \"public\".\"Items_carro\"(id_item, id_usuari, id_producte, nombre_unitats, preu) values ($1, $2, $3, $4, $5)";
  
  $result = pg_query_params($conn, $sql, $array_dades_input);
?>