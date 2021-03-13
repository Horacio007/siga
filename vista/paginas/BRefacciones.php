<?php 
    include_once '../incluciones/sesion.php';
    if ($_SESSION['user'] == 'Noel' || $_SESSION['user'] == 'Erika') {
        header("Refresh:");
        echo 'No tienes permisos para acceder';
        die();
        exit();
    }
?>
    <link rel="stylesheet" href="/siga/vista/css/BRefacciones.css">
    <link rel="stylesheet" type="text/css" href="/siga/vista/libs/DataTables-1.10.22/css/jquery.dataTables.css"/>
    <link rel="stylesheet" type="text/css" href="/siga/vista/libs/Buttons-1.6.5/css/buttons.dataTables.css"/>
    <link rel="stylesheet" type="text/css" href="/siga/vista/libs/Responsive-2.2.6/css/responsive.dataTables.css"/>
    <div class="container-fluid">
        <form action="" class="formdata" id="formdata">
            <div class="row">
                <div class="col text-center">
                    <h3>Refacciones</h3>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-3">
                    <label for="">No. Expediente (Id)</label>
                    <input type="text" class="form-control" id="id_vehiculo">
                </div>
                <div class="col-md-2">
                    <label for=""></label>
                    <button type="button" class="btn btn-primary btn-lg btn-block" id="btn_buscar">Buscar</button>
                </div>
                <div class="col-md-2">
                    <label for=""></label>
                    <button type="button" class="btn btn-success btn-lg btn-block" id="btnmodificar">Actualizar</button>
                </div>
                <div class="col-md-2">
                    <label for=""></label>
                    <button type="button" class="btn btn-info btn-lg btn-block" id="btnnvo" data-toggle="tooltip" data-placement="bottom" title="Buscar Nuevo Vehiculo">Buscar Nuevo</button>
                </div>
                <div class="col-md-3">
                    <label for=""></label>
                    <div id="inf" class="text-center">
                        <label for="" id="info"></label>
                    </div>
                </div>
            </div>
            <div class='row'>
                <div class="col-md-3">
                    <label for="lnombre">Refacciones:</label><br>
                    <div id="select_estatus">
                    
                    </div>
                </div>
                <div class="col-md-3">
                    <label for="ldescripcion">Proveedor 1:</label><br>
                    <input type="text" class="form-control" id="proveedor1">
                </div>
                <div class="col-md-3">
                    <label for="lcosto">Refaccion 1:</label><br>
                    <input type="text" class="form-control" id="provrefaccion1">
                </div>
                <div class="col-md-3">
                    <label for="lcosto">Fecha Promesa 1:</label><br>
                    <input type="date" class="form-control" id="fechap1">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label for="ldescripcion">Proveedor 2:</label><br>
                    <input type="text" class="form-control" id="proveedor2">
                </div>
                <div class="col-md-4">
                    <label for="lcosto">Refaccion 2:</label><br>
                    <input type="text" class="form-control" id="provrefaccion2">
                </div>
                <div class="col-md-4">
                    <label for="lcosto">Fecha Promesa 2:</label><br>
                    <input type="date" class="form-control" id="fechap2">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label for="ldescripcion">Proveedor 3:</label><br>
                    <input type="text" class="form-control" id="proveedor3">
                </div>
                <div class="col-md-4">
                    <label for="lcosto">Refaccion 3:</label><br>
                    <input type="text" class="form-control" id="provrefaccion3">
                </div>
                <div class="col-md-4">
                    <label for="lcosto">Fecha Promesa 3:</label><br>
                    <input type="date" class="form-control" id="fechap3">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="form-group col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-body" id="panel">
                            <div class="table-responsive">
                                <table id="lista_refacciones" class="table table-striped table-bordered" border="0">
                                    <thead class="text-capitalize">
                                        <tr>
                                            <th>Expediente</th>
                                            <th>Estatus</th>
                                            <th>Marca</th>
                                            <th>Linea</th>
                                            <th>Color</th>
                                            <th>Modelo</th>
                                            <th>Cliente</th>
                                            <th>Refacciones</th>
                                            <th>Proveedor 1</th>
                                            <th>Refaccion 1</th>
                                            <th>Fecha Promesa 1</th>
                                            <th>Proveedor 2</th>
                                            <th>Refaccion 2</th>
                                            <th>Fecha Promesa 2</th>
                                            <th>Proveedor 3</th>
                                            <th>Refaccion 3</th>
                                            <th>Fecha Promesa 3</th>
                                        </tr>
                                    </thead>
                                    <tbody id="listado_refacciones">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           
        </form>
    </div>
    <script src="/siga/vista/js/BRefacciones.js"></script>
    <script type="text/javascript" src="/siga/vista/libs/pdfmake-0.1.36/pdfmake.js"></script>
    <script type="text/javascript" src="/siga/vista/libs/pdfmake-0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="/siga/vista/libs/DataTables-1.10.22/js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="/siga/vista/libs/Buttons-1.6.5/js/dataTables.buttons.js"></script>
    <script type="text/javascript" src="/siga/vista/libs/Buttons-1.6.5/js/buttons.flash.js"></script>
    <script type="text/javascript" src="/siga/vista/libs/Buttons-1.6.5/js/buttons.html5.js"></script>
    <script type="text/javascript" src="/siga/vista/libs/Responsive-2.2.6/js/dataTables.responsive.js"></script>