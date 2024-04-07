<header id="capçalera">
  <a href="index.php?ACCTION=Go_to_main" id="logo_nav">Energy Hub</a>
  
  <div id="buscador">
    <form action="" id="buscador_form">
      <input id="buscador_text" type="text"  name="producte" placeholder="Cerca..." autocomplete="off" oninput="cercarNomsProductes()" >
      <button type="submit" value="cercar">
        <img src="img/Imatges_icones/Icona_busqueda_white.png" alt="Cerca">
      </button>
    </form>
      
  </div>
  <div></div> <!-- Per a centrar el buscador :) -->
  <nav id="nav_bar">
    <div><a href="index.php?ACCTION=Go_to_cart" onmouseenter="displayBlockElement('pestanya_resum_carro')" onmouseleave="displayNoneElement('pestanya_resum_carro')"><img src="img/Imatges_icones/Icona_carro_compra_white.png" alt="Carro" ></a></div>
    <div><a href="index.php?ACCTION=Go_to_settings"><img src="img/Imatges_icones/Icona_settings_white.png" alt="Settings" ></a></div>
    <div><a id="icona_perfil" onmouseenter="displayBlockElement('pestanya_resum_perfil_collider')">
      <?php if (isset($_SESSION["mail"])){?>
        <img src=<?php echo "img/imatges_perfil/".$_SESSION["nom_fitxer_imatge"]; ?> alt="Perfil">
      <?php } else {?>
        <img src="img/Imatges_icones/Icona_perfil_white.png" alt="Perfil" >
      <?php } ?>
    </a></div>
      
  </nav>
</header>

<div id="pestanya_resum_carro">
  <?php if (isset($_SESSION["mail"])){?>    
  <p>Subtotal carro: <div id="preu_resum_carro"><?php echo $_SESSION["preu_carro"]." €"; ?></div></p>
  <p>Items carro: <?php echo $_SESSION["items_carro"];?></p>
  <?php } else {?>
  <p>Si us plau, incieu sessió per a poder accedir al carro</p>
  <?php } ?>
</div>


<div id="pestanya_resum_perfil_collider" onmouseleave="displayNoneElement('pestanya_resum_perfil_collider')">
  <div id="pestanya_resum_perfil">
    <?php if (isset($_SESSION["mail"])){?>    
      <div><h3>Hola, <?php echo $_SESSION["nom_client"]; ?></h3></div>
      <div><a class="link_resum_perfil" href="index.php?ACCTION=Go_to_perfil"><p>· Veure Perfil<p></a></div>
      <div><a class="link_resum_perfil" href="index.php?ACCTION=Go_to_settings"><p>· Editar perfil</p></a></div>
      <div><a class="link_resum_perfil" href="index.php?ACCTION=Go_to_perfil"><p>· Historial compres</p></a></div>
    <?php } else {?>
      <p>Sessió no iniciada</p>
      <p>Inicieu sessió per accedir al carro</p>
      <br> <a href="index.php?ACCTION=Go_to_login">Login</a>
    <?php } ?>
  </div>
</div>

<div id="buscador_llista_productes">
      Hello world!
</div>




