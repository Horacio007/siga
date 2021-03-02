<?php 
    include_once '../incluciones/sesion.php';
    if ($_SESSION['user'] == 'Noel' ||  $_SESSION['user'] == 'Ernesto' || $_SESSION['user'] == 'Erika') {
        header("Refresh:");
        echo 'No tienes permisos para acceder';
        die();
        exit();
    }
?>
    <link rel="stylesheet" href="/siga/vista/css/valuaciones.css">
    <link rel="stylesheet" type="text/css" href="/siga/vista/libs/DataTables-1.10.22/css/jquery.dataTables.css"/>
    <link rel="stylesheet" type="text/css" href="/siga/vista/libs/Buttons-1.6.5/css/buttons.dataTables.css"/>
    <link rel="stylesheet" type="text/css" href="/siga/vista/libs/Responsive-2.2.6/css/responsive.dataTables.css"/>
    
    <div class="container-fluid">
        <form action="" class="formdata" id="formdata">
            <div class="row">
                <div class="col text-center">
                    <h3>Valuaciónes</h3>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-3">
                    <label for="">No. Expediente (Id)</label>
                    <input type="text" class="form-control" id="id_vehiculo">
                </div>
                <div class="col-md-3">
                    <label for=""></label>
                    <button type="button" class="btn btn-primary btn-lg btn-block" id="btn_buscar">Buscar</button>
                </div>
                <div class="col-md-3">
                    <label for=""></label>
                    <button type="button" class="btn btn-success btn-lg btn-block" id="btnmodificar">Actualizar</button>
                </div>
                <div class="col-md-3">
                    <label for=""></label>
                    <button type="button" class="btn btn-info btn-lg btn-block" id="btnnvo" data-toggle="tooltip" data-placement="bottom" title="Buscar Nuevo Vehiculo">Buscar Nuevo</button>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <label for="lestatus">Estatus:</label><br>
                    <div id="select_estatus">
                    
                    </div>
                </div>
                <div class="col-md-2">
                    <label for="lfenvio">Fecha Llegada al Taller:</label><br>
                    <input type="date" class="form-control" id="fecha_llegada">
                </div>
                <div class="col-md-2">
                    <label for="lfenvio">Fecha Envio:</label><br>
                    <input type="date" class="form-control" id="fecha_envio">
                </div>
                <div class="col-md-2">
                    <label for="lcantidad">Cantidad:</label><br>
                    <input type="text" class="form-control" id="cantidadini">
                </div>
                <div class="col-md-2">
                    <label for="lpzscambio">Piezas a cambio:</label><br>
                    <input type="text" class="form-control" id="pzscambioini">
                </div>
                <div class="col-md-2">
                    <label for="lpzsrepara">Piezas a reparacion:</label><br>
                    <input type="text" class="form-control" id="pzsreparaini">
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <label for="lfenvio">Fecha Autorizacion:</label><br>
                    <input type="date" class="form-control" id="fecha_autorizacion">
                </div>
                <div class="col-md-2">
                    <label for="lcantidad">Cantidad:</label><br>
                    <input type="text" class="form-control" id="cantidadfin">
                </div>
                <div class="col-md-2">
                    <label for="lpzscambio">Piezas a cambio:</label><br>
                    <input type="text" class="form-control" id="pzscambiofin">
                </div>
                <div class="col-md-2">
                    <label for="lpzsreparafin">Piezas a reparacion:</label><br>
                    <input type="text" class="form-control" id="pzsreparafin">
                </div>
                <div class="col-md-2">
                    <label for="lfenvio">Piezas Vendidas:</label><br>
                    <input type="text" class="form-control" id="pzsvendidas">
                </div>
                <div class="col-md-2">
                    <label for="lcantidad">Importe Piezas Vendidas:</label><br>
                    <input type="text" class="form-control" id="importepzsvendidas">
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">

                    <input type="hidden" class="form-control" id="porcentapro">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="form-group col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-body" id="panel">
                            <div class="table-responsive">
                                <table id="lista_valuaciones" class="table table-striped table-bordered" border="0">
                                    <thead class="text-capitalize">
                                        <tr>
                                            <th>Expediente</th>
                                            <th>Estatus</th>
                                            <th>Fecha de Llegada</th>
                                            <th>Fecha de Llegada a Taller</th>
                                            <th>Marca</th>
                                            <th>Linea</th>
                                            <th>Color</th>
                                            <th>Modelo</th>
                                            <th>Cliente</th>
                                            <th>Fecha de Envio</th>
                                            <th>Diferencia</th>
                                            <th>Cantidad</th>
                                            <th>Piezas Cambiadas</th>
                                            <th>Piezas Reparacion</th>
                                            <th>Autorizacion</th>
                                            <th>Cantidad</th>
                                            <th>Piezas Cambiadas</th>
                                            <th>Piezas Reparacion</th>
                                            <th>Piezas Vendidas</th>
                                            <th>Importe de Piezas</th>
                                            <th>Porcentaje Aprobacion</th>
                                        </tr>
                                    </thead>
                                    <tbody id="listado_valuaciones">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           
        </form>
    </div>
    <script src="/siga/vista/js/valuaciones.js"></script>
    <script type="text/javascript" src="/siga/vista/libs/pdfmake-0.1.36/pdfmake.js"></script>
    <script type="text/javascript" src="/siga/vista/libs/pdfmake-0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="/siga/vista/libs/DataTables-1.10.22/js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="/siga/vista/libs/Buttons-1.6.5/js/dataTables.buttons.js"></script>
    <script type="text/javascript" src="/siga/vista/libs/Buttons-1.6.5/js/buttons.flash.js"></script>
    <script type="text/javascript" src="/siga/vista/libs/Buttons-1.6.5/js/buttons.html5.js"></script>
    <script type="text/javascript" src="/siga/vista/libs/Responsive-2.2.6/js/dataTables.responsive.js"></script>