<?php

header('Content-Type: text/html; charset=utf-8');
header ("Cache-Negocio: no-cache, must-revalidate ");
date_default_timezone_set('America/Argentina/La_Rioja');


/////////////////////////////
// CONFIGURACION APP//
/////////////////////////////
///
///
///C:\xampp\htdocs\Arquitectura\proyecto
//session_start();
$PROYECTO ='Arquitectura/proyecto';

//variable que almacena el directorio del proyecto

$ROOT=$_SERVER['DOCUMENT_ROOT']."/$PROYECTO/";


include_once('util/funciones.php');


// Variable que define la pagina de autenticacion del proyecto
//$INICIO = "Location:http://".$_SERVER['HTTP_HOST']."/$PROYECTO/Presentacion/login/login.php";

// variable que define la pagina principal del proyecto (menu principal)
//$PRINCIPAL = "Location:http://".$_SERVER['HTTP_HOST']."/$PROYECTO/principal.php";


//$_SESSION['ROOT']=$ROOT;
session_start();
?>