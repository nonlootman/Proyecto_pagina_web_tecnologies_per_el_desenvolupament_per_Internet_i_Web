<?php
  include_once __DIR__ .'/../_model/conecta_BD.php';

  $sql = "SELECT * from \"public\".\"Compra\" WHERE \"id_usuari\" = '$id_usuari'";

  $result = pg_query($conn, $sql);
  $arr_compres = pg_fetch_all($result);
?>