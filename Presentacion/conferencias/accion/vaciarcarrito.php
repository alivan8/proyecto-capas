<?php

include_once '../../../configuracion.php';
$conferencias=new Conferencias();
$conferencias->vaciar();
header('Location: ../conferencias.php');
?>