<?php
  include_once __DIR__ ."/../_model/conecta_BD.php";
  
  $sql = "INSERT into \"public\".\"Compra\"(id_compra, id_usuari, id_producte, nombre_unitats, subtotal) values ($1, $2, $3, $4, $5)";
  
  $result = pg_query_params($conn, $sql, $val_array);
?>