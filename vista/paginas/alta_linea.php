<?php 
    include_once '../incluciones/sesion.php';
?>
    <link rel="stylesheet" href="/siga/vista/css/alta_vehiculo.css">
    <div class="container-fluid">
        <form action="" method="post" id="formdata">
            <div class="row">
                <div class="col text-center">
                    <h3>Agregar Linea</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <label for="imarca">Marca</label>
                    <div id="select_marca">
                    
                    </div>
                </div>
                <div class="col-md-4"></div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <label for="imarca">Linea</label>
                    <input type="text" id="ilinea" class="form-control" placeholder="Linea">
                </div>
                <div class="col-md-4"></div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <label for=""></label>
                    <button type="button" class="btn btn-primary btn-lg btn-block" id="btn_registrar">Registrar</button>
                </div>
                <div class="col-md-4"></div>
        </div>
        </form>
    </div>

    <script src="/siga/vista/js/alta_linea.js"></script>