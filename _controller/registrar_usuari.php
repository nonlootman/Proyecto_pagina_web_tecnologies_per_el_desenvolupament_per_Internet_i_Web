<?php
  session_start();

  // Guardem les dades del formulari
  $nom = $_POST['nom_n'] ?? null;
  $id_usuari = $_POST['correu_n'] ?? null;
  $contrasenya = $_POST['contrasenya_n'] ?? null;
  $contrasenya2 = $_POST['contrasenya2_n'] ?? null;
  $address = $_POST['address_n'] ?? null;
  $city = $_POST['city_n'] ?? null;
  $postal_code = $_POST['postal_code_n'] ?? null;

  // esborrem un posible registre de la variable error_registre
  $error_registre = "";

  // mirem que tots els camps estiguin omplerts (tot i que ja ho comprovem al client)
  $camps_plens = true;
  if(($nom == null)|| ($id_usuari == null)||($contrasenya == null)||($contrasenya2 == null)||($address == null)||($city == null)||($postal_code == null)){
    $camps_plens = false;
  }

  /*
    VALIDAREM LES DADES AMB ELS SEGÜENTS CRITERIS:
    - Tots els camps son plens
    - Email de format correcte
    - Email únic en la BD
    - Contrasenyes són iguals
  */

  if (!$camps_plens){
    $error_registre = "Cal omplir tots els camps.";
    include_once __DIR__ ."/../_view/menu_registre.php";

  }else if (!filter_var($id_usuari, FILTER_VALIDATE_EMAIL)){
    $error_registre = "L'Email introduit és de format desconegut.";
    include_once __DIR__ ."/../_view/menu_registre.php";
  }else if (!filter_var($postal_code, FILTER_VALIDATE_INT)){
    $error_registre = "El codi postal ha de ser un numero enter";
    include_once __DIR__ ."/../_view/menu_registre.php";
  }else{
    // buscquem el nombre total d'usuaris amb el mateix mail
    include_once __DIR__ ."/../_model/count_mails_iguals.php";
    
    if($total_usuaris > 0){
      $error_registre = "Aquest Email ja està registrat.";
      include_once __DIR__ ."/../_view/menu_registre.php";
    
    } else if ($contrasenya != $contrasenya2) {
      $error_registre = "La contrasenya no està ben repetida.";
      include_once __DIR__ ."/../_view/menu_registre.php";
    
    } else {
      // encriptem la contrasenya
      $opciones = ['cost'==10];
      $pwd_hash = password_hash($contrasenya, PASSWORD_BCRYPT, $opciones);
      
      $val_array = array($nom, $id_usuari, $pwd_hash, $address, $city, $postal_code);

      // afegim l'usuari a la BD
      include_once __DIR__ ."/../_model/afegir_usuari.php";

      // guardem les dades de la sessió
      include_once __DIR__ ."/../_model/get_user.php";

      // guardem totes les dades de l'usuari a la sessió
      $_SESSION["nom_client"] = $array_user[0]["nom_client"];
      $_SESSION["mail"] = $array_user[0]["mail"];
      $_SESSION["password"] = $array_user[0]["password"];
      $_SESSION["address"] = $array_user[0]["address"];
      $_SESSION["city"] = $array_user[0]["city"];
      $_SESSION["codi_postal"] = $array_user[0]["codi_postal"];
      $_SESSION["data_creacio"] = $array_user[0]["fecha_creacio"];
      $_SESSION["nom_fitxer_imatge"] = $array_user[0]["nom_fitxer_imatge"];

      // ARA CALCULAREM EL PREU DEL CARRO
      $_SESSION["preu_carro"] = 0;
      include_once __DIR__ .'/../_model/count_items_en_carro_usuari.php';
      $_SESSION["items_carro"] = $total_productes_carro;

      // mostrem la pàgina de perfil
      include_once __DIR__ ."/../_view/menu_perfil.php";

    }
  }

?>
