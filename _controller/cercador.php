<?php
    include_once __DIR__ ."/../_model/cercador.php";
    //Guardem les dades del input per fer la cerca
    $input = $_POST['producte'] ?? null;

    // Comprovem que hem empleat el formulari
    $camps_plens = true;
    if($input == null){
        $camps_plens = false;
    }
    // Si el camp no està ple llavors enviem l'usuari a l'inici de la pàgina
    if(!$camps_plens){
        include_once __DIR__ ."/../_view/menu_registre.php";
    }



?>