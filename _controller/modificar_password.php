<?php
  session_start();
  
  // mirar si la sessió està iniciada
  $sessio_iniciada = isset($_SESSION["mail"]);
  $id_usuari = $_SESSION["mail"];

  // iniciem tots els missatges d'error a 0
  $error_modificar_dades_personals="";
  $error_modificar_imatge="";
  $error_modificar_passwords="";

  // guardem dades del formulari
  $old_password = $_POST['old_password'] ?? null;
  $new_password_1 = $_POST['new_password_1'] ?? null;
  $new_password_2 = $_POST['new_password_2'] ?? null;

  // mirem que tots els camps estiguin omplerts (tot i que ja ho comprovem al client)
  $camps_plens = true;
  if(($old_password == null)|| ($new_password_1 == null)||($new_password_2 == null)){
    $camps_plens = false;
  }

  // agafem les dades de l'usuari
  include_once __DIR__ ."/../_model/get_user.php";

  // considerem tots els possibles errors i si tot es correcte realitzem la modificació
  if (!$camps_plens){
    $error_modificar_passwords = "Cal omplir tots els camps.";
    include_once __DIR__ ."/../_view/menu_settings.php";
  } else if(!password_verify($old_password, $password_mail)){
    $error_modificar_passwords = "La antiga contrasenya no coincideix";
    include_once __DIR__ ."/../_view/menu_settings.php";
  } else if ($new_password_1 != $new_password_2) {
    $error_modificar_passwords = "La contrasenya no està ben repetida.";
    include_once __DIR__ ."/../_view/menu_settings.php";
  } else { 
    // encriptem la contrasenya
    $opciones = ['cost'==10];
    $pwd_hash = password_hash($new_password_1, PASSWORD_BCRYPT, $opciones);

    // modifiquem la contrasenya
    include_once __DIR__ ."/../_model/modificar_password.php";

    $error_modificar_passwords = "La contrasenya s'ha modificat de forma correcte :)";
    include_once __DIR__ ."/../_view/menu_settings.php";
  }


?>