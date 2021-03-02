<?php 
  include_once '../incluciones/sesion.php';

    if ($_SESSION['user'] == 'Karen' || $_SESSION['user'] == 'Ernesto' || $_SESSION['user'] == 'Alfredo' || $_SESSION['user'] == 'Erika') {
        header("Refresh:");
        echo 'No tienes permisos para acceder';
        die();
        exit();
    }
?>
<link rel="stylesheet" href="/siga/vista/css/refaccionespd.css">
<div class="container-fluid">
    <form action="" class="formdata" id="formdata">
        <div class="row">
            <div class="col text-center">
                <h3>Listado de Refacciones</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <label for="iexpediente">No. Expediente</label>
                <input type="text" name="" id="iexpediente" class="form-control">
            </div> 
            <div class="col-md-4"></div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <label for=""></label>
                <button type="button" class="btn btn-primary btn-lg btn-block" id="btn_Buscar">Buscar</button>
            </div>
            <div class="col-md-4"></div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div id="generarpdf">
                    
                </div>
            </div>
            <div class="col-md-4"></div>
        </div>

    </form>
    </div>

    <script src="/siga/vista/js/refaccionespd.js"></script>