<?php

include_once '../../../configuracion.php';
$data=data_submitted();
$conferencias=new Conferencias();
$conferencias->quitarevento($data);
//header('Location: ../conferencias.php');

?>