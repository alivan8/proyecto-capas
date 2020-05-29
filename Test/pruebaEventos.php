<?php
include_once '../configuracion.php';
$objevento = new AbmEvento();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//ES" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>Ingrseso evento</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<h3>Pruducto</h3>

<form method="post" action="../Vista/eventos/accion/altaevento.php">
    <div style="margin-bottom:10px">
    Nombre          
                <input name="nombre" id="nombre"  class="easyui-textbox" required="true" label="Nombre:" style="width:100%">
                </div>
                <div style="margin-bottom:10px">
                Detalle
                <input  name="detalle" id="detalle"  class="easyui-textbox" label="Descripcion:" style="width:100%">
                </div>
                <div style="margin-bottom:10px">
                Entrada
                <input  name="cantentrada" id="cantentrada"  class="easyui-textbox" required="true" label="Entrada:" style="width:100%">
                </div>
                <div style="margin-bottom:10px">
                Importe
                <input name="importe" value="importe" class="easyui-textbox" required="true" label="Importe:" style="width:100%">
                </div>
                <div style="margin-bottom:10px">
                Imagen
                <input name="imagen" value="imagen" class="easyui-textbox" label="Ruta imagen:" style="width:100%">
                </div>
<br><input id="accion" name ="accion" value="nuevo" type="hidden">
<input type="submit" value='Ingresar'>
</form>
<br><br>
<a href="../menueventos.php">Volver</a>
</body>
</html>