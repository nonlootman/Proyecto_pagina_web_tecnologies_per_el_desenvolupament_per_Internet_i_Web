<?php
  session_start();
  // mirar si la sessió està iniciada
  $sessio_iniciada = isset($_SESSION["mail"]);

  // esborrem un posible registre  dels misatges d'error
  $error_modificar_dades_personals="";
  $error_modificar_imatge="";
  $error_modificar_passwords="";

  // Guardem les dades del formulari
  $nom = $_POST['nom'] ?? null;
  $nou_mail = $_POST['mail'] ?? null;
  $address = $_POST['address'] ?? null;
  $city = $_POST['city'] ?? null;
  $postal_code = $_POST['postal_code'] ?? null;
  $password = $_POST['password'] ?? null;

  // mirem que tots els camps estiguin omplerts (tot i que ja ho comprovem al client)
  $camps_plens = true;
  if(($nom == null)|| ($nou_mail == null)||($password == null) ||($address == null)||($city == null)||($postal_code == null)){
    $camps_plens = false;
  }
  
  // agafem les dades de l'usuari
  $id_usuari = $_SESSION["mail"];
  include_once __DIR__ ."/../_model/get_user.php";

  if (!$camps_plens){
    $error_modificar_dades_personals = "Cal omplir tots els camps.";
    include_once __DIR__ ."/../_view/menu_settings.php";
  }else if (!filter_var(str_replace(' ', '', $nou_mail), FILTER_VALIDATE_EMAIL)){
    $error_modificar_dades_personals = "L'Email introduit és de format desconegut.";
    include_once __DIR__ ."/../_view/menu_settings.php";
  }else if (!filter_var($postal_code, FILTER_VALIDATE_INT)){
    $error_modificar_dades_personals = "El codi postal ha de ser un numero enter";
    include_once __DIR__ ."/../_view/menu_settings.php";
  }else{

    
    // buscquem el nombre total d'usuaris amb el mateix mail
    $id_usuari = $nou_mail;
    include_once __DIR__ ."/../_model/count_mails_iguals.php";
    
    // esborrem una entitat si el mail es el mateix que el nostre
    $mail_actualitzat = true;
    $last_mail = $_SESSION["mail"];
    if($nou_mail == $last_mail) {
      $total_usuaris--; 
      $mail_actualitzat = false;
    }


    if($total_usuaris > 0){
      $error_modificar_dades_personals = "Aquest Email ja està registrat.";
      include_once __DIR__ ."/../_view/menu_settings.php";
    } else if(!password_verify($password, $password_mail)){
      $error_modificar_dades_personals = "La contrasenya no és correcte";
      include_once __DIR__ ."/../_view/menu_settings.php";
    } else {
      // totes les dades cumpleixen els requisits, procedim a modificar les dades de la BD
      $val_array = array($nom, $nou_mail, $address, $city, $postal_code);
      include_once __DIR__ ."/../_model/modificar_dades_personals.php";

      // actualitzem ara el mail de referència a totes les compres de l'usuari
      if($mail_actualitzat)
        include_once __DIR__ ."/../_model/actualitzar_mail_compres.php";

      // actualitzem les dades de la sessió
      $_SESSION["nom_client"] = $nom;
      $_SESSION["mail"] = $nou_mail;
      $_SESSION["address"] = $address;
      $_SESSION["city"] = $city;
      $_SESSION["codi_postal"] = $postal_code;

      
      include_once __DIR__ ."/../_view/menu_perfil.php";
    }
  }
?>