<?php 
  include_once '../incluciones/sesion.php';

    if ($_SESSION['user'] == 'Ernesto' || $_SESSION['user'] == 'Erika') {
        header("Refresh:");
        echo 'No tienes permisos para acceder';
        die();
        exit();
    }
?>
<link rel="stylesheet" href="/siga/vista/css/orden_trabajo.css">
<link rel="stylesheet" type="text/css" href="/siga/vista/libs/DataTables-1.10.22/css/jquery.dataTables.css"/>
<link rel="stylesheet" type="text/css" href="/siga/vista/libs/Buttons-1.6.5/css/buttons.dataTables.css"/>
<link rel="stylesheet" type="text/css" href="/siga/vista/libs/Responsive-2.2.6/css/responsive.dataTables.css"/>
<div class="container-fluid">
    <form action="" class="formdata" id="formdata">
        <div class="row">
            <div class="col text-center">
                <h3>Orden de Trabajo</h3>
            </div>
        </div> 
        <div class="row">
            <div class="col-md-4">
                <label for="iexpediente">No. Expediente</label>
                <input type="text" name="" id="iexpediente" class="form-control">
            </div>
            <div class="col-md-4">
                <label for=""></label>
                <button type="button" class="btn btn-primary btn-lg btn-block" id="btn_Buscar">Buscar</button>
            </div>
            <div class="col-md-4">
                <label for=""></label>
                <div id="inf" class="text-center">
                    <label for="" id="info"></label>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col text-center">
                <h3>Reparaciones</h3>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-4">
                <label for="lreparacion">Reparacion</label>
                <input type="text" id="ireparacion" class="form-control">
            </div>
            <div class="col-md-2 text-center">
                <div class="form-check">
                    <br>
                    <input class="form-check-input" type="checkbox" value="" id="hojalateria" checked>
                    <label class="form-check-label" for="defaultCheck1">Hojalateria</label>
                </div>
            </div>
            <div class="col-md-2 text-center">
                <div class="form-check">
                    <br>
                    <input class="form-check-input" type="checkbox" value="" id="pintura" checked>
                    <label class="form-check-label" for="defaultCheck1">Pintura</label>
                </div>
            </div>
            <div class="col-md-2 text-center">
                <div class="form-check">
                    <br>
                    <input class="form-check-input" type="checkbox" value="" id="mecanica" checked>
                    <label class="form-check-label" for="defaultCheck1">Mecanica</label>
                </div>
            </div>
            <div class="col-md-2">
                <label for=""></label>
                <button type="button" class="btn btn-success btn-lg btn-block" id="btn_agregar">Agregar</button></div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-4">
                <label for="">Observaciones</label>
                <textarea class="form-control" name="" id="tobservaciones" cols="10" rows="5" placeholder="Proporciona informacion adicional si es necesaria"></textarea>
            </div>
            <div class="col-md-4">
                <label for=""></label>
                <button type="button" class="btn btn-primary btn-lg btn-block" id="btn_crear">Crear</button></div>
            <div class="col-md-4"></div>
        </div>
        <br>
        <div class="row">
            <div class="form-group col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body" id="panel">
                        <div class="table-responsive">
                            <table id="lista_orden" class="table table-striped table-bordered" border="0">
                                <thead class="text-capitalize">
                                    <tr>
                                        <th>Expediente</th>
                                        <th>Estatus</th>
                                        <th>Marca</th>
                                        <th>Linea</th>
                                        <th>Color</th>
                                        <th>Modelo</th>
                                        <th>Placas</th>
                                        <th>Cliente</th>
                                    </tr>
                                </thead>
                                <tbody id="listado_orden">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    </div>

    <script src="/siga/vista/js/orden_trabajo.js"></script>
    <script type="text/javascript" src="/siga/vista/libs/pdfmake-0.1.36/pdfmake.js"></script>
    <script type="text/javascript" src="/siga/vista/libs/pdfmake-0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="/siga/vista/libs/DataTables-1.10.22/js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="/siga/vista/libs/Buttons-1.6.5/js/dataTables.buttons.js"></script>
    <script type="text/javascript" src="/siga/vista/libs/Buttons-1.6.5/js/buttons.flash.js"></script>
    <script type="text/javascript" src="/siga/vista/libs/Buttons-1.6.5/js/buttons.html5.js"></script>
    <script type="text/javascript" src="/siga/vista/libs/Responsive-2.2.6/js/dataTables.responsive.js"></script>
    <script  src = " https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.4.1/jspdf.debug.js"  integrity = "sha384-THVO / sM0mFD9h7dfSndI6TS0PgAGavwKvB5hAxRRvc0o9cPLohB0wb / PTA7LdUHs "  crossorigin = " anonymous " > </script>