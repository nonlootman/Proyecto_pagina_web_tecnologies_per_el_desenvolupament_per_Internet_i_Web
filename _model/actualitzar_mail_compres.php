<?php
  include_once __DIR__ ."/../_model/conecta_BD.php";
  
  $sql = "UPDATE \"public\".\"Compra\" SET id_usuari = '$nou_mail' WHERE \"id_usuari\"='$last_mail'";
  
  $result = pg_query($conn, $sql);

?>