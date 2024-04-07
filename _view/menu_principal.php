<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Energy Hub</title>
  <link rel="stylesheet" type="text/css" href="css/estil_base.css" >
  <link rel="stylesheet" type="text/css" href="css/menu_principal.css" >
  <link rel="stylesheet" type="text/css" href="css/menu_producte.css" >
  <link rel="stylesheet" type="text/css" href="css/capçalera.css" >
  <script type="text/javascript" src="js/functions.js"></script>
</head>

<body id="body">
  <div id="background"></div>
  
  <?php include_once __DIR__ .'/../_view/capçalera.php'; ?>
  
  <section class="seccio_filtres">
    <h3>Categoria:</h3>
    <select name="categoria" id="categories" onchange="canviCategoria();">
      <option value="*">Totes</option>
      <option value="Solar">Solar</option>
      <option value="Eólica">Eólica</option>
      <option value="Bateries">Bateries</option>
    </select>
  </section>
  
  <section class="seccio_productes">
    <div id="grid_productes">
      <?php include_once __DIR__ .'/../_view/grid_productes.php'; ?>
    </div>
  </section>

</body>
</html>
