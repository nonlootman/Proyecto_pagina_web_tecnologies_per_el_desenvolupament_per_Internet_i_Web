<?php
	include_once __DIR__ ."/../_model/conecta_BD.php";
	
	$sql = "SELECT * FROM \"public\".\"customers\" WHERE \"mail\"='$id_usuari'";
	
	$result = pg_query($conn, $sql);
	$array_user = pg_fetch_all($result);
	$password_mail = $array_user[0]["password"];    
?>