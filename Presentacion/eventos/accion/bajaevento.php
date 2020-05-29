<?php
include_once "../../../configuracion.php";
$data = data_submitted();

if (isset($data['idevento'])){
    $objC = new AbmEvento();
    $respuesta = $objC->baja($data);
    if (!$respuesta){
        $mensaje = " La accion  ELIMINACION No pudo concretarse";
    }
}
$salida['respuesta'] = $respuesta;

if (isset($mensaje)){

    $salida['errorMsg']=$mensaje;
}
echo json_encode($salida);

?>