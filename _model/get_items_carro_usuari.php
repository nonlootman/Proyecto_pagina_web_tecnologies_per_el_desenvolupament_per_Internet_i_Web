<?php
  include_once __DIR__ .'/../_model/conecta_BD.php';

  $sql = "SELECT * from \"public\".\"Items_carro\" WHERE \"id_usuari\" = '$id_usuari'";

  $result = pg_query($conn, $sql);
  $array_prod = pg_fetch_all($result);
  $items_carro = $array_prod;
?>