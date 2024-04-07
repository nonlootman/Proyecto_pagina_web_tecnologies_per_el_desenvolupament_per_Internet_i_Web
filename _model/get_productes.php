<?php
  include_once __DIR__ .'/../_model/conecta_BD.php';
  
  $sql = "SELECT * FROM \"public\".\"Producte\"";
  
  $result = pg_query($conn, $sql);
  $array_preu_nom_img = pg_fetch_all($result);
  $arr_productes = $array_preu_nom_img;
?>