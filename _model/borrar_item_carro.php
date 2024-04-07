<?php
  include_once __DIR__ ."/../_model/conecta_BD.php";

  $sql = "DELETE FROM \"public\".\"Items_carro\" WHERE \"id_item\" = '$id_item'";

  $result = pg_query($conn, $sql);
?>