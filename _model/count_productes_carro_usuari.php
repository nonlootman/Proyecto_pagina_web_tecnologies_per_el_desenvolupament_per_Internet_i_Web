<?php
  include_once __DIR__ ."/../_model/conecta_BD.php";

  $sql = "SELECT COUNT(*) total from \"public\".\"Items_carro\" WHERE \"id_usuari\" = '$id_usuari' AND \"id_producte\" = '$id_producte'";

  $result = pg_query($conn, $sql);
  $result_text = pg_fetch_all($result);
  $producte_en_cistella = $result_text[0]["total"];
?>