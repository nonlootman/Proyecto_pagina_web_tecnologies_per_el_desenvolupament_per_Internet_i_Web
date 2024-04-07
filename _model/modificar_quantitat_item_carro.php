<?php
  include_once __DIR__ ."/../_model/conecta_BD.php";
  
  $sql = "UPDATE \"public\".\"Items_carro\" SET \"nombre_unitats\" = '$quantitat', \"preu\" = '$preu_total' WHERE \"id_usuari\" = '$id_usuari' AND \"id_producte\" = '$id_producte'";
  
  $result = pg_query($conn, $sql);
?>