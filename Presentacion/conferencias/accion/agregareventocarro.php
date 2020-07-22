<?php
include_once '../../../configuracion.php';
$data=data_submitted();
$conferencias=new Conferencias();
$conferencias->agregarevento($data);
?>
