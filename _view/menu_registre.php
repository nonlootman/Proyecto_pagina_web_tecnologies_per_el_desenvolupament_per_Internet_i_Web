<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Energy Hub</title>
        <link rel="stylesheet" type="text/css" href="css/login_register.css" >
        <link rel="stylesheet" type="text/css" href="css/capçalera.css" >
        <script type="text/javascript" src="js/functions.js"></script>
</head>


<body>

<div id="BackID"></div>
<div id="formID" class="box">
    <section>
        <p><?php echo $error_registre; ?></p>
    </section>
    <section >
        <form method='post' action='../index.php?ACCTION=registrar_usuari'>
            <label for="nom">Nom d'usuari:</label> <input id= "nom" name="nom_n" type="text" required><br>
            <label for="correu">Mail:</label> <input id= "correu" name="correu_n" pattern="(?:\S+\s*)+@(?:\S+\s*)$" type="text" title="introdueix un correu electronic de format vàlid" required><br>
            <label for="contrasenya">Contrasenya:</label> <input id= "contrasenya" name="contrasenya_n" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" type="password" 
                title="El pasword ha de contindre: 1 numero, 1 lletra MAJUSCULA, 1 lletra minuscula i la mida ha de ser superior a 8 caràcters" required><br>
            <label for="contra">Repeteix la contrasenya:</label> <input id= "contra" name="contrasenya2_n" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" type="password" 
                title="El pasword ha de contindre: 1 numero, 1 lletra MAJUSCULA, 1 lletra minuscula, la mida ha de ser superior a 8 caràcters i ha de ser igual al anterior pasword"required><br>
            <label for="adress">Adreça:</label> <input id= "address" name="address_n" type="text" pattern=".{1,30}" title="Aquest camp ha de tindre una mida màxima de 30 caràcters" required><br>
            <label for="city">Poblacio:</label> <input id= "city" name="city_n" type="text" pattern=".{1,30}" title="Aquest camp ha de tindre una mida màxima de 30 caràcters" required><br>
            <label for="posta">Codi Postal:</label> <input id= "postal_code" name="postal_code_n" type="text" pattern=".{5}"title="Aquest camp ha de tindre una mida de 5 caràcters"  required><br>
            <input type="submit" value= "Registrar-se" id="registre">
        </form>
    </section>
    <br>
    <section>
        <form method='post' action="index.php?ACCTION=Go_to_login">
            Inicia sessió, si ja estàs registrat.
            <input type="submit" value="Iniciar sessió">
        </form>
    </section>
    
</div>
</body>
</html>
