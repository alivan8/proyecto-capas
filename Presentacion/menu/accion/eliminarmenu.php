<?php
include_once "../../../configuracion.php";
$data = data_submitted();

if (isset($data['idmenu'])){
    $objC = new AbmMenu();
    $respuesta = $objC->baja($data);
    if (!$respuesta){
        $mensaje = " La accion  ELIMINACION No pudo concretarse";
    }
}
$salida['respuesta'] = $respuesta;
if (isset($mensaje)){
   
    $respuesta['errorMsg']=$mensaje;
    echo json_encode($respuesta);
}
echo json_encode($salida);
?>