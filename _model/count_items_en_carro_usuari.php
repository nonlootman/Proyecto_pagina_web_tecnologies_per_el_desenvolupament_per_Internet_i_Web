<?php
  include_once __DIR__ ."/../_model/conecta_BD.php";

  $sql = "SELECT COUNT(*) total from \"public\".\"Items_carro\" WHERE \"id_usuari\" = '$id_usuari'";
  
  $result = pg_query($conn, $sql);
  $var = pg_fetch_all($result);
  $total_productes_carro = $var[0]["total"];
?>