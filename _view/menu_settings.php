<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Energy Hub</title>
  <link rel="stylesheet" type="text/css" href="../css/estil_base.css">
  <link rel="stylesheet" type="text/css" href="../css/capçalera.css">
  <link rel="stylesheet" type="text/css" href="../css/menu_settings.css">
  <script type="text/javascript" src="../js/functions.js"></script>
</head>


<body>

  <div id="background"></div>

  <?php include_once __DIR__ .'/../_view/capçalera.php'; ?>

  <section class="empty_section">
    
  <?php if(!$sessio_iniciada){ ?>
    <p>Sessió no iniciada</p>
    <p>Inicieu sessió per accedir al carro</p>
    <br> <a href="index.php?ACCTION=Go_to_login">Login</a>

  <?php } else { ?>
    <h1>Editar perfil</h1>
    <form method='post' action='../index.php?ACCTION=modificar_dades_personals'>
      <div class="modify_form">
        <label for="nom">Nom d'usuari:</label> <input id="nom"  value=<?php echo "'".$_SESSION["nom_client"]."'"; ?> name="nom" type="text" required><br>
        <label for="mail">Mail:</label> <input id="correu" value=<?php echo "'".$_SESSION["mail"]."'"; ?> name="mail" pattern="(?:\S+\s*)+@(?:\S+\s*)$" type="text" title="introdueix un correu electronic de format vàlid" required>
        <label for="address">Adreça:</label> <input id="address" value=<?php echo "'".$_SESSION["address"]."'"; ?> name="address" type="text" pattern=".{1,30}" title="Aquest camp ha de tindre una mida màxima de 30 caràcters" required>
        <label for="city">Poblacio:</label> <input id="city" value=<?php echo "'".$_SESSION["city"]."'"; ?> name="city" type="text" pattern=".{1,30}" title="Aquest camp ha de tindre una mida màxima de 30 caràcters" required>
        <label for="posta">Codi Postal:</label> <input id="postal_code" value=<?php echo "'".$_SESSION["codi_postal"]."'"; ?> name="postal_code" type="text" pattern=".{5}"title="Aquest camp ha de tindre una mida de 5 caràcters"  required>

        <label for="password">Contrasenya*:</label> <input id= "contrasenya" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" type="password" title="Per a fer cap canvi a les dades personals s'ha d'introduir la contrasenya." required>
     
        <input type="submit" value= "Editar Perfil" id="registre" class="submit_button">
      </div>
    </form>
    <p><?php echo $error_modificar_dades_personals; ?></p>
    <p>Per a fer cap canvi a les dades personals s'ha d'introduir la contrasenya.</p>
    
    <hr>
    <h1>Editar imatge de perfil</h1>
    <div id="change_pic_div">
      <div id="Change_pic_pic"> <img src=<?php echo "img/imatges_perfil/".$_SESSION["nom_fitxer_imatge"]; ?> alt=<?php echo $_SESSION["nom_fitxer_imatge"]?> > </div>
      <div id="Change_pic_form">
        <b>Nova imatge de perfil: </b> <br>
        <form method="post" enctype="multipart/form-data" action='../index.php?ACCTION=modificar_foto'>
          <input type="file" name="profile_image" /> <br>
          <input type="submit" value= "Cambiar_imatge" id="form_imatge" class="submit_button"> <br>
        </form>
        <p><?php echo $error_modificar_imatge; ?></p>
      </div>
    </div>


    <hr>
    <h1>Editar contrasenya</h1>
    <form method='post' action='../index.php?ACCTION=modificar_password'>
      <div class="modify_form">
        <label for="old_password">Antiga contrasenya:</label> <input id="old_password" name="old_password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" type="password" 
          title="El pasword ha de contindre: 1 numero, 1 lletra MAJUSCULA, 1 lletra minuscula i la mida ha de ser superior a 8 caràcters" required>
        <label for="new_password_1">Escriure la nova contrasenya:</label> <input id="new_password_1" name="new_password_1" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" type="password" 
          title="El pasword ha de contindre: 1 numero, 1 lletra MAJUSCULA, 1 lletra minuscula i la mida ha de ser superior a 8 caràcters" required>
        <label for="new_password_2">Repteir la nova contrasenya:</label> <input id="new_password_2" name="new_password_2" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" type="password" 
          title="El pasword ha de contindre: 1 numero, 1 lletra MAJUSCULA, 1 lletra minuscula i la mida ha de ser superior a 8 caràcters" required>
        <input type="submit" value= "Editar contrasenya" id="form_password" class="submit_button"> <br>
      </div>
    </form>
    <p><?php echo $error_modificar_passwords; ?></p>
    
  <?php } ?>
  </section>

</body>
</html>
