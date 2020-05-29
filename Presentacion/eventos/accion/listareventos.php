<?php 
include_once "../../../configuracion.php";
$data = data_submitted();
$objControl = new AbmEvento();
$list = $objControl->buscar($data);
$arreglo_salida =  array();
foreach ($list as $elem ){
    
    $nuevoElem['idevento'] = $elem->getidevento();
    $nuevoElem["nombre"]=$elem->getnombre();
    $nuevoElem["detalle"]=$elem->getdetalle();
    $nuevoElem["cantentrada"]=$elem->getcantentrada();
    $nuevoElem["importe"]=$elem->getimporte();
    $nuevoElem["imagen"]=$elem->getimagen();
    array_push($arreglo_salida,$nuevoElem);
}

echo json_encode($arreglo_salida,null,2);



?>