<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Energy Hub</title>
        <link rel="stylesheet" type="text/css" href="css/login_register.css" >
</head>


<body>

<div id="Bck"></div>

<div id="formula" class="box">
    <section>
        <p><?php echo $error_login; ?></p>
    </section>
    <section>
        <form method='post' action="index.php?ACCTION=iniciar_sessio">
            <label for="mail_login">Correu electrònic:</label> <input id="mail_login" name="mail_login" type="text" required > <br>
            <label for="password_login">Contrasenya:</label> <input id="password_login" name="password_login" type="password" required> <br>
            <input type="submit" value="Iniciar sessió">
        </form>
    </section>
    <br>
    <section>
        <form method='post' action="index.php?ACCTION=Go_to_registre">
            Registra't, si no estàs registrat.
            <input type="submit" value="Registrar-se">
        </form>
    </section>
</div>
</body>
</html>
