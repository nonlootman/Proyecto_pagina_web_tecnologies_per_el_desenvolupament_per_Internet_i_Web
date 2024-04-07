<?php
	include_once __DIR__ .'/../_model/conecta_BD.php';

	$sql = "SELECT * FROM \"public\".\"Producte\" WHERE \"product_ID\"='$id_producte'";

	$result = pg_query($conn, $sql);
	$array_prod = pg_fetch_all($result);
	$producte = $array_prod[0];
?>