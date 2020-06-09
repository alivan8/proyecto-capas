
<?php

include_once "../../configuracion.php";
$evento=new AbmEvento();
$eventos=$evento->buscar(null);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>PatagoniaIT</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Custom styles for this template -->
    <link href="../css/estilos.css" rel="stylesheet">
</head>

<body>
<?php
include_once '../estructura/encabezado.php';

?>
<!--CONTENIDO CENTRAL DE LA PAGINA PRINCIPAL-->
<div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light">

    <div class="col-md-5 m-0">
        <h1 class="display-4 font-weight-normal">CONFERENCIAS Y EVENTOS FICCT</h1>
        <p class="lead font-weight-normal">la inscripcion a tu conferencia  al alcanze de un clik, incribete ya!!!</p>

    </div>


    <div id="carousel1" class="carousel slide carousel-fade" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="images/UAGRM.jpg" alt="" width="1500" height="500">
            </div>
            <div class="carousel-item">
                <img src="images/UAGRM.jpg" alt="" width="1500" height="500">
            </div>
            <div class="carousel-item">
                <img src="images/UAGRM.jpg" alt="" width="1500" height="500">
            </div>
        </div>

        <!--Controles NEXT y PREV-->
        <a class="carousel-control-prev" href="#carousel1" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carousel1" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
        <!--Controles de indicadores-->
        <ol class="carousel-indicators">
            <li data-target="#carousel1" data-slide-to="0" class="active"></li>
            <li data-target="#carousel1" data-slide-to="1"></li>
            <li data-target="#carousel1" data-slide-to="2"></li>
        </ol>

    </div>
</div>

<!--SE DIUJAN TODOS LOS eventoS-->
<div class="container mt-3">
    <div class="row">

    <?php
     foreach ($eventos as $evento){
         if($evento->getcantentrada()>0){
             ?>
        <div class="card-deck">
            <div class="card mb-4" style="min-width: 18rem; max-width: 18rem;">
                <?php
                // echo $evento->getimagen();
                $final = '../../../..'.$evento->getimagen();

                //../../../../Arquitectura/proyecto-MVC/Imagenes/77.png
                ?>
                <img class="card-img-top" src="<?php echo $final?>" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $evento->getnombre();?></h5>
                    <p class="card-text"><?php echo $evento->getdetalle();?></p>
                    <p class="card-text"><strong> $ <?php echo $evento->getimporte();?></p></strong>
                    <button data-id="<?php echo $evento->getidevento();?>"  class="btn btn-info btn-sm inscripcion">inscripcionr</button>
                </div>
            </div>
        </div>
        <?php
         }
         ?>
        <?php
     }
     ?>
    </div>
</div>

<!--MODAL PARA REALIZAR LAS inscripcionS-->
<div class="modal" tabindex="-1" role="dialog" id="modalinscripcion">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Agregar evento Al Carrito</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body"></div>
        </div>
    </div>
</div>

<?php
include_once '../estructura/pie.php';
?>


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->

<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>




<!--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
-->
<script>
    Holder.addTheme('thumb', {
        bg: '#55595c',
        fg: '#eceeef',
        text: 'Thumbnail'
    });
</script>
<script src="../js/modal.js"></script>
<script src="../js/total.js"></script>
</body>
</html>