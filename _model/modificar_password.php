<?php
  include_once __DIR__ ."/../_model/conecta_BD.php";
  
  $mail = $_SESSION["mail"];
  $sql = "UPDATE \"public\".\"customers\" SET \"password\" = '$pwd_hash' WHERE \"mail\"='$mail'";
  
  $result = pg_query($conn, $sql);

?>