<?php
  session_start();

  // Guardem les dades del formulari
  $id_usuari = $_POST['mail_login'] ?? null;
  $password = $_POST['password_login'] ?? null;

  // Busquem el nombre total d'usuaris amb el mateix mail
  include_once __DIR__ ."/../_model/count_mails_iguals.php";

  // Esborrem un posible registre de la variable error_login
  $error_login = "";

  if($total_usuaris == 1)
  {
    // Mirem que el password coincideixi
    include_once __DIR__ ."/../_model/get_user.php";
    
    if(password_verify($password, $password_mail))
    {

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
      // mirar el numero de productes en el cabás de l'usuari
      $id_usuari = $_SESSION["mail"];
      include_once __DIR__ .'/../_model/count_items_en_carro_usuari.php';
      $_SESSION["items_carro"] = $total_productes_carro;

      // veure si el carro està buit
      if($total_productes_carro > 0){
        // recollir dades dels items del carro de la BD
        include_once __DIR__ .'/../_model/get_items_carro_usuari.php';

        // dades dels productes del carro i preu total
        foreach ($items_carro as $item){
          // suma el preu al total
          $_SESSION["preu_carro"]  += (float)$item["preu"]; 

        }
      }
      
      include_once __DIR__ ."/../_controller/menu_perfil.php";
    }
    else 
    {
      $error_login = "Contrassenya incorrecta.";
      include_once __DIR__ ."/../_view/menu_login.php";
    }
  }
  else
  {
    $error_login = "No existeix aquest usuari, comprova que has escrit bé el mail.";
    include_once __DIR__ ."/../_view/menu_login.php";
  }


?>