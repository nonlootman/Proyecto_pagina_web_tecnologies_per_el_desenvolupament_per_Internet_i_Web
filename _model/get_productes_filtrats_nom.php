<?php
  include_once __DIR__ .'/../_model/conecta_BD.php';

  $sql = "SELECT * FROM \"public\".\"Producte\" WHERE nom_producte LIKE '$lletres_producte'";

  $result = pg_query($conn, $sql);
  $array_productes = pg_fetch_all($result);
?>