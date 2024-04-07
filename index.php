<?php 

$ACCTION = $_GET['ACCTION'] ?? NULL;

switch ($ACCTION) {

  case'Go_to_main':
    include __DIR__ .'/_controller/menu_principal.php';
    break;
  case'Go_to_cart':
    include __DIR__ .'/_controller/menu_carro.php';
    break;
  case 'Go_to_settings':
    include __DIR__ .'/_controller/menu_settings.php';
    break;
  case 'Go_to_perfil':
    include __DIR__ .'/_controller/menu_perfil.php';
    break; 
  case 'Go_to_registre':
    include __DIR__ .'/_controller/menu_registre.php';
    break;
  case 'Go_to_login':
    include __DIR__ ."/_controller/menu_login.php";
    break;
  case 'Go_to_menu_productes':
    include __DIR__ ."/_controller/menu_productes.php"; 
    break;
  case 'go_to_menu_pagament':
    include __DIR__ ."/_controller/menu_pagament.php";
    break;
  case 'Go_to_menu_compra_realitzada':
    include __DIR__ ."/_controller/menu_compra_realitzada.php";
    break;
  case 'registrar_usuari':
    include __DIR__ ."/_controller/registrar_usuari.php";
    break;
  case 'iniciar_sessio':
    include __DIR__ ."/_controller/iniciar_sessio.php";
    break;
  case 'unset_session':
    include __DIR__ ."/_controller/unsetSession.php";
    break;
  case 'afegir_a_carro':
    include __DIR__ ."/_controller/afegir_a_carro.php";
    break;
  case 'afegir_compra_BD':
    include_once __DIR__ ."/_controller/afegir_compra_BD.php";
    break;
  case 'borrar_item_carro':
    include __DIR__ ."/_controller/borrar_item_carro.php";
    break;
  case 'borrar_items_carro':
    include __DIR__ ."/_controller/borrar_items_carro.php";
    break;
  case 'get_productes_filtrats_categoria':
    include __DIR__ ."/_controller/get_productes_filtrats_categoria.php"; 
    break;
  case 'get_productes_filtrats_nom':
    include __DIR__ ."/_controller/get_productes_filtrats_nom.php"; 
    break;
  case 'modificar_quantitat_item':
    include __DIR__ ."/_controller/modificar_quantitat_item.php";
    break;
  case 'modificar_foto':
    include __DIR__ ."/_controller/modificar_foto.php";
    break;
  case 'modificar_password':
    include __DIR__ ."/_controller/modificar_password.php";
    break;
  case 'modificar_dades_personals':
    include __DIR__ ."/_controller/modificar_dades_personals.php";
    break;
  default:
    include __DIR__ .'/_controller/menu_principal.php';
    break;
        
}

?> 


