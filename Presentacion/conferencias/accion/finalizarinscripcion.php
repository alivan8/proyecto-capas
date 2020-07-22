<?php

include_once '../../../configuracion.php';
$conferencias=new Conferencias();
$resp = false;
if($conferencias->terminarinscripcion()){
    $resp = true;
}
header('Location: ../../principal/inicio.php')
?>
