<?php
include_once "../../../configuracion.php";
$data = data_submitted();
$objControl = new AbmUsuario();
$list = $objControl->buscar($data);
$arreglo_salida =  array();
foreach ($list as $elem ){

    $nuevoElem['idusuario'] = $elem->getIdusuario();
    $nuevoElem["usnombre"]=$elem->getUsnombre();
    $nuevoElem["uspass"]=$elem->getUspass();
    $nuevoElem["usmail"]=$elem->getUsmail();
    $nuevoElem["usdeshabilitado"]=$elem->getUsdeshabilitado();
    array_push($arreglo_salida,$nuevoElem);
}

echo json_encode($arreglo_salida,null,2);

?>