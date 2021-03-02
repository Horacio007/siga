<?php 
  include_once '../incluciones/sesion.php';

    if ($_SESSION['user'] == 'Ernesto' || $_SESSION['user'] == 'Noel' || $_SESSION['user'] == 'Raul' || $_SESSION['user'] == 'Alfredo' || $_SESSION['user'] == 'Erika') {
        header("Refresh:");
        echo 'No tienes permisos para acceder';
        die();
        exit();
    }
?>
<link rel="stylesheet" href="/siga/vista/css/bitacora.css">
<div class="container-fluid">
    <form action="" class="formdata" id="formdataa">
        <div class="row">
            <div class="col text-center">
                <h3>Opciones</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <button type="button" class="btn btn-primary btn-lg btn-block" id="btn_valuaciones">Valuaciónes</button>
            </div>
            <div class="col-md-4">
                <button type="button" class="btn btn-primary btn-lg btn-block" id="btn_refacciones">Refacciónes</button>
            </div>
            <div class="col-md-4">
                <button type="button" class="btn btn-primary btn-lg btn-block" id="btn_taller">Taller</button>
            </div>
        </div>
        <br>
        <div id="vista">
        
        </div>
    </form>
    </div>

    <script src="/siga/vista/js/bitacora.js"></script>