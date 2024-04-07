<?php
  include_once __DIR__ ."/../_model/conecta_BD.php";  
  
  $sql = "SELECT COUNT(*) total from \"public\".\"customers\" WHERE \"mail\" = '$id_usuari'";

  $result = pg_query($conn, $sql);
  $var = pg_fetch_all($result);
  $total_usuaris = $var[0]["total"];
?>