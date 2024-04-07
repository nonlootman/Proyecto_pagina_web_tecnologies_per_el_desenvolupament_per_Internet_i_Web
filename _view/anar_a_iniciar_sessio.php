<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Energy Hub</title>
  <link rel="stylesheet" type="text/css" href="css/estil_base.css" >
  <link rel="stylesheet" type="text/css" href="css/capçalera.css" >
  <script type="text/javascript" src="js/functions.js"></script>
</head>


<body>

  <div id="background"></div>

  <?php include_once __DIR__ .'/../_view/capçalera.php'; ?>

  <section id="sessio_no_iniciada">
    <p>Sessió no iniciada</p>
    <p>Inicieu sessió per accedir al carro</p>
    <a href="index.php?ACCTION=Go_to_login">Login</a>
  </section>

</body>
</html>
