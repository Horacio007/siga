<?php
    include_once '../incluciones/sesion.php';

    if ($_SESSION['user'] == 'Ernesto') {
        header("Refresh:");
        echo 'No tienes permisos para acceder';
        die();
        exit();
    }
?>
    <link rel="stylesheet" href="/siga/vista/css/descarga_archivos.css">
    <div class="container-fluid">
        <form action="" enctype="multipart/form-data" method="post" id="formdata">
            <div class="row">
                <div class="col text-center">
                    <h3>Descarga Archivos del Vehiculo</h3>
                </div>
            </div> 
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <label for="lexpediente">No. Expediente</label>
                    <input type="text" name="iexpediente" id="iexpediente" class="form-control" require>
                </div>
                <div class="col-md-4"></div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <label for=""></label>
                    <button type="button" class="btn btn-primary btn-lg btn-block" id="btn_descarga">Descargar</button>
                </div>
                <div class="col-md-4"></div>
            </div>
        </form>
    </div>

    <script src="/siga/vista/js/index.js"></script>